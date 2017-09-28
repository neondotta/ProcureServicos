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
        $filter = $this->db->where($where);
        $user = [];

        $user = $this->find(NULL, $filter);

        return $user;
    }

    public function insert($user)
    {
        $result = $this->db->insert("user", $user);

        return $result;
    }

    public function find($field = NULL,$filter = NULL)
    {
        $user = [];

        if($this->db->get('user')->num_rows() == 1) {
            $user = $this->db->get('user')->row_array();
        }

        return $user;
    }

}