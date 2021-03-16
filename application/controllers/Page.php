<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		redirect("dashboard");
	}

	public function tentang()
	{
		$data['menu'] = "Tentang Pengembang";
		$this->templateadmin->load('template/dashboard','page/tentang',$data);
	}

	public function pembuat()
	{
		$data['menu'] = "Biodata Pembuat";
		$this->templateadmin->load('template/dashboard','page/pembuat',$data);
	}
}
