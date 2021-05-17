<?php
 
class Presensi_m extends CI_Model {
  
  public function get($id = null) 
	{
		$this->db->from('tb_agenda');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;

	}

  function absen($post)
  {
    $params['id'] =  $post['nama'];
    $params['status'] =  "1";
    $params['login'] =  date("Y:m:d:h:m:sa");

    $this->db->where('id',$params['id']);
    $this->db->update('tb_peserta',$params);
  }

  function getByKode($kode = null) 
  {
  	$this->db->order_by("status","asc");
  	$this->db->from('tb_peserta');
  	if ($kode != null) {
  		$this->db->where('agenda',$kode);
  	}
  	$query = $this->db->get();
  	return $query;
  }
	
 
}