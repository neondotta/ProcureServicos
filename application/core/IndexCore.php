<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 23/09/2017
 * Time: 17:47
 */

class IndexCore extends CI_Controller
{

    /***
     * pages of site in menu
     */

    function __construct()
    {
        parent::__construct();
    }

    /**
     * present master page includes header and footer
     * @param string $main_containt
     * @param array $data
     */
    function view($main_containt, $data = null)
    {
        $this->load->view('theme/header');
        $this->load->view($main_containt, $data);
        $this->load->view('theme/footer');
    }



}