<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">          
        <a href="<?=base_url("log_book");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>
      <div class="row">
        <div class="col-12 col-md-12 col-sm-12 col-lg-4">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="img-fluid img-circle" src="<?=base_url()?>/assets/dist/img/foto-user/<?= ($data_user->row("foto") != null) ? $data_user->row("foto") : "foto-default.png";?>" alt="User profile picture" width = "200px">
              </div>

              <h3 class="profile-username text-center"><?= $data_user->row("nama")?></h3>

              <p class="text-muted text-center"><?= $this->fungsi->get_deskripsi("tb_tipe_user",$data_user->row("tipe_user"))?></p>

              <!-- <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Telp</b> <a class="float-right"><?= $data_user->row("hp")?></a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="float-right">13,287</a>
                </li>
              </ul> -->

              <!-- <a href="#" class="btn btn-block btn-outline-success"><b>Beri Penilaian</b></a> -->
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-12 col-md-12 col-sm-12 col-lg-8">
          <div class="col-12">
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengisian Log Book Bulan Ini</span>
                <span class="info-box-number"><?= $this->fungsi->hitung_rows_multiple("tb_log_book","user_id",$data_user->row("id"),"tgl",date("Y-m"))?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-12">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pengisian Log Book</span>
                <span class="info-box-number"><?= $this->fungsi->hitung_rows("tb_log_book","user_id",$data_user->row("id"))?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-12">
            <div class="info-box">
              <span class="info-box-icon bg-lime"><i class="far fa-gem"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">UPT Poin dari Log Book</span>
                <span class="info-box-number"><?= $this->fungsi->hitung_nilai_multiple("tb_poin","nilai","user_id",$data_user->row("id"),"kategori_penilaian","1") == null ? 0 : $this->fungsi->hitung_nilai("tb_poin","nilai","user_id",$data_user->row("id"))?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="post clearfix">
          <div class="user-block">
          <form action="<?= base_url("log_book/detail/".$this->uri->segment(3))?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="<?= $data_user->row("id") ?>">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
              </div>
              <select name="bulan" class="form-control" required>
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
              <select name="tahun" class="form-control" required>
                <option value="">Tahun</option>
                <?php $thn_skr = date('Y'); for ($x = $thn_skr; $x >= 2018; $x--) {?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="input-group-append">
              <button type="submit" class="btn btn-sm btn-success">Tampilan Log Book</button>
            </div>
          </form>
        </div>
      </div>

      <div class="card-header bg-primary">
        <h3 class="card-title">Riwayat Log Book</h3>
      </div>
      <div class="card">        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="list_admin">
            <thead>
              <tr>
                <th width="50px">No</th>
                <th width="200px">Tanggal</th>
                <th width="500px">Target</th>
                <th width="500px">Realisasi</th>
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