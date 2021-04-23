<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		check_already_login();
	}

	public function index()
	{
		$data['menu'] = "Selamat datang di APlikasi E-UPT";
		$this->templateadmin->load('template/publik','page/landing_publik',$data);
	}

	public function notulensi()
	{
        $this->load->model('notulensi_m');
        $kode = $this->uri->segment(3);
        $query = $this->notulensi_m->get_by_kode($kode);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['menu'] = "Hasil Notulensi : ".$query->row("acara");          
            $this->templateadmin->load('template/publik','notulensi/notulensi_publik',$data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            echo "<script>window.location='".site_url('publik')."';</script>";
        }
	}	

	public function agenda()
	{
        $this->load->model('agenda_m');
		$data['menu'] = "Agenda Terdekat";
        $query = $this->agenda_m->getLastMouth();
        $data['row'] = $query;
        $this->templateadmin->load('template/publik','agenda/agenda_publik',$data);	
	}

	public function sdm()
	{
		$data['menu'] = "Profil Pegawai UPT";
		$data['row'] = $this->fungsi->pilihan("tb_user");
		$data['header_script'] = "datatables-header";
		$data['footer_script'] = "datatables-sdm";
        $this->templateadmin->load('template/publik','user/sdm_publik',$data);	

	}


}
