<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class formluring extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 2;
		check_super_user($previllage,$this->session->tipe_user);
		$this->load->model('formluring_m');
	}

	public function index()
	{		
		$data['menu'] = "Data formluring Surat";
		$data['row'] = $this->formluring_m->get();
		$this->templateadmin->load('template/dashboard','formluring/formluring_data',$data);
	}

	public function tambah()
	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[3]|is_unique[tb_formluring.deskripsi]|max_length[100]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data formluring Surat";
			$this->templateadmin->load('template/dashboard','formluring/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->formluring_m->simpan($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Berhasil Disimpan');
	        }	
	        	redirect('formluring');	        	
	    }
	}

	function hapus(){	
	  $token = $this->uri->segment(3);
	  $surat = $this->uri->segment(5);
	  $this->formluring_m->hapus($token,$surat);
	  $this->session->set_flashdata('danger','Berhasil Di Hapus');
	  redirect('formluring');
	}


	public function edit()
	{	
		//Get Data
		$token = $this->uri->segment(3);
		$tipe_surat = $this->uri->segment(4);
	  $link = $this->fungsi->pilihan_selected("tb_tipe_surat",$tipe_surat)->row("link");

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('username', 'username', 'min_length[3]|max_length[20]|alpha_dash');
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[100]');
		$this->form_validation->set_rules('password', 'password', 'min_length[8]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->formluring_m->get_data($token,$link);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['surat'] = $this->fungsi->pilihan_advanced("tb_tipe_surat","link",$link)->row();
				$data['menu'] = "Verifikasi Data";			
				$this->templateadmin->load('template/dashboard','formluring/surat/edit/'.$link,$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('formluring')."';</script>";
			}
			
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->formluring_m->acc_surat($post);
	        if ($this->db->affected_rows() > 0) {
	        	//Langsung download nanti disini
	        	$this->session->set_flashdata('success','Berhasil Di Proses. Silahkan Cetak Surat anda <a href="formluring/cetak/'.$post['token'].'/surat/'.$post['tipe_surat'].'"> Disini.. </a>');
	        }
	        redirect('formluring');	        
	    }
	}

	function cetak() {
			//Get Data
			$token = $this->uri->segment(3);
			$data['row'] = $this->fungsi->pilihan_selected("frm_peserta_pelatihan",$token)->row();
			$this->load->view('formluring/cetak_action',$data);			
	}	
}
