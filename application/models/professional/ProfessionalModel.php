<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 01/10/2017
 * Time: 10:25
 */

class ProfessionalModel extends CI_Model
{
    public function insert($professional)
    {
        $result = $this->db->insert("professional", $professional);

        return $result;
    }
}