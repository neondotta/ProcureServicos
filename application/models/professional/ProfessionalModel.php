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

    public function findId($id, $find)
    {
        $this->load->model('category/CategoryModel');
        return $this->find($id, $find);
    }

    public function find($where = NULL, $find = NULL)
    {
        if ($where != NULL) {
            $this->db->where($find, $where);
        }

        $query = $this->db->select('professional.*,user.name, user.email, user.name_picture, user.address_picture')
            ->from('professional')
            ->join('user', 'user.id = professional.id_user', 'inner')
            ->get();

        if ($query->num_rows() > 0) {
            $professional['professional'] = $query->row_array();

            $this->load->model('category_professional/CategoryProfessionalModel');
            $professional['categories'] = $this->CategoryProfessionalModel->findId($professional['professional']['id']);
            return $professional;
        }
    }
}