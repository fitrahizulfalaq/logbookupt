<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {

	//Perintah Semua Disini
  function get_kota(){
      $id=$this->input->post('id');
      $data=$this->db->query("SELECT * FROM regencies WHERE province_id='$id'")->result();
      echo json_encode($data);
  }

  function get_kecamatan(){
      $id=$this->input->post('id');
      $data=$this->db->query("SELECT * FROM districts WHERE regency_id='$id'")->result();      
      echo json_encode($data);
  }

  function get_kelurahan(){
      $id=$this->input->post('id');
      $data=$this->db->query("SELECT * FROM villages WHERE district_id='$id'")->result();
      echo json_encode($data);
  }

}
