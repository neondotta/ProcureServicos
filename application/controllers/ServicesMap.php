<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 22/09/2017
 * Time: 09:59
 */

class ServicesMap extends indexCore
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
        $this->view('bookService');
    }

    function closestLocations()
    {
        $location = json_decode( preg_replace('/\\\"/',"\"",$_POST['data']));
        $longitude = $location->longitude;
        $latitude = $location->latitude;
        $type = $location->type;
        $base = base_url();

        if ($type == 'map') {
            $providers = $this->servicesMapModel->getClosestMap($longitude, $latitude, $type);

            $indexed_providers = array_map('array_values', $providers);

            $count = 0;

            foreach ($indexed_providers as $arrays => &$array) {
                foreach ($array as $key => &$value) {
                    if ($key === 4) {
                        $pieces = explode(',', $value);
                        $value = "$pieces[1]<a href='$base$pieces[0]'>More...</a>";
                    }

                    $count++;

                }
            }

            echo json_encode($indexed_providers,JSON_UNESCAPED_UNICODE);

            return $indexed_providers;
        }

        $providers = $this->servicesMapModel->getClosestList($longitude, $latitude, $type);

        //echo '<pre>';print_r($providers);echo '</pre>';

        return $providers;

    }

//    function orderServicesTwo()
//    {
//        $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
//        $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
//        $this->form_validation->set_rules('RequestAddress', 'RequestAddress', 'trim|required');
//
//        if ($this->form_validation->run($this) == FALSE) {
//            $data['error'] = validation_errors('
//                <div class="alert alert-danger notices errorimg alert-dismissible" role="alert">
//                <button type="button" class="close" data-dismiss="alert">
//                <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>', '</div>
//            ');
//            $this->load->view('bookService', $data);
//        } else {
//            print_r($this->input->post());
//        }
//    }

}