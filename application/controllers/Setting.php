<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id')){
			redirect(base_url('/authuser/login'));
		}
	}

	public function index()
	{
		$data['title_page'] = 'Setting';
		$this->load->view('setting/index', $data);
	}
}
