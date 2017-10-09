<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 03/10/2017
 * Time: 23:06
 */

class CategoryProfessionalModel extends CI_Model
{
    public function insert($data)
    {
        $professional['id_professional'] = $data['idProfessional'];

        foreach($data['category'] as $value){
            $professional['id_category'] = $value;
            $this->db->insert('category_professional', $professional);
        }
    }

    public function findId($id)
    {
        $categories_professional = $this->db->where('id_professional', $id)
                                        ->get('category_professional')
                                        ->result_array();

        $categories = [];

        foreach($categories_professional as $category) {
           array_push($categories,$category['id_category']);
        }

        $this->load->model('category/CategoryModel');
        return $this->CategoryModel->findId($categories);

    }
}