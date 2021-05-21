<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <div class="card-header">
        <a href="<?=base_url('pelatihanluring');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <?php $this->view('message') ?>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Deskripsi</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="deskripsi" placeholder="Ex: Pembukuan Sederhana Bagi UMKM" value="<?= set_value('deskripsi');?>">
              <?php echo form_error('deskripsi')?>
            </div>
            <div class="form-group">
              <label>Header</label>
              <div class="input-group mb-3">
                <textarea class="form-control" name="header" placeholder="Ex: BIODATA PESERTA PELATIHAN<br>KOPERASI/UMKM/KELOMPOK STATEGIS<br>DIGITALISASI UMKM<br>TANGGAL 27 SD 29 MEI 2021<br>KABUPATEN PASURUAN<br>"><?= set_value('header');?></textarea>
              <?php echo form_error('header')?>
            </div>
            <div class="form-group">
              <label>Kota</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="kota" placeholder="Ex: Probolinggo" value="<?= set_value('kota');?>">
              <?php echo form_error('kota')?>
            </div>

            <div class="form-group">
              <label>Template Word</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="template" placeholder="Ex: digitalisasi-umkm" value="<?= set_value('template');?>">
              <?php echo form_error('template')?>
            </div>
            
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Tambah</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>

