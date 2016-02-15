<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->library('encrypt');
    }

    public function login()
    {
        $data['title'] = 'Auth page';

        $login = $this->input->POST('login');
        $password = $this->input->POST('password');
        if (isset($login) && isset($password))
        {
            $user = $this->admin_model->checkLogin($login);

            if (isset($user['id']))
            {
                $encrypted_pass = sha1($password);

//add admin password, used once
//                $this->admin_model->addPass($encrypted_pass);

                $checkAuth = $this->admin_model->checkAuth($encrypted_pass, $user['id']);

                if ($checkAuth == 1)
                {
                    $cook = sha1($password+$user['name']+$login);
                    $cook = $user['id'].$cook;
                    $this->session->set_userdata('authenticated', 1);
                    $this->session->set_userdata('auth', $cook);

                    redirect('/admin/main', 'refresh');
                }
            }
        }else
        {
            $error = 'Empty login or password!';
        }
        $this->load->view('admin/login/login', $data);
    }

    public function main($sort = 'id')
    {
        if(isset($_SESSION['del_message']))
        {
            $data['del_message'] = $_SESSION['del_message'];
            $this->session->unset_userdata('del_message');
        }

        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 1)
        {
            $data['title'] = 'All food';
//            $data['all_products'] = $this->admin_model->getProducts($sort);

            $products = $this->admin_model->getProducts($sort);

            foreach ($products as $prod)
            {
                $file = file_exists('public/uploads/'.$prod['id'].'.jpg');
                if ($file !== TRUE)
                { $prod['image'] = 'no_image'; }
                else
                { $prod['image'] = $prod['id']; }
                $all_products[] = $prod;
            }
            $data['all_products'] = $all_products;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/main/all_food', $data);
        $this->load->view('admin/templates/footer', $data);
        }
        else redirect('/admin', 'refresh');
    }

    public function logOut()
    {
        $this->session->unset_userdata('auth');
        $this->session->unset_userdata('authenticated');
        redirect('/admin', 'refresh');
    }

    public function delete($del = NULL)
    {
        $message = $this->admin_model->del_prod_id($del);
        if ($message === TRUE) { $delete = 'Food with id-'.$del.', was DELETED!'; }
        $this->session->set_userdata('del_message', $delete);

        redirect('/admin/main', 'refresh');
    }

    public function AddProduct()
    {
        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 1)
        {
            $data['title'] = 'Add product';
            $data['catFood'] = $this->admin_model->getCatFood();

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $config['upload_path']  = './public/uploads/';
            $config['allowed_types']= 'jpg';
            $config['max_size']     = 1000;
            $config['max_width']    = 1024;
            $config['max_height']   = 768;
            $this->load->library('upload', $config);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('descr', 'Description', 'required|min_length[15]');
            $this->form_validation->set_rules('cat', 'Category', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required|regex_match[/[0-9]{1,3}\.[0-9]{2}/]');


            if($this->form_validation->run() == FALSE)
            {
                $data['descr_text'] = $this->input->post('descr');
                $data['validation_errors'] = validation_errors();
                if ($this->upload->do_upload('image') === FALSE )
                {
                    $error = array('error' => $this->upload->display_errors());
                    $data['image_errors'] = $error['error'];
                }
            }
            else
            {
                $add_product['name'] = strip_tags(ltrim(rtrim($this->input->post('name'))));
                $add_product['description'] = strip_tags(ltrim(rtrim($this->input->post('descr'))));
                $category = $this->input->post('cat');
                $add_product['cat'] = $this->admin_model->getCategory($category);
                $price = ltrim(rtrim($this->input->post('price')));
                $add_product['price'] = number_format($price, 2);


                $insert_id = $this->admin_model->add_product($add_product);
                if ($insert_id >= 0)
                {
                    if ($this->upload->do_upload('image') === FALSE )
                    {
                        $error = array('error' => $this->upload->display_errors());
                        $data['image_errors'] = $error['error'];
                    }else {
                        $upload_data = $this->upload->data();
                        rename($upload_data['full_path'], $upload_data['file_path'] . $insert_id . $upload_data['file_ext']);

                        $data = array('upload_data' => $upload_data);
                    }
                }
                $data['add_sucess'] = $add_product['name'];
                redirect('/admin/main', 'refresh');
            }


            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/main/add_product', $data);
            $this->load->view('admin/templates/footer', $data);
        }
        else redirect('/admin', 'refresh');
    }


}