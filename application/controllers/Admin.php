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
            $data['title'] = 'Main page';




        $this->load->view('admin/main/text', $data);
        }
        else redirect('/admin', 'refresh');
    }

    public function logOut()
    {
        $this->session->unset_userdata('auth');
        $this->session->unset_userdata('authenticated');
        redirect('/admin', 'refresh');
    }


}