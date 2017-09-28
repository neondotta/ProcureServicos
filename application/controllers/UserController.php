<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 26/09/2017
 * Time: 21:11
 */

class UserController extends IndexCore
{
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
        $addressImage = $_SERVER['DOCUMENT_ROOT'].'/procure-servicos/public/images/';
        $nameImage = date('NOW').$_FILES['image']['name'];

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
            "name_picture" => $nameImage ? $nameImage : 'default.jpg',
            "address_picture" => $addressImage,
            "password" => md5($this->input->post('password'))  //criptografia temporária, para alterar para bcrypt
        ];

        if ($this->form_validation->run()) {

            $confirmInsert = $this->UserModel->insert($user);
            print_r($confirmInsert);
            if($confirmInsert) {
                $imageController->validateUpload($image, $nameImage, $addressImage);
            }

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
}