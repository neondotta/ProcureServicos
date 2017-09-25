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
            $distance = 30;
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

        $sql = "SELECT u.name, u.city, u.street, u.latitude, u.longitude, u.email, 
                        p.certificate, p.invoice,
              ( 6371 * acos( cos( radians({$latitude}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) 
              - radians({$longitude}) ) + sin( radians({$latitude}) ) * sin( radians( `latitude` ) ) ) ) AS distance
              FROM user u
                LEFT JOIN professional p
                  ON (u.id = p.id_user)
              WHERE u.user_professional = TRUE
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