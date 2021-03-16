<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_book_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_log_book');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_user($id = null) 
	{
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		// $this->db->where('tipe_user','1');
		$query = $this->db->get();
		return $query;
	}

	public function get_user_by_kepala() 
	{
		$this->db->from('tb_user');
		$this->db->where('status','1');
		$this->db->where('id !=',$this->session->id);
		$this->db->order_by('nama','ASC');
		$query = $this->db->get();
		return $query;
	}

	public function get_user_by_pimpinan($pimpinan_id) 
	{
		$this->db->select('tb_struktural.user_id AS id, tb_struktural.pimpinan_id, tb_user.nama');
		$this->db->from('tb_user');
		$this->db->join('tb_struktural', 'tb_struktural.user_id = tb_user.id');
		$this->db->where('tb_struktural.pimpinan_id',$pimpinan_id);
		$query = $this->db->get();
		return $query;
	}

	public function get_bulan_sekarang($id = null) 
	{
		$this->db->from('tb_log_book');
		if ($id != null) {
			$this->db->where('user_id',$id);
		}
		$this->db->like('tgl',date("Y-m"));
		$this->db->order_by("tgl","DESC");
		$query = $this->db->get();
		return $query;
	}

	public function get_spesifik($id = null, $tahun = null, $bulan = null) 
	{
		$this->db->from('tb_log_book');
		if ($id != null) {
			$this->db->where('user_id',$id);
		}
		$this->db->like('tgl',$tahun."-".$bulan);
		$this->db->order_by("tgl","DESC");
		$query = $this->db->get();
		return $query;
	}

	public function get_ranking($id = null) 
	{
		$query = $data=$this->db->query("SELECT id, user_id, nilai, FIND_IN_SET( nilai, ( SELECT GROUP_CONCAT( nilai ORDER BY nilai DESC ) FROM tb_total_poin ) ) AS rank FROM tb_total_poin WHERE user_id =  '$id'")->row("rank");
		return $query;
	}

	public function cek_status_harian($id = null) 
	{
		$this->db->from('tb_log_book');
		if ($id != null) {
			$this->db->where('user_id',$id);
		}
		$this->db->where("tgl",date("Y-m-d"));
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function simpan($post)
	{
	  $params['id'] =  "";
	  $params['user_id'] =  $this->session->id;
	  $params['target'] =  $post['target'];
	  $params['realisasi'] =  $post['realisasi'];
	  $params['tgl'] =  date("Y-m-d");
	  $params['created'] =  date("Y-m-d h:i:sa");

	  $this->db->insert('tb_log_book',$params);	  	 		  	 		   			
	}

	function update($post)
	{

	  $params['id'] =  $post['id'];
	  $params['target'] =  $post['target'];
	  $params['realisasi'] =  $post['realisasi'];

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_log_book',$params);	  	 		  	 		   			
	}

	function apresiasi($id, $nilai,$kode)
	{
	  $params['id'] =  "";
	  $params['user_id'] =  $id;
	  $params['penilai_id'] =  $this->session->id;
	  $params['tgl'] =  date("Y-m-d");
	  $params['kategori_penilaian'] =  $kode;
	  $params['nilai'] =  $nilai;

	  $this->db->insert('tb_poin',$params);	  	 		  	 		   			
	}

	function apresiasi_batal($id, $kode)
	{
	  $this->db->where('user_id', $id);
	  $this->db->where('penilai_id', $this->session->id);
	  $this->db->where('tgl', date("Y-m-d"));
	  $this->db->where('kategori_penilaian', $kode);
	  $this->db->delete('tb_poin');
	}

	function hapus($id){

	  $this->db->where('id', $id);
	  $this->db->delete('tb_log_book');
	}

	function redirect($tipe_user){
		if ($tipe_user == '2') {
			redirect('log_book/pimpinan/');
		} elseif ($tipe_user == '3') {
			redirect('log_book/kepala/');
		} elseif ($tipe_user == '4') {
			redirect('log_book/admin/');
		}
	}



}
