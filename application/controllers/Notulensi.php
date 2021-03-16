<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class notulensi extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->model('notulensi_m');
        $this->fungsi->check_access_user("akses_notulensi",$this->session->id);
    }
 
    function index(){
        $previllage = 1;
        check_super_user($this->session->tipe_user,$previllage);
        
        $data['menu'] = "Data notulensi";
        $this->templateadmin->load('template/dashboard','notulensi/notulensi_data',$data);
    }

    public function detail()
    {
        $previllage = 1;
        check_super_user($this->session->tipe_user,$previllage);

        $id = $this->uri->segment('3');
        $query = $this->notulensi_m->get($id);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['menu'] = "Profil notulensi";          
            $this->templateadmin->load('template/dashboard','notulensi/notulensi_detail',$data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            echo "<script>window.location='".site_url('user')."';</script>";
        }
    }
 
    // DATATABLES
    function get_data_notulensi()
    {
        $list = $this->notulensi_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kode;
            $row[] = $field->acara;
            $row[] = '<a href="'.base_url("notulensi/detail/".$field->id).'" class="btn btn-success btn-xs"><i class="fas fa-list"></i> Lihat Hasil</a>
            		  <a href="'.base_url("notulensi/edit/".$field->id).'" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Edit</a>
            		  <a href="'.base_url("notulensi/hapus/".$field->id).'" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Hapus</a>
            		 ';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->notulensi_m->count_all(),
            "recordsFiltered" => $this->notulensi_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    // DATATABLES
    

    // FORM EKSEKUSI
    public function tambah()
    {   
        //Load librarynya dulu
        $this->load->library('form_validation');
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
            $data['menu'] = "Tambah Data notulensi";
            $this->templateadmin->load('template/dashboard','notulensi/tambah',$data);
        } else {
            $post = $this->input->post(null, TRUE);         
            $this->notulensi_m->simpan($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Data notulensi Berhasil Ditambahkan');
            }   
            redirect('notulensi');             
        }
    }

    public function edit($id)
	{			
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('pembahasan', 'pembahasan', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->notulensi_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data notulensi";			
				$this->templateadmin->load('template/dashboard','notulensi/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('notulensi')."';</script>";
			}

	    } else {
	      $post = $this->input->post(null, TRUE);
	      $this->notulensi_m->update($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Edit');
	    	}	  	 	
	        redirect('notulensi');
	    }	        
	}

	function hapus(){
		$id = $this->uri->segment(3);
		
		$this->notulensi_m->hapus($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('notulensi');
	}

}