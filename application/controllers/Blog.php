<?php

class Blog extends CI_Controller {

    public function index()
    {
        $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');

        $data['title'] = "My Real Title";
        $data['heading'] = "My Real Heading";

        $this->load->view('blogview', $data);

        $this->load->model('User_model');
        $this->User_model->hello();

        $this->load->helper('url');



        $this->output->enable_profiler(TRUE);



        $this->load->database();

        $query = $this->db->get('food');
        foreach ($query->result_array() as $row)
        {
            print_r('<pre>');
            print_r($row['name']);
            print_r('</pre>');
        }






    echo anchor('blog/index', 'Click Here');
    }

}