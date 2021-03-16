<?php 

class Fungsi {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function user_login() {
		$this->ci->load->model('user_m');
		$userid = $this->ci->session->userdata('id');
		$query = $this->ci->user_m->get($userid)->row();
		return $query;
	}

	// Row Cepat

	function pilihan($tabel) {		
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function pilihan_selected($tabel,$id) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get();
		return $query;
	}

	function pilihan_advanced($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function pilihan_advanced_multiple($tabel,$kode1,$id1,$kode2,$id2) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->where($kode2,$id2);
		$query = $this->ci->db->get($tabel);
		return $query;
	}


	// Result Cepat
	function get_deskripsi($tabel,$id) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get()->row("deskripsi");
		return $query;
	}

	function get_deskripsi_advanced($tabel,$kode,$id,$perintah) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel)->row($perintah);
		return $query;
	}


	// Hitung Cepat
	function hitung_rows($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_rows_multiple($tabel,$kode1,$id1,$kode2,$id2) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->like($kode2,$id2);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_rows_triple($tabel,$kode1,$id1,$kode2,$id2,$kode3,$id3) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->where($kode2,$id2);
		$this->ci->db->like($kode3,$id3);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_nilai($tabel,$kolom,$kode,$id) {
		$this->ci->db->select_sum($kolom);		
		$this->ci->db->where($kode,$id);		
		$query = $this->ci->db->get($tabel)->row("nilai");
		return $query;
	}

	function hitung_nilai_multiple($tabel,$kolom,$kode1,$id1,$kode2,$id2) {
		$this->ci->db->select_sum($kolom);		
		$this->ci->db->where($kode1,$id1);		
		$this->ci->db->where($kode2,$id2);		
		$query = $this->ci->db->get($tabel)->row("nilai");
		return $query;
	}

	// Fungsi
	function check_access_user($tabel,$id) {
		$this->ci->db->where("user_id",$id);
		$query = $this->ci->db->get($tabel)->num_rows();
		if ($query == null) {
			$this->ci->session->set_flashdata('danger', 'Kamu tidak memiliki akses untuk menu ini');
			redirect('');
		}
		return $query;
	}

}

?>