<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 25/09/2017
 * Time: 23:03
 */

class LoginController extends IndexCore
{
    public function index()
    {
        $this->view('login/login');
    }

    public function authLogin()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->load->model('user/UserModel');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $user = $this->UserModel->authLogin($email, $password);
        echo 'return user';
        print_r($user);
        if ($user) {
            $this->session->set_userdata('login', $user);
            redirect(base_url());
        }

        $this->session->set_flashdata('error', 'E-mail ou senha inválida');
        redirect(base_url('LoginController'));

    }

    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->set_flashdata('success', 'Deslogado');
        redirect('/');
    }
}