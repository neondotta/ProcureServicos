<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 24/09/2017
 * Time: 13:45
 */

class MY_Loader extends CI_Loader{

    public function __construct()
    {

    }
    public function controller($file_name)
    {
        $CI = & get_instance();

        $file_path = APPPATH.'controllers/'.$file_name.'.php';
        $object_name = $file_name;
        $class_name = ucfirst($file_name);

        if(file_exists($file_path)){
            require $file_path;

            $CI->$object_name = new $class_name();
        }
        else{
            show_error("Unable to load the requested controller class: ".$class_name);
        }
    }
}