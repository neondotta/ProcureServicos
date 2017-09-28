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

        $user = [];

        $user = $this->find(NULL, $where);
        echo 'find user';
        print_r($user);
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

}