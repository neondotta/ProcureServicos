<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 11/10/2017
 * Time: 23:13
 */

class ServiceController extends IndexCore
{
    function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
    }

    public function insert()
    {
        print_r($this->input->post());
        $date = $this->input->post('date');
        $time = $this->input->post('time');

        if ((!$this->input->post('date') && !$this->input->post('time')) || $this->input->post('type_time') == '1') {
            date_default_timezone_set('America/Sao_Paulo');
            $date = date("Y-m-d");
            $time = date("H:i");
        }
        print_r($date);exit();
        $service = [
            'type_payment' => 0,
            'value' => 0,
            'description' => $this->input->post('description'),
            'id_user' => $this->session->userdata('login')['id'],
            'id_professional' => $this->input->post('professional'),
            'type_payment' => $this->input->post('type_payment'),
            'date' => $date,
            'time' => $time,
            'status' => 0
        ];

        $this->load->model('service/ServiceModel');
        $result = $this->ServiceModel->insert($service);

        if (!$result) {
            $this->session->set_flashdata('error', 'Verifique os dados enviados.');
            redirect(base_url('ProfessionalController/professionalProfile'));
        }

        $this->session->set_flashdata('success', 'Serviço solicitado com sucesso.');
        redirect('/');

    }

    public function searchServices()
    {   
        $userId = $this->session->userdata('login')['id'];

        $this->load->model('service/ServiceModel');
        $result = $this->ServiceModel->searchService($userId);
        echo json_encode($result);
        return $result;
    }

    public function listServices()
    {
        $this->load->model('service/ServiceModel'); 
        $userId = $this->session->userdata('login')['id'];

        $data['services'] = $this->ServiceModel->listServices($userId);
        $this->view("service/services", $data);
    }
}   