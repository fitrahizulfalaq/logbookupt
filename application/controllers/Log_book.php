<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_book extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 1;
		check_super_user($this->session->tipe_user,$previllage);
		$this->load->model('log_book_m');
	}

	public function index()
	{		
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$id = $this->session->id;
		} elseif ($tipe_user == '2') {
			redirect('log_book/pimpinan/');
		} elseif ($tipe_user == '3') {
			redirect('log_book/kepala/');
		} elseif ($tipe_user == '4') {
			redirect('log_book/admin/');
		}

		$data['menu'] = "Kegiatan Harian";
		$data['row'] = $this->log_book_m->get_bulan_sekarang($id);
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$this->templateadmin->load('template/dashboard','log_book/log_book_data',$data);
	}

	public function admin()
	{		
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			redirect('log_book');
		} elseif ($tipe_user == '2') {
			$id = $this->session->id;
			$data['row'] = $this->log_book_m->get_user_by_pimpinan($this->fungsi->pilihan_advanced("tb_pimpinan","user_id",$this->session->id)->row("id") );
		} else {
			$id = $this->session->id;
			$data['row'] = $this->log_book_m->get_user_by_kepala();
		}

		$data['menu'] = "Catatan Log Book";
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$this->templateadmin->load('template/dashboard','log_book/log_book_data_admin',$data);
	}

	public function kepala()
	{		
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 3;
		if ($tipe_user < $previllage) {
			redirect('log_book');
		} else {
			$id = $this->session->id;
		}

		$data['menu'] = "Catatan Log Book";
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$data['row'] = $this->log_book_m->get_user_by_kepala();
		$this->templateadmin->load('template/dashboard','log_book/log_book_data_kepala',$data);
	}

	public function pimpinan()
	{		
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			redirect('log_book');
		} else {
			$id = $this->session->id;
		}

		$data['menu'] = "Catatan Log Book";
		$data['row'] = $this->log_book_m->get_bulan_sekarang($id);
		$data['row_user'] = $this->log_book_m->get_user_by_pimpinan($this->fungsi->pilihan_advanced("tb_pimpinan","user_id",$this->session->id)->row("id") );		
		$data['status_log_book'] = $this->log_book_m->cek_status_harian($id);
		$this->templateadmin->load('template/dashboard','log_book/log_book_data_pimpinan',$data);
	}

	public function detail()
	{		
		// Cek Admin
		$tipe_user = $this->session->tipe_user;
		$previllage = 2;
		if ($tipe_user < $previllage) {
			$this->session->set_flashdata('warning', 'Detail hanya bisa dilihat oleh admin');
			redirect('log_book');
		} else {
			$id = $this->uri->segment('3');
		}

		//Cek pimpinan
		$jabatan = $this->fungsi->pilihan_advanced("tb_pimpinan","user_id",$this->session->id)->row("id");
		if ($this->fungsi->hitung_rows_multiple("tb_struktural","pimpinan_id",$jabatan,"user_id",$id) == null and $this->session->tipe_user < 3) {
			$this->session->set_flashdata('warning', 'Hanya bisa melihat detail log book bawahannya');
			redirect('log_book');
		}

		//Cek Post
		$post = $this->input->post(null, TRUE);
		if ($post == null or $post['tahun'] == null or $post['bulan'] == null) {
			$data['row'] = $this->log_book_m->get_bulan_sekarang($id);
		} else {
			$data['row'] = $this->log_book_m->get_spesifik($post['id'],$post['tahun'],$post['bulan']);			
		}

		// var_dump($data['row']->result());
		// die();

		$data['menu'] = "Kegiatan Harian";
		$data['data_user'] = $this->log_book_m->get_user($id);
		$data['ranking'] = $this->log_book_m->get_ranking($id);
		$this->templateadmin->load('template/dashboard','log_book/log_book_detail',$data);
	}

	function apresiasi(){

	  // Cek Admin
	  $tipe_user = $this->session->tipe_user;
	  $previllage = 2;
	  if ($tipe_user < $previllage) {
	  	$this->session->set_flashdata('warning', 'apresiasi hanya boleh dilakukan oleh kepala UPT');
	  	redirect('log_book');
	  } else {
	  	$id = $this->uri->segment('3');
	  }

	  $nilai = $this->fungsi->pilihan_advanced("ms_kategori_penilaian","kode","log_book")->row("nilai");
	  $kode = $this->fungsi->pilihan_advanced("ms_kategori_penilaian","kode","log_book")->row("id");
	  
	  // Cek sudah input atau belum
	  $cek_input = $this->fungsi->hitung_rows_triple("tb_poin","user_id",$data->id,"penilai_id",$this->session->id,"tgl",date("Y-m-d"));
	  if ($cek_input == null) {
		$this->log_book_m->apresiasi($id,$nilai,$kode);
	  	$this->session->set_flashdata('success','Telah diapresiasi');
		$this->log_book_m->redirect($this->session->tipe_user);
	  } else {
	  	$this->session->set_flashdata('warning','Hanya bisa mengapresiasi satu kali');
		$this->log_book_m->redirect($this->session->tipe_user);
	  }
	}

	function apresiasi_batal(){

	  // Cek Admin
	  $tipe_user = $this->session->tipe_user;
	  $previllage = 2;
	  if ($tipe_user < $previllage) {
	  	$this->session->set_flashdata('warning', 'Pembatalan Apresiasi hanya boleh dilakukan oleh kepala UPT');
	  	redirect('log_book');
	  } else {
	  	$id = $this->uri->segment('3');
	  }

	  $nilai = $this->fungsi->pilihan_advanced("ms_kategori_penilaian","kode","log_book")->row("nilai");
	  $kode = $this->fungsi->pilihan_advanced("ms_kategori_penilaian","kode","log_book")->row("id");
	  
	  // Cek sudah input atau belum
	  $cek_input = $this->fungsi->hitung_rows_multiple("tb_poin","user_id",$id,"tgl",date("Y-m-d"));
	  if ($cek_input == null) {
	  	$this->session->set_flashdata('warning','Belum ada Apresiasi');
		$this->log_book_m->redirect($this->session->tipe_user);
	  } else {
		$this->log_book_m->apresiasi_batal($id,$kode);
	  	$this->session->set_flashdata('success','Apresiasi Telah DIbatalkan');
		$this->log_book_m->redirect($this->session->tipe_user);
	  }

	}

	public function tambah()
	{	
		// Cek Udah Mengisi Atau Belum
		$status_log_book = $this->log_book_m->cek_status_harian($this->session->id);
		if ($status_log_book == 1) {
			$this->session->set_flashdata('warning','Anda Sudah Mengisi, hanya bisa mengisi satu kali');
			redirect('log_book','refresh');
		}

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('target', 'target', 'min_length[30]|max_length[5000]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data Log Book";
			$this->templateadmin->load('template/dashboard','log_book/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->log_book_m->simpan($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Berhasil Disimpan');
	        }	
	        	redirect('log_book');	        	
	    }
	}

	public function edit($id)
	{	
		check_right_user_edit($this->fungsi->pilihan_selected("tb_log_book",$id)->row("user_id"),$this->session->id);
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('target', 'target', 'min_length[30]|max_length[5000]');
		$this->form_validation->set_rules('realisasi', 'realisasi', 'min_length[30]|max_length[5000]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->log_book_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data Log Book";			
				$this->templateadmin->load('template/dashboard','log_book/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('log_book')."';</script>";
			}
			
	    } else {
	        $post = $this->input->post(null, TRUE);        
	        $this->log_book_m->update($post);
	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Berhasil Di Edit');
	        }	
	        redirect('log_book');
	    }
	}

	function hapus(){	
	  $id = $this->uri->segment(3);
	  $this->log_book_m->hapus($id);
	  $this->session->set_flashdata('danger','Berhasil Di Hapus');
	  redirect('log_book');
	}
		
}
