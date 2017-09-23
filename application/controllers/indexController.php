<?php
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
    }

    public function index()
    {
        $this->view('index/index');
    }

}