<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
	
	//Kode akses
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email',$post['username']);
		$this->db->where('status','1');
		$this->db->where('password',sha1($post['password']));
		$query = $this->db->get();
		return $query; 
	}

	public function get($id = null)
	{
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}



	//////////////////////
	/////////////////////
	/// PROFIL
	///////////////////	
	///////////////////
	function update_profil($post)
	{
	  //Id	  
	  $params['id'] =  $post['id'];
	  // Kebutuhan User
	  $params['username'] =  $post['username'];
	  if ($post['password'] != null) {
		  $params['password'] =  sha1($post['password']);	  	
	  }
	  $params['nama'] =  $post['nama'];
	  $params['tempat_lahir'] =  $post['tempat_lahir'];
	  $params['tgl_lahir'] =  $post['tgl_lahir'];
	  $params['hp'] =  $post['hp'];
	  $params['agama'] =  $post['agama'];
	  $params['kelamin'] =  $post['kelamin'];
	  $params['provinsi'] =  $post['provinsi'];
	  $params['kota'] =  $post['kota'];
	  $params['kecamatan'] =  $post['kecamatan'];
	  $params['kelurahan'] =  $post['kelurahan'];
	  $params['domisili'] =  $post['domisili'];
	  $params['pernikahan'] =  $post['pernikahan'];
	  $params['pendidikan_terakhir'] =  $post['pendidikan_terakhir'];
	  $params['tahun_bergabung'] =  $post['tahun_bergabung'];
	  if ($post['foto'] != null) {
  	  $params['foto'] =  $post['foto'];
  	} else {
  	  $params['foto'] =  "";
  	}

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_user',$params);
	}	

}
