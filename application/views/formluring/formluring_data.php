<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">
        <a href="<?=base_url("formluring/exportToExcel/".$row->row("pelatihan_id"));?>" class="btn btn-sm btn-success"><i class="fas fa-file-excel"></i> Export to Excel</a>
        <a href="<?=base_url("formluring");?>" class="btn btn-sm btn-info float-right"><i class="fas fa-backward"></i> Kembali</a>
      </div>

      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="example1">
            <thead>
            <tr align="center">
              <th width="5%">No</th>
              <th width="20%">Pelatihan</th>
              <th width="20%">Nama</th>
              <th width="10%">Status</th>
              <th width="10%">Biodata</th>
              <th width="20%">Keperluan</th>
              <th width="20%">#</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
                <tr>
                  <td><?= $no++?></td>
                  <td><?= $this->fungsi->get_deskripsi("tb_pelatihan_luring",$data->pelatihan_id) ?></td>
                  <td>
                    <?= $data->nama?><br>
                    <small><?= $data->nik?></small>                      
                  </td>
                  <td>                    
                    <?= $data->status == "2" ? '<span class="badge badge-success"> Sudah di Cek </span>' : '<span class="badge badge-warning"> Belum di Cek </span>'?><br>
                    <small><?= date('H:i d-m-Y',strtotime($data->created))?></small>                    
                  </td>
                  <td>                    
                    <!-- <a href="<?= site_url('formluring/cetak/'.$data->id.'/pelatihan/'.$data->pelatihan_id);?>" class="btn btn-sm btn-info"><i class='fas fa-file-word'></i></a> -->
                    <a href="<?= site_url('formluring/cetakpdf/'.$data->id.'/pelatihan/'.$data->pelatihan_id);?>" target="_blank" class="btn btn-sm btn-warning"><i class='fas fa-file-pdf'></i></a>
                  </td>
                  <td>
                    <a href="<?= site_url('assets/dist/files/formluring/foto/'.$data->foto)?>" target="_blank" class="btn btn-sm btn-info"><i class='fas fa-camera'></i> FOTO</a>
                    <a href="<?= site_url('formluring/tampilKtp/'.$data->id);?>" target="_blank" class="btn btn-sm btn-primary"><i class='fas fa-user'></i> KTP</a>
                    <?php if ($data->spt != null) { ?>
                    <a href="<?= site_url('formluring/tampilSPT/'.$data->id);?>" target="_blank" class="btn btn-sm btn-secondary"><i class='fas fa-book'></i> SPT</a>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if ($data->status == "1") { ?>
                      <a href="<?= site_url('formluring/acc/'.$data->id.'/pelatihan/'.$data->pelatihan_id);?>" class="btn btn-sm btn-success"><i class='fas fa-check'></i></a>                  
                      <a href="<?= site_url('formluring/edit/'.$data->id.'/pelatihan/'.$data->pelatihan_id);?>" class="btn btn-sm btn-info"><i class='fas fa-edit'></i></a>                
                      <a href="<?= site_url('formluring/hapus/'.$data->id.'/pelatihan/'.$data->pelatihan_id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin mau dihapus?')"><i class='fas fa-trash'></i></a>                
                    <?php } else { ?>
                      <a href="<?= site_url('formluring/batal/'.$data->id.'/pelatihan/'.$data->pelatihan_id);?>" class="btn btn-sm btn-warning"><i class='fas fa-ban'></i></a>        
                    <?php } ?>
                  </td>
                </tr>
            	 <?php }?>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->