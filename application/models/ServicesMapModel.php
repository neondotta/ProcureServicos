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

        $idUser = $this->session->userdata('login')['id'] ? $this->session->userdata('login')['id'] : 0;

        $sql = "SELECT u.name,CONCAT(u.latitude,',', u.longitude) as pos,
              'http://maps.google.com/mapfiles/ms/icons/green.png' AS icon,
              ( 6371 * acos( cos( radians({$latitude}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) 
              - radians({$longitude}) ) + sin( radians({$latitude}) ) * sin( radians( `latitude` ) ) ) ) AS distance,
              CONCAT(u.id,',',u.name) as infoUser
              FROM user u
              INNER JOIN professional p
                  ON (u.id = p.id_user)
              WHERE u.user_professional = TRUE AND p.id != {$idUser}
              HAVING distance <= {$distance}
              ORDER BY distance ASC";

        return $this->getClosestLocations($sql);
    }

    public function getClosestList($longitude, $latitude, $type, $distance = NULL)
    {
        if($distance == NULL){
            $distance = 30;
        }

        $idUser = $this->session->userdata('login')['id'] ? $this->session->userdata('login')['id'] : 0;

        $sql = "SELECT u.id userId, u.name, u.city, u.street, u.latitude, u.longitude, u.email, 
                       p.id professionalId, p.certificate, p.invoice,
              ( 6371 * acos( cos( radians({$latitude}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) 
              - radians({$longitude}) ) + sin( radians({$latitude}) ) * sin( radians( `latitude` ) ) ) ) AS distance
              FROM user u
                INNER JOIN professional p
                  ON (u.id = p.id_user)
              WHERE u.user_professional = TRUE AND p.id != {$idUser}
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