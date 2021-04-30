<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- /.col -->
      <div class="col-md-12 col-sm-12 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Terima Kasih Kepada </span>
            <span class="info-box-number"><?= $this->fungsi->countValue("tb_agenda","total_peserta");?> peserta dari <?= $this->fungsi->pilihan_advanced("tb_agenda","tgl <=",date("Y-m-d"))->num_rows();?> agenda</span>
            <span class="info-box-text"><?= $this->fungsi->pilihan_advanced("tb_agenda","tgl >",date("Y-m-d"))->num_rows();?> mendatang | <?= $this->fungsi->pilihan("tb_agenda")->num_rows();?> terlaksana</span>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="callout callout-info">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="publicTable">
            <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="95%">Acara</th>
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
                    <p>
                      <?= date("d- m-Y",strtotime($data->tgl))?><br>
                      <small><?= $data->waktu_mulai?> s.d. <?= $data->waktu_selesai?></small><br>
                      <small class="badge badge-warning"><?= $data->acara?></small><br>
                      <?= $data->tema != null ? $data->tema : "<i>Belum ada tema</i>"?><br>
                      <small><?= $data->pimpinan?></small>
                    </p>
                    <p></p>
                  </td>
                </tr>
              <?php }?>
            </tbody>             
          </table>
          </div>
        </div>               
      </div>      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
