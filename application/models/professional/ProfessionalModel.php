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
        return $this->find($id);
    }

    public function find($where = NULL)
    {
        if ($where != NULL) {
            $this->db->where('id_user', $where);
        }

        $query = $this->db->select('*')
            ->from('professional')
            ->get();

        if ($query->num_rows() > 0) {
            $professional['professional'] = $query->row_array();
            $this->load->model('category_professional/CategoryProfessionalModel');
            $professional['categories'] = $this->CategoryProfessionalModel->findId($professional['professional']['id']);
            return $professional;
        }
    }
}