<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('log_book');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Target</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="5" col="5" name="target" id="summernote1" required minlength="100"></textarea>
                <?php echo form_error('target')?>                
              </div>                                                                  
            </div>
            <div class="form-group">
              <label>Realisasi</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="5" col="5" name="realisasi" id="summernote2" minlength="100"></textarea>
                <?php echo form_error('realisasi')?>                
              </div>                                                                  
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
