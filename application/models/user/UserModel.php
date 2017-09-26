<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 25/09/2017
 * Time: 23:18
 */

class UserModel extends CI_Model
{

    public function insertUser($user)
    {
        $this->db->insert("user", $user);
    }

    public function authLogin($email, $password)
    {
        $filter = ['email' => $email, 'password' => $password];
        $this->db->where($filter);
        $user = [];

        if($this->db->get('user')->num_rows() > 0) {
            $user = $this->db->get('user')->row_array();
        }

        return $user;
    }

}