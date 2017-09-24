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
        $base = base_url();
        $this->load->controller('servicesMap');
    }

    public function index()
    {
        $this->view('index/index');

    }

}