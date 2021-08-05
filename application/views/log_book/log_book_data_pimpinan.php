<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
    <div class="col-12">
      <div class="card-header">          
        <a href="<?=base_url("");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>
      <?php $this->load->view("template/message/status_log_book"); ?>
      <form action="<?= base_url("log_book/pimpinan/")?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="id" value="<?= $this->session->id ?>">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
          </div>
          <select name="bulan" class="form-control form-control-sm" required>
            <option value="">Bulan :</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
          <select name="tahun" class="form-control form-control-sm" required>
            <option value="">Tahun</option>
            <?php $thn_skr = date('Y'); for ($x = $thn_skr; $x >= 2018; $x--) {?>
                <option value="<?php echo $x ?>"><?php echo $x ?></option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Filter</button>
        </div>  
      <div class="card-header bg-primary">
        <h3 class="card-title">Laporan Log Book Hari Ini (<?= date("d/m/Y")?>)</h3>
      </div>
      <div class="card">        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="list">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="10%">Tanggal</th>
                <th width="50%">Target</th>
                <th width="50%">Realisasi</th>
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
                    <p><?= date("d - m - Y",strtotime($data->tgl))?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->target?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->realisasi?></p>
                  </td>
                  <td>
                    <a href="<?= site_url('log_book/edit/'.$data->id);?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
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
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="list_admin">
            <thead>
              <tr>
                <!-- <th width="5%">No</th> -->
                <th width="15%">Nama</th>
                <th width="30%">Target</th>
                <th width="30%">Realisasi</th>
                <th width="20%">#</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row_user->result() as $key => $data) {;
              ?>
                <tr>
<!--                   <td scope="row">
                    <p><?= $no++?></p>
                  </td> -->                  
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
                    <?php if ($this->fungsi->hitung_rows_triple("tb_poin","user_id",$data->id,"penilai_id",$this->session->id,"tgl",date("Y-m-d")) == null) {?>
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