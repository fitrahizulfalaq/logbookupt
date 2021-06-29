<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Modul ini untuk menu sibantu, berisi tentang permohonan pengajuan bantuan dan konsultasi di UPT
*/
class Sibantu extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 2;
		check_super_user($previllage,$this->session->tipe_user);
		$this->load->model('sibantu_m');
	}

	public function index()
    {       
        $previllage = 1;
        check_super_user($this->session->tipe_user,$previllage);
        
        $data['menu'] = "Data Permohonan";
        $data['header_script'] = "datatables-header";
        $data['footer_script'] = "datatables-sibantu";
        $this->templateadmin->load('template/dashboard','sibantu/sibantu_data',$data);
    }

    // DATATABLES
    function get_data_sibantu()
    {
        $list = $this->sibantu_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->created;
            if ($field->status == "1") {
	            $row[] = '<span class="badge badge-info">pendaftaran</span>';
	            $row[] = '<a href="'.base_url("sibantu/detail/".$field->id).'" class="btn btn-info btn-xs"><i class="fas fa-list"></i> Detail Permohonan</a>
                      <a href="'.base_url("sibantu/acc/".$field->id).'" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Proses</a>
                      <a href="'.base_url("sibantu/tolak/".$field->id).'" class="btn btn-warning btn-xs"><i class="fas fa-times"></i> Tolak</a>
            		  <a href="'.base_url("sibantu/hapus/".$field->id).'" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Hapus</a>
            		  <a href="'.base_url("sibantu/print/".$field->id).'" class="btn btn-secondary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>
            		 ';
            } elseif ($field->status == "2") {
	            $row[] = '<span class="badge badge-success">proses</span>';
	            $row[] = '<a href="'.base_url("sibantu/detail/".$field->id).'" class="btn btn-info btn-xs"><i class="fas fa-list"></i> Detail Permohonan</a>
                      <a href="'.base_url("sibantu/batal/".$field->id).'" class="btn btn-primary btn-xs"><i class="fas fa-times"></i> Batalkan</a>
            		  <a href="'.base_url("sibantu/print/".$field->id).'" class="btn btn-secondary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>
            		 ';
            } elseif ($field->status == "3") {
	            $row[] = '<span class="badge badge-danger">ditolak</span>';
	            $row[] = '<a href="'.base_url("sibantu/detail/".$field->id).'" class="btn btn-info btn-xs"><i class="fas fa-list"></i> Detail Permohonan</a>
                      <a href="'.base_url("sibantu/batal/".$field->id).'" class="btn btn-primary btn-xs"><i class="fas fa-times"></i> Batalkan</a>
            		  <a href="'.base_url("sibantu/hapus/".$field->id).'" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Hapus</a>
            		  <a href="'.base_url("sibantu/print/".$field->id).'" class="btn btn-secondary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>
            		 ';
            }
            
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sibantu_m->count_all(),
            "recordsFiltered" => $this->sibantu_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    // DATATABLES

    public function detail()
    {
        $previllage = 1;
        check_super_user($this->session->tipe_user,$previllage);

        $id = $this->uri->segment('3');
        $query = $this->sibantu_m->get($id);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['menu'] = "Detail Permohonan";          
            $this->templateadmin->load('template/dashboard','sibantu/sibantu_detail',$data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            echo "<script>window.location='".site_url('user')."';</script>";
        }
    }

    // Untuk Mendownload formulir secara langsung
    // Menggunakan nik dan pelatihan id
    public function print()
    {
        $this->load->library("cetak");
        $id = $this->uri->segment(3);
        $konten = "formluring/template/pdf/siBantu_form";
        $getData = $this->fungsi->pilihan_selected("frm_permohonan",$id);
        $filename = "Formulir Permohonan - ".$getData->row("nama");
        $data['row'] = $getData->row();

        if ($getData->num_rows() != null) {
            $this->cetak->formLuring($konten,$filename,$data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            echo "<script>window.location='".site_url('sibantu')."';</script>";
        }
    }

	/*
		@FitrahIzulFalaq
		Perintah untuk menghapus data peserta pelatihan
    */
	function hapus(){
	 	$id = $this->uri->segment(3);

		$itemfoto = $this->sibantu_m->get($id)->row();		
		if ($itemfoto->foto != null) {
			$target_file = 'assets/dist/files/formluring/foto/'.$itemfoto->foto;
			unlink($target_file);
		}

		$itemttd = $this->sibantu_m->get($id)->row();		
		if ($itemttd->ttd != null) {
			$target_file = 'assets/dist/files/formluring/ttd/'.$itemttd->ttd;
			unlink($target_file);
		}
		
		$this->sibantu_m->hapus($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('sibantu');
	}


	public function acc()
	{
		$id = $this->uri->segment(3);
		$this->sibantu_m->acc($id);
		$this->session->set_flashdata('success','Berhasil Di Proses');
		redirect('sibantu');
	}

	public function tolak()
	{
		$id = $this->uri->segment(3);
		$this->sibantu_m->tolak($id);
		$this->session->set_flashdata('warning','Berhasil Di Tolak');
		redirect('sibantu');
	}

	public function batal()
	{
		$id = $this->uri->segment(3);
		$this->sibantu_m->batal($id);
		$this->session->set_flashdata('warning','Berhasil Di Batalkan');
		redirect('sibantu');
	}

	/*
		@FitrahIzulFalaq
		Perintah untuk menampilkan seluruh pelatihan
    */
	function cetak() {
		//Get Data
		$token = $this->uri->segment(3);
		$pelatihan_id = $this->uri->segment(5);
		$data['row'] = $this->fungsi->pilihan_selected("frm_peserta_pelatihan",$token)->row();
		$data['template'] = $this->fungsi->pilihan_advanced("tb_pelatihan_luring","id",$pelatihan_id)->row("template");
		$this->load->view('formluring/cetak_action',$data);			
	}

	/*
		@FitrahIzulFalaq
		Export to Excel menyesuiakn dengan tema yang dibutuhkan
    */
	function exportToExcel ()
	{
		$this->load->library("cetak");
		$pelatihan_id = $this->uri->segment(3);
		$template = $this->fungsi->pilihan_selected("tb_pelatihan_luring",$pelatihan_id)->row("template");
		$konten = "formluring/template/excel/".$template;
		$filename = "Data Pelatihan - ".$this->fungsi->pilihan_selected("tb_pelatihan_luring",$pelatihan_id)->row("deskripsi");
		$data['judul'] = "Data Pelatihan - ".$this->fungsi->pilihan_selected("tb_pelatihan_luring",$pelatihan_id)->row("deskripsi");
		$data['row'] = $this->sibantu_m->getByPelatihan($pelatihan_id);

		// test($data['row']);

		$this->cetak->exportToExcel($konten,$filename,$data);
	}




}
