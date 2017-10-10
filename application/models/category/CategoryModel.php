<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 01/10/2017
 * Time: 00:22
 */

class CategoryModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function find()
    {
       $result = $this->db->get('category')->result_array();
       $categories = ['categories' => $result];
       return $categories;
    }

    public function findId($ids)
    {
        return $this->db->where_in('id', $ids)
                        ->get('category')
                        ->result_array();
    }

    public function addCategoriesProfessional()
    {

    }

}