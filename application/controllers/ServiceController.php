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

    public function listServices($type = 'professional')
    {   
        $this->load->model('service/ServiceModel'); 
        $userId = $this->session->userdata('login')['id'];

        $data['services'] = $this->ServiceModel->listServices($userId,$type);
        if ($type == 'professional') {
            $this->view("service/services", $data);
        } else {
            $this->view("service/myServices", $data);
        }
        
    }

    public function viewService($serviceId,$type = 'professional')
    {
        $this->load->model('service/ServiceModel'); 
        $data['result'] = $this->ServiceModel->getService($serviceId);
        
        if ($type == 'professional') {
            $this->view("service/serviceDetail", $data);        
        } else {
            $this->view("service/myServiceDetail", $data);
        }

    }

    public function acceptService()
    {
      
        $serviceId = $this->input->post("serviceId");
        $price = $this->input->post("price");
        $status = $this->input->post("status");

        $this->load->model('service/ServiceModel'); 

        $params = array(
            "value" => $price,
            "status" => $status
        );

        $result = $this->ServiceModel->acceptService($params,$serviceId);
        echo json_encode("Aguardando cliente");
    }

    public function userAcceptService()
    {
        $serviceId = $this->input->post("serviceId");
        $status = $this->input->post("status");

        $this->load->model('service/ServiceModel'); 

        $params = array(
            "status" => $status
        );

        $result = $this->ServiceModel->acceptService($params,$serviceId);
        echo json_encode("Aguardando Profissional para Iniciar o serviço");

    }


    public function startService($serviceId) {
        $this->load->model("service/ServiceModel");
        
        $service = $this->ServiceModel->getServiceStatus($serviceId);

        if ($service->status == 4) {
            $params = array(
                "status" => 5
            );

            if($this->ServiceModel->acceptService($params,$serviceId)){            
                echo json_encode("Aguardando confirmação de inicio do cliente");
            }
        } else {
            echo json_encode("O serviço não pode ser iniciado sem a confirmação do cliente.");
        }
    }    

    public function confirmService($serviceId)
    {
        $this->load->model("service/ServiceModel");
        
        $service = $this->ServiceModel->getServiceStatus($serviceId);

        if ($service->status == 5) {
            $params = array(
                "status" => 1
            );

            if($this->ServiceModel->acceptService($params,$serviceId)){            
                echo json_encode("O serviço está em andamento");
            }
        } 
    }

    public function finishService($serviceId) {
        $this->load->model("service/ServiceModel");
        
        $service = $this->ServiceModel->getServiceStatus($serviceId);

        if ($service->status == 1) {
            $params = array(
                "status" => 6
            );

            if($this->ServiceModel->acceptService($params,$serviceId)){            
                echo json_encode("Aguardando confirmação de finalização do cliente");
            }
        } else {
            echo json_encode("O serviço não pode ser finalizado sem a confirmação do cliente.");
        }
    } 
    
    public function confirmFinish($serviceId)
    {
        $this->load->model("service/ServiceModel");
        
        $service = $this->ServiceModel->getServiceStatus($serviceId);

        if ($service->status == 6) {
            $params = array(
                "status" => 2
            );

            if($this->ServiceModel->acceptService($params,$serviceId)){            
                echo json_encode("O serviço está Finalizado");
            }
        } 
    }

    public function serviceRating(){
        $serviceId = $this->input->post("serviceId");
        $rating = $this->input->post("rating");
        $description = $this->input->post("description");

        $this->load->model("service/ServiceModel");

        $params = array(
            "service_id" => $serviceId,
            "rating" => $rating,
            "description" => $description
        );

        return $this->ServiceModel->serviceRating($params);

    }
}   