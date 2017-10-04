<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 30/09/2017
 * Time: 23:11
 */

class ProfessionalController extends IndexCore
{
    function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->model('professional/ProfessionalModel');
    }

    public function openForm()
    {
        $this->load->model('category/CategoryModel');
        $categories = $this->CategoryModel->find();
        $this->view('professional/Form', $categories);
    }

    public function insert()
    {
        $professional = [
            "cnpj" => $this->input->post('cnpj'),
            "invoice" => $this->input->post('invoice') !== NULL ? $this->input->post('invoice') : 0,
            "id_user" => $this->session->userdata('login')['id'],
            "certificate" => 0
        ];

        $array = $this->input->post('categorias');



        exit;
        $confirmProfessional = $this->ProfessionalModel->insert($professional);

        if($confirmProfessional) {

            //$categories = $this->CategoryController->find();

            $idCategory = [ "id_category" => $this->input->post('id_category') ];

//            foreach($category as $key => $value) {
//
//            }

        }
    }

}