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

	public function get_data($token, $link) 
	{
		$this->db->from('tb_'.$link);
		if ($token != null) {
			$this->db->where('token',$token);
		}
		$query = $this->db->get();
		return $query;
	}


	function hapus($token,$surat){
	  $this->db->where('token', $token);
	  $this->db->delete('frm_peserta_pelatihan');

	  $tabel_surat = $this->fungsi->pilihan_selected("tb_tipe_surat",$surat)->row("tabel");
	  $this->db->where('token', $token);
	  $this->db->delete($tabel_surat);
	}	

	function acc_surat($post)
	{
		  
	  // Masukkan di Database Surat
	  $token = $post['token'];
	  $tabel = 'tb_'.$post['link'];

	  //Keterangan Umum
	  $params['nama'] =  ucwords(strtolower($post['nama']));	  
	  $params['ttl'] =  $post['ttl'];	  
	  $params['kelamin'] =  $post['kelamin'];	  
	  $params['kenegaraan'] =  ucwords(strtolower($post['kenegaraan']));	  
	  $params['agama'] =  ucwords(strtolower($post['agama']));	  
	  $params['pekerjaan'] =  ucwords(strtolower($post['pekerjaan']));	  
	  $params['perkawinan'] =  ucwords(strtolower($post['perkawinan']));	  
	  $params['alamat'] =  $post['alamat'];	  
	  $params['nik'] =  $post['nik'];	  
	  $params['status'] =  '1';	  

	  if ($tabel == 'tb_surat_domisili_penduduk') {
	  	$params['ket_domisili'] =  $post['ket_domisili'];
	  } elseif ($tabel == 'tb_surat_kehilangan') {
	  	$params['jenis_berkas'] =  $post['jenis_berkas'];
	  	$params['no_berkas'] =  $post['no_berkas'];
	  	$params['pemilik_berkas'] =  $post['pemilik_berkas'];	  	
	  } elseif ($tabel == 'tb_surat_keterangan_penghasilan') {
	  	$params['ket_surat'] =  $post['ket_surat'];
	  	$params['umur'] =  $post['umur'];
	  	$params['gaji_perbulan'] =  $post['gaji_perbulan'];
	  	$params['tanggungan_keluarga'] =  $post['tanggungan_keluarga'];
	  } elseif ($tabel == 'tb_surat_keterangan_tidak_mampu') {
	  	$params['nama_penerima'] =  $post['nama_penerima'];
	  	$params['ttl_penerima'] =  $post['ttl_penerima'];
	  	$params['kelamin_penerima'] =  $post['kelamin_penerima'];
	  	$params['sekolah'] =  $post['sekolah'];
	  	$params['alamat_sekolah'] =  $post['alamat_sekolah'];
	  } elseif ($tabel == 'tb_surat_keterangan_umum') {
	  	$params['ket_pembuatan'] =  $post['ket_pembuatan'];
	  } elseif ($tabel == 'tb_surat_keterangan_usaha') {
	  	$params['nama_usaha'] =  $post['nama_usaha'];
	  	$params['jenis_usaha'] =  $post['jenis_usaha'];
	  	$params['jumlah_usaha'] =  $post['jumlah_usaha'];
	  	$params['alamat_usaha'] =  $post['alamat_usaha'];
	  } elseif ($tabel == 'tb_surat_pindah') {
	  	$params['jumlah_pengikut'] =  $post['jumlah_pengikut'];
	  	$params['alasan'] =  $post['alasan'];
	  	$params['pendidikan'] =  $post['pendidikan'];

	  	$params['dusun_asal'] =  $post['dusun_asal'];
	  	$params['rt_asal'] =  $post['rt_asal'];
	  	$params['rw_asal'] =  $post['rw_asal'];
	  	$params['desa_asal'] =  $post['desa_asal'];
	  	$params['kecamatan_asal'] =  $post['kecamatan_asal'];
	  	$params['kabupaten_asal'] =  $post['kabupaten_asal'];

	  	$params['dusun_tujuan'] =  $post['dusun_tujuan'];
	  	$params['rt_tujuan'] =  $post['rt_tujuan'];
	  	$params['rw_tujuan'] =  $post['rw_tujuan'];
	  	$params['desa_tujuan'] =  $post['desa_tujuan'];
	  	$params['kecamatan_tujuan'] =  $post['kecamatan_tujuan'];
	  	$params['kabupaten_tujuan'] =  $post['kabupaten_tujuan'];
	  	

	  	$params['nama_pengikut1'] =  $post['nama_pengikut1'];
	  	$params['kelamin_pengikut1'] =  $post['kelamin_pengikut1'];
	  	$params['pendidikan_pengikut1'] =  $post['pendidikan_pengikut1'];
	  	$params['hubungan_pengikut1'] =  $post['hubungan_pengikut1'];
	  	
	  	$params['nama_pengikut2'] =  $post['nama_pengikut2'];
	  	$params['kelamin_pengikut2'] =  $post['kelamin_pengikut2'];
	  	$params['pendidikan_pengikut2'] =  $post['pendidikan_pengikut2'];
	  	$params['hubungan_pengikut2'] =  $post['hubungan_pengikut2'];
	  	
	  	$params['nama_pengikut3'] =  $post['nama_pengikut3'];
	  	$params['kelamin_pengikut3'] =  $post['kelamin_pengikut3'];
	  	$params['pendidikan_pengikut3'] =  $post['pendidikan_pengikut3'];
	  	$params['hubungan_pengikut3'] =  $post['hubungan_pengikut3'];
	  }
	 	
	  $params['no_surat'] =  $this->fungsi->pilihan_advanced($tabel,"status","1")->num_rows()+ 1;	  
	  $params['tgl_surat'] =  date('Y:m:d');	  
	  $params['keperluan'] =  $post['keperluan'];	  
	  $params['created'] =  date('Y:m:d:h:i:sa');	  
	  	    
	  $this->db->where('token',$token);
	  $this->db->update($tabel,$params);

	  //Masukkan di Log
	  $log['status'] =  '1';	  
	  $this->db->where('token',$token);
	  $this->db->update("frm_peserta_pelatihan",$log);

	}

}
