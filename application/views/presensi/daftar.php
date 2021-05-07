<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">      
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h6><i class="icon fas fa-info"></i>Pilih Nama / Usaha Kamu kemudian klik Join Kelas. Secara Otomatis anda akan bergabung melalui zoom meeting</h6>
      </div>
      <div class="card card-primary">
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Nama / Usaha</label>
              <div class="input-group mb-3">
                <select name="nama" class="form-control select2" required >
                  <option value="<?= set_value('nama');?>">Ketikkan Nama / Usaha Kamu</option>
                  <?php
                    $this->db->where("agenda",$kode);
                    foreach ($this->fungsi->pilihan("tb_peserta")->result() as $key => $pilihan) {;
                  ?>
                  <option value="<?= $pilihan->id?>"><?= $pilihan->nama?> / <?= $pilihan->usaha?></option>
                  <?php }?>
                </select>
              </div>                            
              <?php echo form_error('nama')?>                        
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Join Pelatihan <i class="fas fa-plane"></i></button>
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>

