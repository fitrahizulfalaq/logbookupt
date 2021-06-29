<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('sibantu/acc/'.$row->id);?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Acc</a>          
      <a href="<?= base_url('sibantu/tolak/'.$row->id);?>" class="btn btn-warning btn-sm"><i class="fas fa-times"></i> Tolak</a>          
      <a href="<?= base_url('sibantu/hapus/'.$row->id);?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>          
      <a href="<?= base_url('sibantu');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>

    <?php $this->view('message'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="callout callout-info">
          <h5><i class="fas fa-info"></i> Detail Permohonan</h5>
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                 src="<?=base_url()?>/assets/dist/files/formluring/foto/<?= ($row->foto != null) ? $row->foto : "foto-default.png"; ?>"
                 alt="User profile picture" style="width: 150px; height: 150px">
          </div>
          <hr>
          <h4><b class="text-green">Nama :</b> <?= $row->nama ?> (<?= $row->jabatan ?>)</h4>
          <h5><b class="text-green">Domisili Usaha :</b> <?= $row->domisili_usaha ?>, <?= $row->kelurahan ?>, <?= $row->kecamatan ?>, <?= $row->kota ?></h5>
          <h5><b class="text-green">Email :</b> <?= $row->email ?></h5>
          <h5><b class="text-green">HP :</b> <a href="https://wa.me/62<?= $row->hp?>"><?= $row->hp ?></a></h5>
          <h5><b class="text-green">Tanggal :</b> <?= $row->created ?></h5>
        </div>               
      </div>
      <div class="col-md-12">
        <div class="callout callout-warning">
          <h5><i class="fas fa-warning"></i> Profil Usaha</h5>
          <p>
            <?= $row->deskripsi_usaha?>
          </p>
          <hr>
          <h5><i class="fas fa-warning"></i> Permasalahan</h5>
          <p>
            <?= $row->masalah?>
          </p>
          <hr>
          <h5><i class="fas fa-warning"></i> Solusi yang diharapkan</h5>
          <p>
            <?= $row->solusi?>
          </p>
        </div>               
      </div> 
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
