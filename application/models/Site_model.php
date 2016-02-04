<?php

class Site_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getWorkingHours()
    {
        $query = $this->db->get('working_hours');
        return $query->row_array();
    }

    public function getGreeting()
    {
        $query = $this->db->get('greeting');
        return $query->row_array();
    }

}