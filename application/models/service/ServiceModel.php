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

    public function searchService($idUser)
    {
        $id_professional = $this->findProfessionalId($idUser);
        
        $query = $this->db->select('*')
        ->from('service')        
        ->where('id_professional',$id_professional)
        ->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
    }

    public function listServices($idUser)
    {
        $id_professional = $this->findProfessionalId($idUser);
        
        $query = $this->db->select('service.*,user.name, service_status.service_status')
        ->from('service')
        ->where('id_professional',$id_professional)
        ->join('user', 'user.id = service.id_user', 'left')
        ->join('service_status', 'service.status = service_status.cod', 'left')
        ->get();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function findProfessionalId($idUser)
    {
        $sql = $this->db->select('id')
        ->from('professional')
        ->where('id_user',$idUser)
        ->get();

        $id_professional = $sql->row_array()['id'];

        return $id_professional;
    }

    public function getService($serviceId)
    {   
        $query = $this->db->select('service.*,user.name, service_status.service_status')
        ->from('service')
        ->where('service.id',$serviceId)
        ->join('user', 'user.id = service.id_user', 'left')
        ->join('service_status', 'service.status = service_status.cod', 'left')
        ->get();

        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
             
    }
    
    public function acceptService($params,$serviceId)
    {
        $this->db->where('id', $serviceId);
        $this->db->update('service', $params);
        return true;
    }
}