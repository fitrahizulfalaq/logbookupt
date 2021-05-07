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
        $query = $this->agenda_m->getLast();
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

	public function presensi()
	{
        //Load librarynya dulu
        $this->load->library('form_validation');
		$this->load->model('presensi_m');
		$kode = $this->uri->segment(3);
        //Atur validasinya
        $this->form_validation->set_rules('pembahasan', 'pembahasan', 'min_length[3]');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['menu'] = "Presensi Pelatihan";
			$data['kode'] = $this->uri->segment(3);
        	$this->templateadmin->load('template/publik','presensi/daftar',$data);
        } else {
            $post = $this->input->post(null, TRUE);         
            $this->presensi_m->absen($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Berhasil Presensi');
            }   
            redirect('publik/presensi/'.$kode);             
            // redirect('https://go.uptkukm.id/join-'.$kode);             
        }	
	}


}
