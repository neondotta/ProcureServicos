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
    function __construct()
    {
        parent::__construct();
    }

    public function getClosestMap($longitude, $latitude, $type, $distance = NULL)
    {
        if($distance == NULL){
            $distance = 10;
        }

        $sql = "SELECT user.name,CONCAT(latitude,',', longitude) as pos,
              'http://maps.google.com/mapfiles/ms/icons/green.png' AS icon,
              ( 6371 * acos( cos( radians({$latitude}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) 
              - radians({$longitude}) ) + sin( radians({$latitude}) ) * sin( radians( `latitude` ) ) ) ) AS distance,
              CONCAT(user.id,',',user.name) as infoUser
              FROM user
              HAVING distance <= {$distance}
              ORDER BY distance ASC";

        return $this->getClosestLocations($sql);
    }

    public function getClosestList($longitude, $latitude, $type, $distance = NULL)
    {
        if($distance == NULL){
            $distance = 10;
        }

        $sql = "SELECT name, city, street, latitude, longitude, email,
              ( 6371 * acos( cos( radians({$latitude}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) 
              - radians({$longitude}) ) + sin( radians({$latitude}) ) * sin( radians( `latitude` ) ) ) ) AS distance
              FROM user
              HAVING distance <= {$distance}
              ORDER BY distance ASC";

        return $this->getClosestLocations($sql);

    }


    public function getClosestLocations($query)
    {
        $result = $this->db->query($query)->result_array();

        return $result;
    }
}