<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <div class="card-header">
        <a href="<?=base_url('tipe_surat');?>" class="btn btn-info float-right"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="post">
          <div class="card-body">
            <div class="form-group">
              <label>Kode</label>              
              <input type="text" class="form-control" name="kode" placeholder="Ex: SPPD" required="" value="<?= set_value('kode'); ?>">
              <?php echo form_error('kode')?>                        
            </div>
            <div class="form-group">
              <label>Link</label>              
              <input type="text" class="form-control" name="link" placeholder="Ex: surat_domisili" required="" value="<?= set_value('link'); ?>">
              <?php echo form_error('link')?>                        
            </div>
            <div class="form-group">
              <label>Tabel</label>              
              <input type="text" class="form-control" name="tabel" placeholder="Ex: tb_surat_domisili" required="" value="<?= set_value('tabel'); ?>">
              <?php echo form_error('tabel')?>                        
            </div>
            <div class="form-group">
              <label>No Surat</label>              
              <input type="text" class="form-control" name="no_surat" placeholder="Ex: N/1/2020" required="" value="<?= set_value('no_surat'); ?>">
              <?php echo form_error('no_surat')?>                        
            </div>
            <div class="form-group">
              <label>Judul</label>              
              <input type="text" class="form-control" name="judul" placeholder="Ex: Surat Domisili" required="" value="<?= set_value('judul'); ?>">
              <?php echo form_error('judul')?>                        
            </div>
            <div class="form-group">
              <label>Deskripsi</label>              
              <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan deskripsi" required="" value="<?= set_value('deskripsi'); ?>">
              <?php echo form_error('deskripsi')?>                        
            </div>
            <div class="form-group">
              <label>Tampilkan di Beranda?</label>
              <select class="form-control" name="prioritas" required>
                <option value="" selected>Pilihan : </option>
                <option value="1">Tampilkan</option>
                <option value="2">Cukup di Menu</option>
              </select>                
              <?php echo form_error('prioritas')?>
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
        </form>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>