<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		check_already_login();
	}

	public function index()
	{
		$data['menu'] = "Selamat datang di APlikasi E-UPT";
		$this->templateadmin->load('template/publik','page/landing_publik',$data);
	}

	public function notulensi()
	{
        $this->load->model('notulensi_m');
        $kode = $this->uri->segment(3);
        $query = $this->notulensi_m->get_by_kode($kode);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['menu'] = "Hasil Notulensi : ".$query->row("acara");          
            $this->templateadmin->load('template/publik','notulensi/notulensi_publik',$data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            echo "<script>window.location='".site_url('publik')."';</script>";
        }
	}	

	public function agenda()
	{
        $this->load->model('agenda_m');
		$data['menu'] = "Agenda Terdekat";
        $query = $this->agenda_m->getLast();
        $data['row'] = $query;
        $this->templateadmin->load('template/publik','agenda/agenda_publik',$data);	
	}

	public function sdm()
	{
		$data['menu'] = "Profil Pegawai UPT";
		$data['row'] = $this->fungsi->pilihan("tb_user");
		$data['header_script'] = "datatables-header";
		$data['footer_script'] = "datatables-sdm";
        $this->templateadmin->load('template/publik','user/sdm_publik',$data);	

	}

	public function presensi()
	{
        //Load librarynya dulu
        $this->load->library('form_validation');
		$this->load->model('presensi_m');
		$kode = $this->uri->segment(3);
        //Atur validasinya
        $this->form_validation->set_rules('pembahasan', 'pembahasan', 'min_length[3]');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        $this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['menu'] = "Presensi Pelatihan";
			$data['kode'] = $this->uri->segment(3);
        	$this->templateadmin->load('template/publik','presensi/daftar',$data);
        } else {
            $post = $this->input->post(null, TRUE);         
            $this->presensi_m->absen($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Berhasil Presensi');
            }   
            redirect('publik/presensi/'.$kode);             
            // redirect('https://go.uptkukm.id/join-'.$kode);             
        }	
	}

    public function daftarLuring()
    {
        //Load librarynya dulu
        $this->load->library('form_validation');
        $this->load->model('formluring_m');
        //Atur validasinya
        $this->form_validation->set_rules('nik', 'nik', 'min_length[16]|is_unique[frm_peserta_pelatihan.nik]|max_length[16]');
        $this->form_validation->set_rules('hp', 'hp', 'min_length[11]|is_unique[frm_peserta_pelatihan.hp]|max_length[12]');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['menu'] = "Tambah Data Modul";

            $this->templateadmin->load('template/iframe','formluring/tambah',$data);
        } else {
            $post = $this->input->post(null, TRUE);                         

            //CEK GAMBAR
            $config['upload_path']          = 'assets/dist/files/formluring/foto/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 6000;
            $config['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

            $this->load->library('upload', $config);
            if (@$_FILES['foto']['name'] != null) {                     
                    $this->upload->initialize($config);
                if ($this->upload->do_upload('foto')) {
                    $post['foto'] = $this->upload->data('file_name');
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger',$pesan);
                    redirect('publik/daftarluring');
                }                           
            }

                    //CEK GAMBAR
            $config2['upload_path']          = 'assets/dist/files/formluring/spt/';
            $config2['allowed_types']        = 'pdf';
            $config2['max_size']             = 6000;
            $config2['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

                $upload_2 = $this->load->library('upload', $config2);
                if (@$_FILES['spt']['name'] != null) {
                        $this->upload->initialize($config2);
                    if ($this->upload->do_upload('spt')) {
                        $post['spt'] = $this->upload->data('file_name');
                } else {
                        $pesan = $this->upload->display_errors();
                        $this->session->set_flashdata('danger',$pesan);
                        redirect('publik/daftarluring');
                }
            }

            //CEK GAMBAR
            $config3['upload_path']          = 'assets/dist/files/formluring/ktp/';
            $config3['allowed_types']        = 'jpg|png|jpeg';
            $config3['max_size']             = 6000;
            $config3['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

                $upload_3 = $this->load->library('upload', $config3);
                if (@$_FILES['ktp']['name'] != null) {                     
                        $this->upload->initialize($config3);
                    if ($this->upload->do_upload('ktp')) {
                        $post['ktp'] = $this->upload->data('file_name');
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger',$pesan);
                    redirect('publik/daftarluring');
                }                           
            }

            //CEK GAMBAR
            $config4['upload_path']          = 'assets/dist/files/formluring/ttd/';
            $config4['allowed_types']        = 'jpg|png|jpeg';
            $config4['max_size']             = 6000;
            $config4['file_name']            = strtoupper($post['nik'] . " - " . $post['pelatihan_id']);

                $upload_4 = $this->load->library('upload', $config4);
                if (@$_FILES['ttd']['name'] != null) {                     
                        $this->upload->initialize($config4);
                    if ($this->upload->do_upload('ttd')) {
                        $post['ttd'] = $this->upload->data('file_name');
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger',$pesan);
                    redirect('publik/daftarluring');
                }                           
            }                 
             
            $this->formluring_m->simpan($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Pendaftaran Berhasil...');
            }           
            redirect('publik/daftarluring');                
        }
    }


}
