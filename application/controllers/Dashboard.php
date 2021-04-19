<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$this->load->model("agenda_m");
		$data['menu'] = "Dashboard E-UPT";
		$data['row'] = $this->agenda_m->getThisDay();		
		$this->templateadmin->load('template/dashboard','page/beranda',$data);
	}
}
