<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 23/09/2017
 * Time: 17:29
 */

class IndexController extends IndexCore
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->loadCategories();

        $this->view('index/index', $data);
    }

    public function listProfessional($listProfessional)
    {
        if (isset($listProfessional)) {
           return $listProfessional;
        }

        return "Não foi localizado profissionais nesta região";
    }

    public function loadCategories()
    {
        $this->load->model('category/CategoryModel');
        return $this->CategoryModel->find();
    }

}