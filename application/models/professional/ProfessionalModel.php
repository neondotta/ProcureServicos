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

    public function findId($id)
    {

        $this->load->model('category/CategoryModel');
        $professional = $this->find($id);


    }

    public function find($where = NULL)
    {
        if ($where != NULL) {
            $this->db->where('id_user', $where);
        }

        $query = $this->db->select('*')
            ->from('professional')
            ->get();

        if ($query->num_rows() == 1) {
            $professional = $query->result_array();

            $this->load->model('category_professional/CategoryProfessionalModel');
            $professional['categories'] = $this->CategoryProfessionalModel->findId($professional[0]['id']);

            return $professional;
        }
    }
}