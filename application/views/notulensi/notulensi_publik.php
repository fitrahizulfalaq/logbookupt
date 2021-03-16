<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="callout callout-info">
          <h5><i class="fas fa-info"></i> Detail Notulensi</h5>
          <hr>
          <h4><b class="text-green">Acara :</b> <?= $row->acara ?></h4>
          <h5><b class="text-green">Tanggal :</b> <?= date('d - m - Y', strtotime($row->tgl)) ?></h5>
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
