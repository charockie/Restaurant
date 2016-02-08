<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function checkLogin($login = NULL)
    {
        $this->db->select('id, name');
        $this->db->where('login', $login);
        $query = $this->db->get('administration');

        return $query->row_array();
    }

    public function checkAuth($pass = NULL, $id = NULL)
    {
        $this->db->where('id', $id);
        $this->db->where('password', $pass);
        $this->db->from('administration');

        return $this->db->count_all_results();;
    }

//add admin password, used once
//    public function addPass($pass = NULL)
//    {
//        $this->db->set('password', $pass);
//        $this->db->where('id', 1);
//        $this->db->update('administration');
//    }

    public function getProducts()
    {
        $this->db->select('food.id, name, price, description, image, eating');
        $this->db->from('food');
        $this->db->join('cat_food', 'cat_food.id = food.cat');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getCatFood()
    {
        $this->db->select('eating');
        $query = $this->db->get('cat_food');

        return $query->result_array();
    }




}