<?php
 
class Presensi_m extends CI_Model {
  
  function absen($post)
  {
    $params['id'] =  $post['nama'];
    $params['status'] =  "1";
    $params['login'] =  date("Y:m:d:h:m:sa");

    $this->db->where('id',$params['id']);
    $this->db->update('tb_peserta',$params);
  }
	
 
}