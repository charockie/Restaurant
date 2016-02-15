<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->helper('url_helper');
    }

    public function food($type = NULL)
    {
//        get category of food
//        return int
        $cat = $this->menu_model->getCategory($type);

//        get description of category food
        $data['type_descr'] = $this->menu_model->getTypeDescr($cat);
        $data['title'] = 'Menu page';

//        load pagination
        $this->load->library('pagination');

//        configing pagination
        $config['base_url'] = base_url().'menu/'.$type;
        $config['total_rows'] = $this->menu_model->record_count($cat);
        $config['per_page'] = 4;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);

//        pagination
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


//        get food for pages
        $data['food_menu'] = $this->menu_model->fetch_food($cat, $config['per_page'], $page);

        $data['links'] = $this->pagination->create_links();


        $this->load->view('templates/header', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function searchFood()
    {
        $search = $this->input->get('searchword');
//        $this->input->set('searchword', $search);
//        $get = $this->input->get(NULL, TRUE);
//        var_dump($get); die;

        $data['type_descr'] = array('eating' => 'Search', 'descr' => 'Поиск легко поможет вам найти блюдо по его названию');
        $data['title'] = 'Search';

//        load pagination
        $this->load->library('pagination');

//        configing pagination
        $config['base_url'] = base_url().'menu/search';
        $config['total_rows'] = $this->menu_model->search_count($search);
        $config['per_page'] = 2;
        $config['uri_segment'] = 3;
        $config['suffix'] = '?searchword='.$search;
        $this->pagination->initialize($config);

//        pagination
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

//        get food for pages
        $data['food_menu'] = $this->menu_model->search_food($search, $config['per_page'], $page);

        $data['links'] = $this->pagination->create_links();


        $this->load->view('templates/header', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer', $data);
    }


}