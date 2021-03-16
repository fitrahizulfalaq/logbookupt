<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
    <div class="col-12">     
      <div class="card-header">          
        <a href="<?=base_url("");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>
      <?php if ($this->session->tipe_user == '2') { $this->load->view("template/message/status_log_book"); } ?>  
      <div class="card-header bg-primary">
        <h3 class="card-title">Laporan Log Book Hari Ini (<?= date("d/m/Y")?>)</h3>
      </div>        
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="list_admin">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="15%">Nama</th>
                <th width="30%">Target</th>
                <th width="30%">Realisasi</th>
                <th width="20%">#</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
                <tr>
                  <td scope="row">
                    <p><?= $no++?></p>
                  </td>                  
                  <td scope="row">
                    <p><?= $data->nama?></p>
                  </td>
                  <td scope="row">
                    <?= $this->fungsi->pilihan_advanced_multiple("tb_log_book","user_id",$data->id,"tgl",date("Y-m-d"))->row("target") == null ? '<span class="badge badge-danger"> Belum Mengisi </span>' : $this->fungsi->pilihan_advanced_multiple("tb_log_book","user_id",$data->id,"tgl",date("Y-m-d"))->row("target")?>
                  </td>
                  <td scope="row">
                    <?= $this->fungsi->pilihan_advanced_multiple("tb_log_book","user_id",$data->id,"tgl",date("Y-m-d"))->row("realisasi") == null ? '<span class="badge badge-danger"> Belum Mengisi </span>' : $this->fungsi->pilihan_advanced_multiple("tb_log_book","user_id",$data->id,"tgl",date("Y-m-d"))->row("target")?>
                  </td>                  
                  <td>
                    <a href="<?= site_url('log_book/detail/'.$data->id);?>" class="btn btn-info btn-sm"><i class="fas fa-list"></i> Detail</a>
                    <?php if ($this->fungsi->hitung_rows_multiple("tb_poin","user_id",$data->id,"tgl",date("Y-m-d")) == null) {?>
                      <a href="<?= site_url('log_book/apresiasi/'.$data->id);?>" class="btn btn-success btn-sm"><i class="fas fa-gem"></i> Apresiasi</a>
                    <?php } else { ?>
                      <a href="<?= site_url('log_book/apresiasi_batal/'.$data->id);?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal Apresiasi</a>
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
<!-- /.content --