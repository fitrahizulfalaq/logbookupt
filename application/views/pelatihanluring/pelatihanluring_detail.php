<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('pelatihanluring/edit/'.$row->id);?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>          
      <a href="<?= base_url('pelatihanluring/hapus/'.$row->id);?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>          
      <a href="<?= base_url('pelatihanluring');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>

    <?php $this->view('message'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="callout callout-info">
          <h5><i class="fas fa-info"></i> Detail pelatihanluring</h5>
          <hr>
          <h4><b class="text-green">Acara :</b> <?= $row->acara ?></h4>
          <h5><b class="text-green">Tanggal :</b> <?= $row->tgl ?></h5>
          <h5><b class="text-green">Waktu :</b> <?= $row->waktu ?></h5>
          <h5><b class="text-green">Tempat :</b> <?= $row->tempat ?></h5>
          <h5><b class="text-green">Undangan :</b> <?= $row->undangan ?></h5>
          <h5><b class="text-green">Pimpinan Rapat :</b> <?= $row->pimpinan ?></h5>
        </div>               
      </div>
      <div class="col-md-12">
        <div class="callout callout-warning">
          <h5><i class="fas fa-warning"></i> Hasil Rapat</h5>
          <hr>
          <p>
            <?= $row->pembahasan?>
          </p>
        </div>               
      </div>      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
