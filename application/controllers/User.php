<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id')){
			redirect(base_url('/authuser/login'));
		}
	}

	public function index()
	{
		$data['title_page'] = 'User';
		$token = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT user.id as id, user.name as name, user.email as email, picture_profile.name_file as filename, picture_profile.path as path FROM user JOIN picture_profile ON user.photo_profile=picture_profile.id WHERE token='".$token."'")->row();
		if($query == null){
			$query = $this->db->query("SELECT * FROM user  WHERE token='".$token."'")->row();
		}
		$profile_data = [
			'id' => $query->id,
			'username' => $query->name,
			'email' => $query->email,
			'filename' => null,
			'path' => null,
		];
		$data['profile'] = $profile_data;
		$this->load->view('user/index', $data);
	}

    public function profile(){

    }

    public function update_profile($id){
		if ($this->input->method() == 'post') {
			$base_path = "C:\laragon\www\template-project";
			$type = $_FILES['file']['type'];
			$ori_name = $_FILES['file']['name'];
			$filename = date('dd-mm-yy').'_'.$ori_name.'.'.$type;
			$config['upload_path']          = $base_path.'/upload/profile/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['file_name']            = $filename;
			$config['overwrite']            = true;
			$config['max_size']             = 1024; // 1MB
			$config['max_width']            = 1080;
			$config['max_height']           = 1080;
	
			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload('profile')) {
				var_dump($this->upload->display_errors());
				// $data['error'] = $this->upload->display_errors();
			} else {
				$uploaded_data = $this->upload->data();
	
				redirect(base_url('user'));
			}
		}
		$query = $this->db->query("SELECT user.id as id,  picture_profile.name_file as filename, picture_profile.path as path FROM user JOIN picture_profile ON user.photo_profile=picture_profile.id WHERE user.id=".$id)->row();
		if($query == null){
			$query = $this->db->query("SELECT * FROM user  WHERE id=".$id)->row();
		}
		$data['title_page'] = 'User';
		$profile_data = [
			'id' => $query->id,
			'username' => $query->name,
			'email' => $query->email,
			'filename' => null,
			'path' => null,
		];
		$data['profile'] = $profile_data;
		return $this->load->view('user/update', $data);
    }
}
