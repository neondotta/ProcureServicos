<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 26/09/2017
 * Time: 21:11
 */

class UserController extends IndexCore
{

    function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->model('user/UserModel');
    }

    public function openForm()
    {
        $this->view('user/Form');
    }

    public function insert()
    {
        $this->load->model("user/UserModel");

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->load->controller('ImageController');

        $imageController = $this->ImageController;

        $image = $_FILES['image'];
        $addressImage = base_url('/public/images/');

        if ($image) {
            $nameImage = date('NOW') . $_FILES['image']['name'];
        }


        $user = [
            "name" => $this->input->post('name'),
            "cpf" => $this->input->post('cpf'),
            "cep" => $this->input->post('cep'),
            "nation" => $this->input->post('nation'),
            "country" => $this->input->post('country'),
            "city" => $this->input->post('city'),
            "street" => $this->input->post('street'),
            "number" => $this->input->post('number'),
            "complement" => $this->input->post('complement'),
            "email" => $this->input->post('email'),
            "latitude" => $this->input->post('latitude'),
            "longitude" => $this->input->post('longitude'),
            "name_picture" => $nameImage ? $nameImage : 'default.jpg',
            "address_picture" => $addressImage,
            "password" => md5($this->input->post('password'))  //criptografia temporária, para alterar para bcrypt
        ];

        if ($this->form_validation->run()) {

            $confirmInsert = $this->UserModel->insert($user);

//            if($confirmInsert && $_FILES['image']) {
//                $addressImage = $_SERVER['DOCUMENT_ROOT'].'/procure-servicos/public/images/';
//                $imageController->validateUpload($image, $nameImage, $addressImage);
//            }

            $this->session->set_flashdata('success', 'Cadastrado com sucesso.');
            redirect('/');
        }

        //temporário até criar validações.
        $this->session->set_flashdata('error', 'Erro no cadastro. Favor verifique os campos ao inserir.');
        redirect(base_url().'UserController/openForm');
    }

    public function edit()
    {

    }

    public function statusUser()
    {
        return $this->UserModel->statusUser();
    }

    public function checkStatus()
    {
        $status = $this->UserModel->checkStatus();
        print_r($status);
        return $status;
    }

    public function findFavorite()
    {
        return $this->UserModel->findFavorite($this->input->post('professional'));
    }

    public function favoriteProfessional()
    {
        return $this->UserModel->favoriteProfessional($this->input->post('professional'));
    }

    public function favoriteList()
    {
        $favorite = $this->UserModel->favoriteList();
        return $this->view('user/FavoriteList', $favorite);

    }
}