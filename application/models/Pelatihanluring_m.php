<?php
 
class Pelatihanluring_m extends CI_Model {
	public function get($id = null)
  {
    $this->db->from('tb_pelatihan_luring');
    if ($id != null) {
      $this->db->where('id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function get_by_kode($kode = null)
  {
    $this->db->from('tb_pelatihan_luring');
    $this->db->where('kode',$kode);
    $query = $this->db->get();
    return $query;
  }


  // DATATABLES
  var $table = 'tb_pelatihan_luring'; //nama tabel dari database
  var $column_order = array(null, 'deskripsi','kota'); //field yang ada di table user
  var $column_search = array('deskripsi','kota'); //field yang diizin untuk pencarian 
  var $order = array('id' => 'desc'); // default order 

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
	
	function simpan($post)
	{
	  $params['id'] =  "";
    $params['deskripsi'] =  $post['deskripsi'];
    $params['header'] =  $post['header'];
    $params['kota'] =  $post['kota'];
    $params['template'] =  $post['template'];
    $params['status'] =  $post['status'];
	  $params['created'] =  date("Y:m:d:h:i:sa");

	  $this->db->insert('tb_pelatihan_luring',$params);
	}

  function update($post)
  {
    $params['id'] =  $post['id'];
    $params['deskripsi'] =  $post['deskripsi'];
    $params['header'] =  $post['header'];
    $params['kota'] =  $post['kota'];
    $params['template'] =  $post['template'];
    $params['status'] =  $post['status'];

    $this->db->where('id',$params['id']);
    $this->db->update('tb_pelatihan_luring',$params);
  }

  function hapus($id){

    $this->db->where('id', $id);
    $this->db->delete('tb_pelatihan_luring');

  }

	
 
}