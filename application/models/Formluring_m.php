<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class formluring_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('frm_peserta_pelatihan');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getByPelatihan($id = null) 
	{
		$this->db->from('frm_peserta_pelatihan');
		if ($id != null) {
			$this->db->where('pelatihan_id',$id);
		}

		$this->db->order_by('status','asc');
		$this->db->order_by('created','asc');
		$this->db->order_by('nama','asc');
		$query = $this->db->get();
		return $query;
	}

	public function getSpt($id) 
	{
		$this->db->from('frm_peserta_pelatihan');
		$this->db->where('id',$id);
		$this->db->where('spt !=',"");
		$query = $this->db->get();
		return $query;
	}

	public function get_data($token, $link) 
	{
		$this->db->from('tb_'.$link);
		if ($token != null) {
			$this->db->where('token',$token);
		}
		$query = $this->db->get();
		return $query;
	}


	function hapus($id){
	  $this->db->where('id', $id);
	  $this->db->delete("frm_peserta_pelatihan");
	}	

	function acc($id)
	{		  
	  $params['status'] = "2";

	  $this->db->where('id',$id);
	  $this->db->update("frm_peserta_pelatihan",$params);
	}

	function batal($id)
	{		  
	  $params['status'] = "1";

	  $this->db->where('id',$id);
	  $this->db->update("frm_peserta_pelatihan",$params);
	}

	function simpan($post)
	{

	  $params['id'] =  "";
	  $params['pelatihan_id'] = $post['pelatihan_id'];
	  $params['nama'] =  strtoupper($post['nama']);   
	  $params['nik'] =  strtoupper($post['nik']);   
	  $params['pernikahan'] =  $post['pernikahan'];   
	  $params['kelamin'] =  $post['kelamin'];   
	  $params['tempat_lahir'] =  strtoupper($post['tempat_lahir']);   
	  $params['tgl_lahir'] =  $post['tgl_lahir'];   
	  $params['agama'] =  $post['agama'];   
	  $params['pendidikan_terakhir'] =  $post['pendidikan_terakhir'];   
	  $params['domisili'] =  strtoupper($post['domisili']);   
	  $params['daerah_asal'] =  strtoupper($post['daerah_asal']);   
	  $params['hp'] =  $post['hp'];   
	  $params['email'] =  $post['email'];   
	  $params['status_peserta'] =  $post['status_peserta'];   
	  $params['status_usaha'] =  $post['status_usaha'];   
	  $params['sektor_usaha'] =  $post['sektor_usaha'];   
	  $params['nama_usaha'] =  strtoupper($post['nama_usaha']);   
	  $params['domisili_usaha'] =  strtoupper($post['domisili_usaha']);   
	  $params['tipe_usaha'] =  $post['tipe_usaha'];   
	  $params['bidang_usaha'] =  $post['bidang_usaha'];   
	  $params['lama_usaha'] =  $post['lama_usaha'];   
	  $params['jumlah_karyawan'] =  $post['jumlah_karyawan'];   
	  $params['omset'] =  $post['omset'];
	  $params['foto'] =  $post['foto'];
	  $params['spt'] =  $post['spt'];
	  $params['ktp'] =  $post['ktp'];
	  $params['ttd'] =  $post['ttd'];
	  $params['created'] =  date("Y:m:d:h:i:sa");

	  $this->db->insert('frm_peserta_pelatihan',$params);	  	 		  	 		   			
	}

	function update($post)
	{

	  $params['id'] =  $post['id'];
	  $params['nama'] =  strtoupper($post['nama']);   
  	  $params['nik'] =  strtoupper($post['nik']);   
  	  $params['pernikahan'] =  $post['pernikahan'];   
  	  $params['kelamin'] =  $post['kelamin'];   
  	  $params['tempat_lahir'] =  strtoupper($post['tempat_lahir']);   
  	  $params['tgl_lahir'] =  $post['tgl_lahir'];   
  	  $params['agama'] =  $post['agama'];   
  	  $params['pendidikan_terakhir'] =  $post['pendidikan_terakhir'];   
  	  $params['domisili'] =  strtoupper($post['domisili']);   
  	  $params['daerah_asal'] =  strtoupper($post['daerah_asal']);   
  	  $params['hp'] =  $post['hp'];   
  	  $params['email'] =  $post['email'];   
  	  $params['status_peserta'] =  $post['status_peserta'];   
  	  $params['status_usaha'] =  $post['status_usaha'];   
  	  $params['sektor_usaha'] =  $post['sektor_usaha'];   
  	  $params['nama_usaha'] =  strtoupper($post['nama_usaha']);   
  	  $params['domisili_usaha'] =  strtoupper($post['domisili_usaha']);   
  	  $params['tipe_usaha'] =  $post['tipe_usaha'];   
  	  $params['bidang_usaha'] =  $post['bidang_usaha'];   
  	  $params['lama_usaha'] =  $post['lama_usaha'];   
  	  $params['jumlah_karyawan'] =  $post['jumlah_karyawan'];   
  	  $params['omset'] =  $post['omset'];
	  
	  if ($post['spt'] != null) {
	  	$params['spt'] =  $post['spt'];
  	  }

	  if ($post['foto'] != null) {
  	  	$params['foto'] =  $post['foto'];
  	  }

  	  if ($post['ttd'] != null) {
  	  	$params['ttd'] =  $post['ttd'];
  	  }

  	  if ($post['ktp'] != null) {
  	  	$params['ktp'] =  $post['ktp'];
  	  }

	  $this->db->where('id',$params['id']);
	  $this->db->update('frm_peserta_pelatihan',$params);	  	 		  	 		   			
	}

	function siBantuSave($post)
	{

	  $params['id'] =  "";
	  $params['nama'] =  strtoupper($post['nama']);   
	  $params['jabatan'] =  strtoupper($post['jabatan']);   
	  $params['nama_usaha'] =  strtoupper($post['nama_usaha']);   
	  $params['domisili_usaha'] =  strtoupper($post['domisili_usaha']);   
	  $params['kelurahan'] =  strtoupper($post['kelurahan']);   
	  $params['kecamatan'] =  strtoupper($post['kecamatan']);   
	  $params['kota'] =  strtoupper($post['kota']);   
	  $params['hp'] =  $post['hp'];   
	  $params['email'] =  $post['email'];   
	  $params['deskripsi_usaha'] =  $post['deskripsi_usaha'];   
	  $params['masalah'] =  $post['masalah'];   
	  $params['solusi'] =  $post['solusi'];   
	  $params['foto'] =  $post['foto'];
	  $params['ttd'] =  $post['ttd'];
	  $params['status'] =  "pendaftaran";
	  $params['kode'] =  $post['hp'].date("ymd");
	  $params['created'] =  date("Y:m:d:h:i:sa");

	  $this->db->insert('frm_permohonan',$params);	  	 		  	 		   			
	}
	
}
