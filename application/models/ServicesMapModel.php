<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 22/09/2017
 * Time: 10:11
 */

class ServicesMapModel extends CI_Model
{
    function getClosestLocations($longitude, $latitude, $id)
    {

        $result = $this->db->query(
          "SELECT user.name,CONCAT(latitude,',', longitude) as pos,
          'http://maps.google.com/mapfiles/ms/icons/green.png' AS icon,
          ( 6371 * acos( cos( radians({$latitude}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) - radians({$longitude}) ) 
          + sin( radians({$latitude}) ) * sin( radians( `latitude` ) ) ) ) AS distance
          FROM user
              WHERE user.id = 1
          HAVING distance <= 30
          ORDER BY distance ASC"
        )->result_array();
        return $result;
    }
}