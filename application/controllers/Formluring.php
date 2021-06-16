<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Modul ini digunakan untuk menambahkan formulir otomatis
	Input -> masuk database -> manajemen data -> edit hapus
	Yang fix itu formluring -> untuk kebutuhan kementrian
	Yang versi umum masih dikembangkan
*/
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

        $data['menu'] = "Data Form";
        $this->templateadmin->load('template/dashboard','formluring/formluring_instruksi',$data);
    }

    /*
		@FitrahIzulFalaq
		Perintah untuk menampilkan seluruh pelatihan
    */
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

		$data['menu'] = "Data Formulir Pendaftaran ";
		$data['row'] = $this->formluring_m->getByPelatihan($kode);
		$data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-formluring";
		$this->templateadmin->load('template/dashboard','formluring/formluring_data',$data);
	}

	/*
		@FitrahIzulFalaq
		Perintah untuk menampilkan seluruh peserta pelatihan
    */
	public function showAll()
	{		
		$data['menu'] = "Data Formulir Pendaftaran ";
		$data['row'] = $this->formluring_m->getByPelatihan();
		$data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-formluring";
		$this->templateadmin->load('template/dashboard','formluring/formluring_data',$data);
	}

	/*
		@FitrahIzulFalaq
		Perintah untuk menghapus data peserta pelatihan
    */
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

	/*
		@FitrahIzulFalaq
		Perintah untuk menampilkan seluruh pelatihan
    */
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

	//Menampilkan KTP kemudian Langsung Cetak
	public function tampilKtp($id)
	{
		$query = $this->formluring_m->get($id);
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

	//Download KTP menggunakan format Word, tak matikan dulu
	public function cetakpdf()
	{
		$this->load->library("cetak");
		$token = $this->uri->segment(3);
		$pelatihan_id = $this->uri->segment(5);
		$templateform = $this->fungsi->pilihan_selected("tb_pelatihan_luring",$pelatihan_id)->row("template"); 
		$konten = "formluring/template/pdf/".$templateform;
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

	public function edit($id)
	{
    	$pelatihan_id = $this->uri->segment(5);
    	$pelatihan_data = $this->fungsi->pilihan_selected("tb_pelatihan_luring",$pelatihan_id);
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('nik', 'nik', 'min_length[16]|max_length[16]');
		$this->form_validation->set_rules('hp', 'hp', 'min_length[11]|max_length[12]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->formluring_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data Modul";
				$data['header_script'] = "summernote-header";
				$data['footer_script'] = "summernote-footer";
				$kategori_form = $pelatihan_data->row("form");
				if ($kategori_form == "kementerian") {
					$this->templateadmin->load('template/dashboard','formluring/edit',$data);
				} else {
					$this->templateadmin->load('template/dashboard','formluring/edit_'.$pelatihan_data->row("template"),$data);
				}			
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				redirect('formluring/showPelatihan/'.$pelatihan_id);
			}
			
	    } else {
	    	$post = $this->input->post(null, TRUE);                         

	    	//CEK GAMBAR
	    	$config['upload_path']          = 'assets/dist/files/formluring/foto/';
	    	$config['allowed_types']        = 'jpg|png|jpeg';
	    	$config['max_size']             = 6000;
	    	$config['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

	    	$this->load->library('upload', $config);
	    	if (@$_FILES['foto']['name'] != null) {                     
	    	        $this->upload->initialize($config);
	    	    if ($this->upload->do_upload('foto')) {
	    	        $post['foto'] = $this->upload->data('file_name');
	    	    } else {
	    	        $pesan = $this->upload->display_errors();
	    	        $this->session->set_flashdata('danger',$pesan);
	    	        redirect('formluring/edit/'.$id.'/pelatihan/'.$pelatihan_id);
	    	    }                           
	    	}

	    	        //CEK GAMBAR
	    	$config2['upload_path']          = 'assets/dist/files/formluring/spt/';
	    	$config2['allowed_types']        = 'pdf';
	    	$config2['max_size']             = 6000;
	    	$config2['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

	    	    $upload_2 = $this->load->library('upload', $config2);
	    	    if (@$_FILES['spt']['name'] != null) {
	    	            $this->upload->initialize($config2);
	    	        if ($this->upload->do_upload('spt')) {
	    	            $post['spt'] = $this->upload->data('file_name');
	    	    } else {
	    	            $pesan = $this->upload->display_errors();
	    	            $this->session->set_flashdata('danger',$pesan);
	    	            redirect('formluring/edit/'.$id.'/pelatihan/'.$pelatihan_id);
	    	    }
	    	}

	    	//CEK GAMBAR
	    	$config3['upload_path']          = 'assets/dist/files/formluring/ktp/';
	    	$config3['allowed_types']        = 'jpg|png|jpeg';
	    	$config3['max_size']             = 6000;
	    	$config3['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

	    	    $upload_3 = $this->load->library('upload', $config3);
	    	    if (@$_FILES['ktp']['name'] != null) {                     
	    	            $this->upload->initialize($config3);
	    	        if ($this->upload->do_upload('ktp')) {
	    	            $post['ktp'] = $this->upload->data('file_name');
	    	    } else {
	    	        $pesan = $this->upload->display_errors();
	    	        $this->session->set_flashdata('danger',$pesan);
	    	        redirect('formluring/edit/'.$id.'/pelatihan/'.$pelatihan_id);
	    	    }                           
	    	}

	    	//CEK GAMBAR
	    	$config4['upload_path']          = 'assets/dist/files/formluring/ttd/';
	    	$config4['allowed_types']        = 'jpg|png|jpeg';
	    	$config4['max_size']             = 6000;
	    	$config4['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

	    	    $upload_4 = $this->load->library('upload', $config4);
	    	    if (@$_FILES['ttd']['name'] != null) {                     
	    	            $this->upload->initialize($config4);
	    	        if ($this->upload->do_upload('ttd')) {
	    	            $post['ttd'] = $this->upload->data('file_name');
	    	    } else {
	    	        $pesan = $this->upload->display_errors();
	    	        $this->session->set_flashdata('danger',$pesan);
	    	        redirect('formluring/edit/'.$id.'/pelatihan/'.$pelatihan_id);
	    	    }                           
	    	}                 
	    	 
	    	$this->formluring_m->update($post);
	    	if ($this->db->affected_rows() > 0) {
	    	    $this->session->set_flashdata('success','Berhasil di edit');
	    	}
	    	redirect('formluring/showPelatihan/'.$post['pelatihan_id']);
	    }
	}


	/*
		@FitrahIzulFalaq
		Menghapus Atribusi File di Form
		START
    */

	function hapusfoto(){
	  	$id = $this->uri->segment(3);
	  	$pelatihan_id = $this->uri->segment(5);
		
		//Action		  
		$itemfoto = $this->formluring_m->get($id)->row();
  		if ($itemfoto->foto != null) {
  			$target_file = 'assets/dist/files/formluring/foto/'.$itemfoto->foto;
  			unlink($target_file);
  		}
  		$params['foto'] = null;

  		$this->db->where('id',$id);
	  	$this->db->update('frm_peserta_pelatihan',$params);
		$this->session->set_flashdata('warning','Foto berhasil dihapus');
		redirect('formluring/edit/'.$id.'/pelatihan/'.$pelatihan_id);	  
	}

	function hapusktp(){
	  	$id = $this->uri->segment(3);
	  	$pelatihan_id = $this->uri->segment(5);
		
		//Action		  
		$itemktp = $this->formluring_m->get($id)->row();
  		if ($itemktp->ktp != null) {
  			$target_file = 'assets/dist/files/formluring/ktp/'.$itemktp->ktp;
  			unlink($target_file);
  		}
  		$params['ktp'] = null;

  		$this->db->where('id',$id);
	  	$this->db->update('frm_peserta_pelatihan',$params);
		$this->session->set_flashdata('warning','KTP berhasil dihapus');
		redirect('formluring/edit/'.$id.'/pelatihan/'.$pelatihan_id);	  
	}

	function hapusttd(){
	  	$id = $this->uri->segment(3);
	  	$pelatihan_id = $this->uri->segment(5);
		
		//Action		  
		$itemttd = $this->formluring_m->get($id)->row();
  		if ($itemttd->ttd != null) {
  			$target_file = 'assets/dist/files/formluring/ttd/'.$itemttd->ttd;
  			unlink($target_file);
  		}
  		$params['ttd'] = null;

  		$this->db->where('id',$id);
	  	$this->db->update('frm_peserta_pelatihan',$params);
		$this->session->set_flashdata('warning','TTD berhasil dihapus');
		redirect('formluring/edit/'.$id.'/pelatihan/'.$pelatihan_id);	  
	}

	function hapusspt(){
	  	$id = $this->uri->segment(3);
	  	$pelatihan_id = $this->uri->segment(5);
		
		//Action		  
		$itemspt = $this->formluring_m->get($id)->row();
  		if ($itemspt->spt != null) {
  			$target_file = 'assets/dist/files/formluring/spt/'.$itemspt->spt;
  			unlink($target_file);
  		}
  		$params['spt'] = null;

  		$this->db->where('id',$id);
	  	$this->db->update('frm_peserta_pelatihan',$params);
		$this->session->set_flashdata('warning','SPT berhasil dihapus');
		redirect('formluring/edit/'.$id.'/pelatihan/'.$pelatihan_id);	  
	}

	/*
		END
		@FitrahIzulFalaq
    */


	/*
		@FitrahIzulFalaq
		Export to Excel menyesuiakn dengan tema yang dibutuhkan
    */
	function exportToExcel ()
	{
		$this->load->library("cetak");
		$pelatihan_id = $this->uri->segment(3);
		$template = $this->fungsi->pilihan_selected("tb_pelatihan_luring",$pelatihan_id)->row("template");
		$konten = "formluring/template/excel/".$template;
		$filename = "Data Pelatihan - ".$this->fungsi->pilihan_selected("tb_pelatihan_luring",$pelatihan_id)->row("deskripsi");
		$data['judul'] = "Data Pelatihan - ".$this->fungsi->pilihan_selected("tb_pelatihan_luring",$pelatihan_id)->row("deskripsi");
		$data['row'] = $this->formluring_m->getByPelatihan($pelatihan_id);

		// test($data['row']);

		$this->cetak->exportToExcel($konten,$filename,$data);
	}




}
