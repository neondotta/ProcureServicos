<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 22/09/2017
 * Time: 10:11
 */

class ServicesFilterModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getByFilter($filter)
    {
        $sql = "SELECT * 
                FROM 
                    professional p 
                LEFT JOIN 
                    category_professional cp 
                ON
                    (p.id = cp.id_professional) 
                INNER JOIN 
					user u 
				ON
					u.id = p.id_user
                INNER JOIN 
                    category c 
                ON
                    (cp.id_category = c.id)
                WHERE 
                    c.id = {$filter}";
        
       $result = $this->db->query($sql)->result_array();       
       
       return $result;
    }
    
    public function getCategory()
    {
       $sql = "SELECT * FROM category";
       $result = $this->db->query($sql)->result_array();     
       return $result;
    }

}