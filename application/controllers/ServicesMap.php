<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 22/09/2017
 * Time: 09:59
 */

class ServicesMap extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('servicesMapModel');
    }

    function index()
    {
        $this->bookService();
    }

    function bookService()
    {
        $this->load->view('bookService');
    }

    function closestLocations()
    {
        $location = json_decode( preg_replace('/\\\"/',"\"",$_POST['data']));
        $longitude = $location->longitude;
        $latitude = $location->latitude;
        $id = $location->idMap;
        $base = base_url();
        $providers = $this->servicesMapModel->getClosestLocations($longitude, $latitude, $id);
        $indexed_providers = array_map('array_values', $providers);

        $count = 0;

        foreach ($indexed_providers as $arrays => &$array) {
            foreach ($array as $key => &$value) {
                if ($key === 1) {
                    $pieces = explode(',', $value);
                    $value = "$pieces[1]<a href='$base$pieces[0]'>More...</a>";
                }

                $count++;

            }
        }

        echo json_encode($indexed_providers,JSON_UNESCAPED_UNICODE);

    }

    function orderServicesTwo()
    {
        $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
        $this->form_validation->set_rules('RequestAddress', 'RequestAddress', 'trim|required');

        if ($this->form_validation->run($this) == FALSE) {

            $data['error'] = validation_errors('
                <div class="alert alert-danger notices errorimg alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>', '</div> 
            ');
            $this->load->view('bookService', $data);
        } else {
            print_r($this->input->post());

        }
    }

}