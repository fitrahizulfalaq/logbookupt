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
        $this->load->library("form_validation");

        $data['menu'] = "Data Form Pendaftaran Luring";
        $this->templateadmin->load('template/dashboard','formluring/formluring_instruksi',$data);
    }

	public function showPelatihan()
	{		
		$this->load->library("form_validation");
        $post = $this->input->post(null, TRUE);
        $uri = $this->uri->segment(3);

        if ($post != null and $uri == null) {
            $kode = $post['kode'];       
        } elseif ($uri != null and $post == null){
        	$kode = $uri;
        } else {
            redirect("formluring");
        }

		$data['menu'] = "Data Formulir Pendaftaran Pelatihan Luring";
		$data['row'] = $this->formluring_m->getByPelatihan($kode);
		$data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-formluring";
		$this->templateadmin->load('template/dashboard','formluring/formluring_data',$data);
	}

	public function showAll()
	{		
		$data['menu'] = "Data Formulir Pendaftaran Pelatihan Luring";
		$data['row'] = $this->formluring_m->getByPelatihan();
		$data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-formluring";
		$this->templateadmin->load('template/dashboard','formluring/formluring_data',$data);
	}

	function hapus(){
	 	$id = $this->uri->segment(3);
		$pelatihan_id = $this->uri->segment(5);

		$itemfoto = $this->formluring_m->get($id)->row();		
		if ($itemfoto->foto != null) {
			$target_file = 'assets/dist/files/formluring/foto/'.$itemfoto->foto;
			unlink($target_file);
		}

		$itemspt = $this->formluring_m->get($id)->row();		
		if ($itemspt->spt != null) {
			$target_file = 'assets/dist/files/formluring/spt/'.$itemspt->spt;
			unlink($target_file);
		}

		$itemktp = $this->formluring_m->get($id)->row();		
		if ($itemktp->ktp != null) {
			$target_file = 'assets/dist/files/formluring/ktp/'.$itemspt->ktp;
			unlink($target_file);
		}

		$itemttd = $this->formluring_m->get($id)->row();		
		if ($itemttd->ttd != null) {
			$target_file = 'assets/dist/files/formluring/ttd/'.$itemspt->ttd;
			unlink($target_file);
		}
		
		$this->formluring_m->hapus($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('formluring/showPelatihan/'.$pelatihan_id);
	}


	public function acc()
	{
		$id = $this->uri->segment(3);
		$pelatihan_id = $this->uri->segment(5);
		$this->formluring_m->acc($id);
		$this->session->set_flashdata('success','Berhasil Di Proses');
		redirect('formluring/showPelatihan/'.$pelatihan_id);
	}

	public function batal()
	{
		$id = $this->uri->segment(3);
		$pelatihan_id = $this->uri->segment(5);
		$this->formluring_m->batal($id);
		$this->session->set_flashdata('warning','Berhasil Di Batalkan');
		redirect('formluring/showPelatihan/'.$pelatihan_id);
	}

	function cetak() {
		//Get Data
		$token = $this->uri->segment(3);
		$pelatihan_id = $this->uri->segment(5);
		$data['row'] = $this->fungsi->pilihan_selected("frm_peserta_pelatihan",$token)->row();
		$data['template'] = $this->fungsi->pilihan_advanced("tb_pelatihan_luring","id",$pelatihan_id)->row("template");
		$this->load->view('formluring/cetak_action',$data);			
	}

	//Tampil di gdoc
	public function showSpt($id)
	{
		$query = $this->formluring_m->getSpt($id);
		if ($query->num_rows() > 0) {
			$file = site_url('assets/dist/files/formluring/spt/'.$query->row("spt"));
			// $data['file'] = base_url('assets/dist/files/formluring/spt/'.$query->row("spt"));
			$data['file'] = $file;
			$this->load->view('formluring/showSpt',$data);
		} else {
			$this->session->set_flashdata('danger','Data Tidak Ditemukan');
			redirect('formluring');
		}	
	}

	//Tampil di broser
	public function tampilSpt($id)
	{
		$query = $this->formluring_m->getSpt($id);
		if ($query->num_rows() > 0) {
			$filename = "assets/dist/files/formluring/spt/".$query->row("spt");
					  
			// Header content type
			header("Content-type: application/pdf");
			  
			header("Content-Length: " . filesize($filename));
			  
			// Send the file to the browser.
			readfile($filename);
		} else {
			$this->session->set_flashdata('danger','Data Tidak Ditemukan');
			redirect('formluring');
		}

		$query = $this->formluring_m->getSpt($id);
		
	}

	//Tampil di broser
	public function tampilKtp($id)
	{
		$query = $this->formluring_m->getSpt($id);
		if ($query->num_rows() > 0) {
			$file = site_url('assets/dist/files/formluring/ktp/'.$query->row("ktp"));
			// $data['file'] = base_url('assets/dist/files/formluring/spt/'.$query->row("spt"));
			$data['file'] = $file;
			$this->load->view('formluring/showKtp',$data);
		} else {
			$this->session->set_flashdata('danger','Data Tidak Ditemukan');
			redirect('formluring');
		}
	}

	public function cetakpdf()
	{
		$this->load->library("cetak");
		$token = $this->uri->segment(3);
		$konten = "formluring/template/pdf/formluringttd";
		$filename = "Formulir Pendaftaran - ".$this->fungsi->pilihan_selected("frm_peserta_pelatihan",$token)->row("nama");
		$data['row'] = $this->fungsi->pilihan_selected("frm_peserta_pelatihan",$token)->row();
		
		//BUlan Lahir
		$xbulan = date("m",strtotime($data['row']->tgl_lahir));
		if ($xbulan == "1") {
		    $data['bulanlahir'] = "Januari";
		} elseif ($xbulan == "2") {
		    $data['bulanlahir'] = "Februari";
		} elseif ($xbulan == "3") {
		    $data['bulanlahir'] = "Maret";
		} elseif ($xbulan == "4") {
		    $data['bulanlahir'] = "April";
		} elseif ($xbulan == "5") {
		    $data['bulanlahir'] = "Mei";
		} elseif ($xbulan == "6") {
		    $data['bulanlahir'] = "Juni";
		} elseif ($xbulan == "7") {
		    $data['bulanlahir'] = "Juli";
		} elseif ($xbulan == "8") {
		    $data['bulanlahir'] = "Agustus";
		} elseif ($xbulan == "9") {
		    $data['bulanlahir'] = "September";
		} elseif ($xbulan == "10") {
		    $data['bulanlahir'] = "Oktober";
		} elseif ($xbulan == "11") {
		    $data['bulanlahir'] = "November";
		} elseif ($xbulan == "12") {
		    $data['bulanlahir'] = "Desember";
		}

		//Bulan TTD
		$ybulan = date("m",strtotime($data['row']->created));
		if ($ybulan == "1") {
		    $data['bulanttd'] = "Januari";
		} elseif ($ybulan == "2") {
		    $data['bulanttd'] = "Februari";
		} elseif ($ybulan == "3") {
		    $data['bulanttd'] = "Maret";
		} elseif ($ybulan == "4") {
		    $data['bulanttd'] = "April";
		} elseif ($ybulan == "5") {
		    $data['bulanttd'] = "Mei";
		} elseif ($ybulan == "6") {
		    $data['bulanttd'] = "Juni";
		} elseif ($ybulan == "7") {
		    $data['bulanttd'] = "Juli";
		} elseif ($ybulan == "8") {
		    $data['bulanttd'] = "Agustus";
		} elseif ($ybulan == "9") {
		    $data['bulanttd'] = "September";
		} elseif ($ybulan == "10") {
		    $data['bulanttd'] = "Oktober";
		} elseif ($ybulan == "11") {
		    $data['bulanttd'] = "November";
		} elseif ($ybulan == "12") {
		    $data['bulanttd'] = "Desember";
		}  
		$this->cetak->formLuring($konten,$filename,$data);		
	}


}
