<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 30/09/2017
 * Time: 23:39
 */

class CategoryController extends IndexCore
{
    function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
    }

    public function openForm()
    {
        $this->view('category/Form');
    }

    public function insert()
    {
        $category = [
            "category" => $this->input->post('category'),
            "description" => $this->input->post('description')
        ];

        $this->CategoryModel->insert($category);
    }

    public function find()
    {
        $this->load->model('category/CategoryModel');
        $result = $this->CategoryModel->find();
        return $result;
    }

}