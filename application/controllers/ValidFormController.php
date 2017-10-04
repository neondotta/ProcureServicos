<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 03/10/2017
 * Time: 20:53
 */
class ValidFormController extends CI_Controller
{

    public function getCpf()
    {
        $cpf = $this->input->post('cpf');

        $this->load->helper('validform');
        $form = new ValidForm();
        $data = $form->validCPF($cpf);

        echo json_encode($data);
    }


}