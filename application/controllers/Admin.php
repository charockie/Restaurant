<?php

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

    public function main()
    {
        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 1)
        {
            $data['title'] = 'All food';

            $data['all_products'] = $this->admin_model->getProducts();




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

    public function AddProduct()
    {
        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 1)
        {
            $data['title'] = 'Products page';
            $data['catFood'] = $this->admin_model->getCatFood();
//            var_dump($data['catFood']);die;



            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('descr', 'Description', 'required|min_length[15]');
            $this->form_validation->set_rules('cat', 'Category', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');


            if($this->form_validation->run() == FALSE)
            {
                $data['validation_errors'] = validation_errors();
            }
            else
            {
                $add_product['name'] = $this->input->post('name');
                $add_product['descr'] = $this->input->post('descr');
                $add_product['cat'] = $this->input->post('cat');
                $add_product['price'] = $this->input->post('price');
                $add_product['image'] = $this->input->post('image');
                echo 'forma proverena';
                var_dump($add_product);
                echo anchor('admin/addproduct', 'Try it again!');
                die;
            }








            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/main/add_product', $data);
            $this->load->view('admin/templates/footer', $data);
        }
        else redirect('/admin', 'refresh');
    }


}