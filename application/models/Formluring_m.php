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
	  $params['nama'] =  $post['nama'];   
	  $params['nik'] =  $post['nik'];   
	  $params['pernikahan'] =  $post['pernikahan'];   
	  $params['kelamin'] =  $post['kelamin'];   
	  $params['tempat_lahir'] =  $post['tempat_lahir'];   
	  $params['tgl_lahir'] =  $post['tgl_lahir'];   
	  $params['agama'] =  $post['agama'];   
	  $params['pendidikan_terakhir'] =  $post['pendidikan_terakhir'];   
	  $params['domisili'] =  $post['domisili'];   
	  $params['daerah_asal'] =  $post['daerah_asal'];   
	  $params['hp'] =  $post['hp'];   
	  $params['email'] =  $post['email'];   
	  $params['status_peserta'] =  $post['status_peserta'];   
	  $params['status_usaha'] =  $post['status_usaha'];   
	  $params['sektor_usaha'] =  $post['sektor_usaha'];   
	  $params['nama_usaha'] =  $post['nama_usaha'];   
	  $params['domisili_usaha'] =  $post['domisili_usaha'];   
	  $params['tipe_usaha'] =  $post['tipe_usaha'];   
	  $params['bidang_usaha'] =  $post['bidang_usaha'];   
	  $params['lama_usaha'] =  $post['lama_usaha'];   
	  $params['jumlah_karyawan'] =  $post['jumlah_karyawan'];   
	  $params['omset'] =  $post['omset'];
	  $params['foto'] =  $post['foto'];
	  $params['spt'] =  $post['spt'];
	  $params['ktp'] =  $post['ktp'];
	  $params['created'] =  date("Y:m:d:h:i:sa");

	  $this->db->insert('frm_peserta_pelatihan',$params);	  	 		  	 		   			
	}
}
