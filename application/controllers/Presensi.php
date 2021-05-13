<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Presensi extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->model('presensi_m');
    }
 
    public function index()
    {       
        $this->load->library("form_validation");

        $data['menu'] = "Data Presensi Zoom";
        $this->templateadmin->load('template/dashboard','presensi/presensi_instruksi',$data);
    }

    public function agenda()
    {       
        $this->load->library("form_validation");

        $post = $this->input->post(null, TRUE);

        if ($post['kode'] != null) {
            $kode = $post['kode'];
        } else {
            redirect("presensi");
        }


        $data['menu'] = "Data Presensi";
        $data['row'] = $this->presensi_m->getByKode($kode);
        $data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-presensi";
        $this->templateadmin->load('template/dashboard','presensi/presensi_data',$data);
    }

    

}