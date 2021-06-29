<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sibantu_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('frm_permohonan');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}

	  // DATATABLES
	  var $table = 'frm_permohonan'; //nama tabel dari database
	  var $column_order = array(null, 'nama','status','created'); //field yang ada di table user
	  var $column_search = array('nama','status','created'); //field yang diizin untuk pencarian 
	  var $order = array('status' => 'asc','created' => 'desc'); // default order 

	  private function _get_datatables_query()
	  {
	    $this->db->from($this->table);
	    $i = 0;
	    foreach ($this->column_search as $item) // looping awal
	    {
	        if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
	        {
	            if($i===0) // looping awal
	            {
	                $this->db->group_start(); 
	                $this->db->like($item, $_POST['search']['value']);
	            }
	            else
	            {
	                $this->db->or_like($item, $_POST['search']['value']);
	            }
	            if(count($this->column_search) - 1 == $i) 
	                $this->db->group_end(); 
	        }
	        $i++;
	    }
	     
	    if(isset($_POST['order'])) 
	    {
	        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	    } 
	    else if(isset($this->order))
	    {
	        $order = $this->order;
	        $this->db->order_by(key($order), $order[key($order)]);
	    }
	  }

	  function get_datatables()
	  {
	    $this->_get_datatables_query();
	    if($_POST['length'] != -1)
	    $this->db->limit($_POST['length'], $_POST['start']);
	    $query = $this->db->get();
	    return $query->result();
	  }

	  function count_filtered()
	  {
	    $this->_get_datatables_query();
	    $query = $this->db->get();
	    return $query->num_rows();
	  }

	  public function count_all()
	  {
	    $this->db->from($this->table);
	    return $this->db->count_all_results();
	  }
		// DATATABLES


	function hapus($id){
	  $this->db->where('id', $id);
	  $this->db->delete("frm_permohonan");
	}	

	function acc($id)
	{		  
	  $params['status'] = "2";

	  $this->db->where('id',$id);
	  $this->db->update("frm_permohonan",$params);
	}

	function tolak($id)
	{		  
	  $params['status'] = "3";

	  $this->db->where('id',$id);
	  $this->db->update("frm_permohonan",$params);
	}

	function batal($id)
	{		  
	  $params['status'] = "1";

	  $this->db->where('id',$id);
	  $this->db->update("frm_permohonan",$params);
	}

	function simpan($post)
	{

	  $params['id'] =  "";
	  $params['nama'] =  strtoupper($post['nama']);   
	  $params['jabatan'] =  strtoupper($post['jabatan']);   
	  $params['nama_usaha'] =  strtoupper($post['nama_usaha']);   
	  $params['domisili_usaha'] =  strtoupper($post['domisili_usaha']);   
	  $params['kelurahan'] =  strtoupper($post['kelurahan']);   
	  $params['kecamatan'] =  strtoupper($post['kecamatan']);   
	  $params['kota'] =  strtoupper($post['kota']);   
	  $params['hp'] =  $post['hp'];   
	  $params['email'] =  $post['email'];   
	  $params['deskripsi_usaha'] =  $post['deskripsi_usaha'];   
	  $params['masalah'] =  $post['masalah'];   
	  $params['solusi'] =  $post['solusi'];   
	  $params['foto'] =  $post['foto'];
	  $params['ttd'] =  $post['ttd'];
	  $params['status'] =  "1";
	  $params['kode'] =  $post['hp'].date("ymd");
	  $params['created'] =  date("Y:m:d:h:i:sa");

	  $this->db->insert('frm_permohonan',$params);	  	 		  	 		   			
	}

	
}
