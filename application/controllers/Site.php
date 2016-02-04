<?php

class Site extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('site_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['time'] = $this->site_model->getWorkingHours();
        $data['greeting'] = $this->site_model->getGreeting();
        $data['title'] = 'Home page';

        $this->load->view('templates/header', $data);
        $this->load->view('site/index', $data);
        $this->load->view('templates/footer', $data);
    }

}
