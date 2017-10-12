<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 11/10/2017
 * Time: 23:19
 */

class ServiceModel extends CI_Model
{
    public function insert($service)
    {
        return $this->db->insert('service', $service);
    }
}