<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <div class="card-header">
        <a href="<?=base_url('notulensi');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
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
              <label>Acara</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="acara" placeholder="Ex: Pengumuman Bagi Petani" value="<?= set_value('acara');?>" required>
              </div>                            
              <?php echo form_error('acara')?>                        
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" class="form-control" name="tgl" value="<?= set_value('tgl');?>" required>
              </div>                            
              <?php echo form_error('tgl')?>                        
            </div>
            <div class="form-group">
              <label>Waktu</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="waktu" placeholder="Ex: 13:00 s.d. Selesai" value="<?= set_value('waktu');?>" required>
              </div>                            
              <?php echo form_error('waktu')?>                        
            </div>
            <div class="form-group">
              <label>Tempat</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-building"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="tempat" placeholder="Ex: R. KA UPT" value="<?= set_value('tempat');?>" required>
              </div>                            
              <?php echo form_error('tempat')?>                        
            </div>
            <div class="form-group">
              <label>Undangan</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-users"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="undangan" placeholder="Ex: Fitrah, UUN, Udhif, dll" value="<?= set_value('undangan');?>" required>
              </div>                            
              <?php echo form_error('undangan')?>                        
            </div>
            <div class="form-group">
              <label>Pimpinan Rapat</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="pimpinan" placeholder="Ex: Pengumuman Bagi Petani" value="<?= set_value('pimpinan');?>" required>
              </div>                            
              <?php echo form_error('pimpinan')?>                        
            </div>

            <div class="form-group">
              <label>Pembahasan</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="3" name="pembahasan" id="summernote" required style="width: 100%"><?php echo form_error('pembahasan')?></textarea>                
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

