<?php

class Typography extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('typography_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = 'Typography page';






        $this->load->view('templates/header', $data);
        $this->load->view('typography/typography', $data);
        $this->load->view('templates/footer', $data);
    }



}