<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 03/10/2017
 * Time: 20:53
 */
class ValidFormController extends CI_Controller
{

    public function init()
    {
        $this->load->helper('validform');
        return new ValidForm();
    }

    public function getCpf()
    {
        $cpf = $this->input->post('cpf');

        $form = $this->init();

        $data = $form->validCPF($cpf);

        echo json_encode($data);
    }

    public function getCnpj()
    {
        $cpf = $this->input->post('cnpj');

        $form = $this->init();

        $data = $form->validCNPJ($cpf);

        echo json_encode($data);
    }


}