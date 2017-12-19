<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 25/09/2017
 * Time: 23:18
 */

class UserModel extends CI_Model
{
    public function authLogin($email, $password)
    {
        $where = ['email' => $email, 'password' => $password];

        $user = $this->find(NULL, $where);
        return $user;
    }

    public function insert($user)
    {
        $result = $this->db->insert("user", $user);

        return $result;
    }

    public function find($field = NULL,$where = NULL)
    {
        $user = [];
        $this->db->where($where);

        if($this->db->get('user')->num_rows() == 1) {
            $this->db->where($where);
            $user = $this->db->get('user')->row_array();
        }

        return $user;

    }

    public function becomeProfessional()
    {
        $this->db->set('user_professional', TRUE);
        $this->db->where('id', $this->session->userdata('login')['id']);
        $this->db->update('user');
    }

    public function checkStatus()
    {
        $user = $this->find(null, ['id' => $this->session->userdata('login')['id']]);
        $this->db->where('id', $user['id']);
        $user = $this->db->get('user')->row_array();

        return $user['status'];

    }

    public function statusUser()
    {
        $status = $this->checkStatus();
        $this->db->where('id', $this->session->userdata('login')['id']);

        if ($status['status']) {
            $this->db->set('status', FALSE);
            $result = FALSE;
        } else {
            $this->db->set('status', TRUE);
            $result = TRUE;
        }

        $this->db->update('user');
        print_r($result);
        return $result;
    }

    public function findFavorite($professional)
    {
        $user = $this->session->userdata('login')['id'];

        $where = ['id_user' => $user, 'id_professional' => $professional];

        $this->db->where($where);

        if($this->db->get('favorite_professional')->num_rows() == 1) {
            return true;
        }

        return false;
    }

    public function favoriteProfessional($professional)
    {
        $user = $this->session->userdata('login')['id'];
        $fields = ['id_user' => $user, 'id_professional' => $professional];
        if($this->findFavorite($professional)) {
            print_r('lalalalaalal');
            print_r($fields);
            return $this->db->delete('favorite_professional', $fields);
        }

        return $this->db->insert("favorite_professional", $fields);
    }

}