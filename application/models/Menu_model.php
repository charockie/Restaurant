<?php

class Menu_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

//    public function getFood($cat = '1')
//    {
//        $query = $this->db->select('name, price, description, image');
//        $query = $this->db->where('cat', $cat);
//        $query = $this->db->get('food');
//
//        return $query->result_array();
//    }

    public function getTypeDescr($cat = '1')
    {
        $query = $this->db->select('eating, descr');
        $query = $this->db->where('id', $cat);
        $query = $this->db->get('cat_food');

        return $query->row_array();
    }

    public function getCategory($type = 'breakfast')
    {
        $query = $this->db->select('id');
        $query = $this->db->where('eating', $type);
        $query = $this->db->get('cat_food');
        $result = $query->row_array();

        return $result['id'];
    }

    public function record_count($cat = '1')
    {
        $query = $this->db->where('cat', $cat);
        $query = $this->db->from('food');
        $query = $this->db->count_all_results();

        return $query;
    }

    public function fetch_food($cat = '1', $limit, $start)
    {
        $query = $this->db->limit($limit, $start);
        $query = $this->db->select('name, price, description, image');
        $query = $this->db->where('cat', $cat);
        $query = $this->db->get('food');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return $query->result_array();;
    }

    public function search_food($search, $limit, $start)
    {

        $query = $this->db->limit($limit, $start);
        $query = $this->db->select('name, price, description, image');
        $query = $this->db->like('name', $search);
        $query = $this->db->get('food');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return $query->result_array();;
    }

    public function search_count($search = '')
    {
        $query = $this->db->like('name', $search);
        $query = $this->db->from('food');
        $query = $this->db->count_all_results();

        return $query;
    }


}