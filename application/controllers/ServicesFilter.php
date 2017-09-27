<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class ServicesFilter extends IndexCore
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ServicesFilterModel');
    }

    function index()
    {
        $data['category'] = $this->ServicesFilterModel->getCategory();
        
        $this->view('filter', $data);   
    }

    public function searchByFilter(){
        $category = $this->input->post("category");
        
        $result = $this->ServicesFilterModel->getByFilter($category);
        echo json_encode($result);
        return $result;
                
    }

}