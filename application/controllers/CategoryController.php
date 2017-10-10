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
        $this->load->model('category/CategoryModel');
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

    public function addCategoryProfessional()
    {

        $categoryProfessional['idProfessional'] = $this->input->post('professionalId');
        $categoryProfessional['category'] = $this->input->post('category');

        $this->load->model('category_professional/CategoryProfessionalModel');
        $this->CategoryProfessionalModel->insert($categoryProfessional);

        redirect(base_url('ProfessionalController/profile'));
    }

    public function find()
    {
        $result = $this->CategoryModel->find();
        return $result;
    }

    public function jsonCategories()
    {
        echo json_encode($this->find());
    }

}