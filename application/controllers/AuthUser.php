<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthUser extends CI_Controller
{

    public function login()
    {
        $data['title_page'] = "Login";
        if (isset($_POST['login'])) {
            $user = $_POST['username'];
            $password = md5($_POST['password']);

            $query = $this->db->query('SELECT * FROM user WHERE name="' . $user . '" OR email="' . $user . '"')->row();
            if ($query) {
                if ($password == $query->password) {
                    $token = md5($query->id . time());
                    $this->db->query('UPDATE user SET token="' . $token . '" WHERE id=' . $query->id);
                    $this->session->set_userdata(['user_id' => $token]);
                    redirect(base_url());
                } else {
                    $this->session->set_flashdata('message', 'invalid password');
                }
            } else {
                $this->session->set_flashdata('message', 'user not found');
            }
        }
        $this->load->view('auth/login', $data);
    }

    public function register()
    {
        $this->load->library('form_validation');
        $data['title_page'] = "Register";
        if (isset($_POST['daftar'])) {
            $this->form_validation->set_rules([
                [
                    'field' => 'name',
                    'label' => 'Name',
                    'rules' => 'required'
                ],
                [
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email'
                ],
                [
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required'
                ],
                [
                    'field' => 're-password',
                    'label' => 'Retype Password',
                    'rules' => 'required|matches[password]'
                ]
            ]);

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', 'invalid data');
            } else {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $query = $this->db->query('INSERT INTO user (id, name, email, password, token, created) VALUES (NULL, "'.$name.'", "'.$email.'", "'.$password.'", NULL, CURRENT_TIMESTAMP)');
                if($query){
                    redirect(base_url('authuser/login'));
                }else{
                    $this->session->set_flashdata('message', 'gagal daftar');
                }
            }
        }
        $this->load->view('auth/register', $data);
    }

    public function logout($id)
    {
        $this->db->query('UPDATE user SET token=NULL WHERE token=' . $id);
        $this->session->unset_userdata('user_id');
        redirect(base_url('authuser/login'));
    }
}
