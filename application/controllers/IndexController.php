<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 23/09/2017
 * Time: 17:29
 */

class IndexController extends IndexCore
{
//    function __construct()
//    {
//        parent::__construct();
//        $base = base_url();
//    }

    public function index()
    {
        $this->view('index/index');
    }

    public function listProfessional($listProfessional)
    {
        if (isset($listProfessional)) {
           return $listProfessional;
        }

        return "Não foi localizado profissionais nesta região";
    }

}