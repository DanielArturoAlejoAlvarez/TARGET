<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('layouts/head');
		$this->load->view('layouts/aside');
		$this->load->view('layouts/header');
		
		$this->load->view('admin/dashboard');
		$this->load->view('layouts/footer');
	}

}
