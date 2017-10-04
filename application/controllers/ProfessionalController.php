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

        $confirmProfessional = $this->ProfessionalModel->insert($professional);

        if($confirmProfessional) {

            $professionalId = $this->db->insert_id();

            $categoryProfessional['idProfessional'] = $professionalId;
            $categoryProfessional['category'] = $this->input->post('categorias');

            $this->load->model('category_professional/CategoryProfessionalModel');
            $this->CategoryProfessionalModel->insert($categoryProfessional);

        }
    }

}