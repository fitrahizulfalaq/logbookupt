<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('')?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
        <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Acara</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <select name="acara" class="form-control" required>
                  <option value="<?= $this->input->post('acara') ?? $row->acara ?>">Pilihan : <?= $this->input->post('acara') ?? $row->acara ?></option>
                  <option value="Konsultasi">Konsultasi</option>
                  <option value="Webinar">Webinar</option>
                  <option value="Pelatihan">Pelatihan</option>
                  <option value="NgobrasUKM">NgobrasUKM</option>
                  <option value="Event">Event</option>
                  <option value="Rapat">Rapat</option>
                </select>
              </div>                            
              <?php echo form_error('acara')?>                        
            </div>
            <div class="form-group">
              <label>Tema</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="tema" placeholder="Ex: Pembukuan Sederhana Bagi UMKM" value="<?= $this->input->post('tema') ?? $row->tema ?>">
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" class="form-control" name="tgl" value="<?= $this->input->post('tgl') ?? $row->tgl ?>" required>
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
                <select class="form-control" name="waktu_mulai" required="">
                    <option value="<?= $this->input->post('waktu_mulai') ?? $row->waktu_mulai ?>">Waktu Mulai: <?= $this->input->post('waktu_mulai') ?? $row->waktu_mulai ?></option>
                    <?php
                        for ($i=0; $i<=23 ; $i++) {
                    ?>
                      <option value="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT).":00"; ?>"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT).":00"; ?></option>
                    <?php
                        }
                    ?>
                </select>                
                <?php echo form_error('waktu_mulai')?>                        
                <select class="form-control" name="waktu_selesai" required="">
                    <option value="<?= $this->input->post('waktu_selesai') ?? $row->waktu_selesai ?>">Waktu Selesai: <?= $this->input->post('waktu_selesai') ?? $row->waktu_selesai ?></option>
                    <?php
                        for ($i=0; $i<=23 ; $i++) {
                    ?>
                      <option value="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT).":00"; ?>"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT).":00"; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <?php echo form_error('waktu_selesai')?>                        
              </div>                            
            </div>            
            <div class="form-group">
              <label>Tempat</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-building"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="tempat" placeholder="Ex: Zoom Meeting" value="<?= $this->input->post('tempat') ?? $row->tempat ?>" required>
              </div>                            
              <?php echo form_error('tempat')?>                        
            </div>            
            <div class="form-group">
              <label>Peserta</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-users"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="peserta" placeholder="Koperasi & UKM" value="<?= $this->input->post('peserta') ?? $row->peserta;?>" required>
              </div>                            
              <?php echo form_error('peserta')?>                        
            </div>            
            <div class="form-group">
              <label>Penanggung Jawab</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="pimpinan" placeholder="Ex: Drs. Maris Abdul Muluk, M.Si" value="<?= $this->input->post('pimpinan') ?? $row->pimpinan;?>" required>
              </div>                            
              <?php echo form_error('pimpinan')?>                        
            </div>
            <div class="form-group">
              <label>Kode</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="katakunci" placeholder="Ex: Ex: digitalisasiumkm (digunakan juga redirect ke zoom melalui goupt)" value="<?= $this->input->post('katakunci') ?? $row->katakunci ?>">
            </div>
            <div class="form-group">
              <label>Link</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="link" placeholder="Ex: Pembukuan Sederhana Bagi UMKM" value="<?= $this->input->post('link') ?? $row->link ?>">
            </div>
            <hr>
            <div class="form-group">
              <label>Total Peserta</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-users"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="total_peserta" placeholder="90" value="<?= $this->input->post('total_peserta') ?? $row->total_peserta;?>" required>
              </div>                            
              <?php echo form_error('total_peserta')?>                        
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Edit</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
