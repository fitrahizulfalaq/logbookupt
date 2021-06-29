<?php $this->view('message') ?>

<?= form_open_multipart('')?>
  <div class="card-body">
    <?php $this->view("template/message/info_pendaftaran")?>
    <div class="form-group">
      <label>NAMA</label>
      <div class="input-group mb-3">
        <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>" placeholder="Ex: FITRAH IZUL FALAQ" minlength="3" maxlength="50" required >
      </div>
      <?php echo form_error('nama')?>
    </div>
    <div class="form-group">
      <label>Jabatan</label>
      <div class="input-group mb-3">
        <input type="text" name="jabatan" class="form-control" value="<?= set_value('jabatan'); ?>" placeholder="Ex: Ketua / Pemilik / Anggota / Pegawai" minlength="3" maxlength="50" required >
      </div>
      <?php echo form_error('jabatan')?>
    </div>
    <div class="form-group">
      <label>Nama Usaha</label>
      <div class="input-group mb-3">
        <input type="text" name="nama_usaha" class="form-control" placeholder="Ex: BikinKarya Creative Media" value="<?= set_value('nama_usaha'); ?>" minlength="5" maxlength="50" required>
      </div>
      <?php echo form_error('nama_usaha')?>
    </div>
    <div class="form-group">
      <label>Alamat Usaha</label>
      <textarea class="form-control" name="domisili_usaha" rows="2" placeholder="Ex: Jl. Galunggung 25B" required minlength="10" maxlength="80"><?= set_value('domisili_usaha'); ?></textarea>
      <?php echo form_error('domisili_usaha')?>
    </div>
    <div class="form-group">
      <label>Kelurahan / Kecamatan / Kota-Kabupaten</label>
      <div class="input-group mb-3">
        <input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" value="<?= set_value('kelurahan'); ?>" minlength="5" maxlength="50" required>
        <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" value="<?= set_value('kecamatan'); ?>" minlength="5" maxlength="50" required>
        <input type="text" name="kota" class="form-control" placeholder="Kota / Kabupatan" value="<?= set_value('kota'); ?>" minlength="5" maxlength="50" required>
      </div>
      <?php echo form_error('kelurahan')?>
    </div>
    <div class="form-group">
      <label>HP</label>
      <div class="input-group mb-3">
        <input type="number" name="hp" class="form-control" placeholder="Ex: 081231390340" value="<?= set_value('hp'); ?>" minlength="11" maxlength="13" required>
      </div>
      <?php echo form_error('hp')?>
    </div>
    <div class="form-group">
      <label>Email</label>
      <div class="input-group mb-3">
        <input type="email" name="email" class="form-control" placeholder="Ex: fitrahizulfalaq@gmail.com" value="<?= set_value('email'); ?>" minlength="10" maxlength="50" required>
      </div>
      <?php echo form_error('email')?>
    </div>
    <div class="form-group">
      <label>Deskripsi Usaha / Koperasi </label><small> Minimal 50 karakter</small>
      <textarea class="form-control" name="deskripsi_usaha" rows="4" placeholder="Ex: Koperasi kami didirikan tahun 2002 dengan jumlah anggota 1001 orang. Usaha kami di bidang retail dan simpan pinjam. Atas saran anggota dalam RAT TB 2020, koperasi didorong menjadi koperasi syariah." required minlength="15" maxlength="4000"><?= set_value('deskripsi_usaha'); ?></textarea>
      <?php echo form_error('deskripsi_usaha')?>
    </div>
    <div class="form-group">
      <label>Masalah </label><small> Minimal 50 karakter</small>
      <textarea class="form-control" name="masalah" rows="4" placeholder="Ex: Koperasi kami ingin pindah menjadi koperasi syariah" required minlength="15" maxlength="4000"><?= set_value('masalah'); ?></textarea>
      <?php echo form_error('masalah')?>
    </div>
    <div class="form-group">
      <label>Solusi yang diharapkan </label><small> Minimal 50 karakter</small>
      <textarea class="form-control" name="solusi" rows="4" placeholder="Ex: Mohon bimbingan apa langkah yang harus kami persiapkan." required minlength="15" maxlength="4000"><?= set_value('solusi'); ?></textarea>
      <?php echo form_error('solusi')?>
    </div>
    
    <hr>

    <div class="form-group">
      <label>Foto Diri</label> <span class="badge badge-info">Maksimal 2Mb (Format : .jpeg, .jpg, .png)</span>
      <div class="input-group mb-3">
        <input type="file" name="foto" class="form-control" placeholder="Ex: 4" accept=".jpg,.png,.jpeg" required>
      </div>
      <?php echo form_error('foto')?>
    </div>

    <div class="form-group">
      <label>File TTD</label> <span class="badge badge-info">Maksimal 2Mb (Format : .jpeg, .jpg, .png)</span>
      <div>
        <img src="<?=site_url('assets/dist/files/formluring/')?>preview-ttd.png" style="max-width: 300px"><br>
      </div>
      <div class="input-group mb-3">
        <input type="file" name="ttd" class="form-control" placeholder="Ex: 4" accept=".jpg,.png,.jpeg" required>
      </div>
      <small><a href="https://tools.uptkukm.id/ttd" target="_blank" class="badge badge-warning">Klik untuk membuat bagi yang belum punya.</a></small>
      <?php echo form_error('foto')?>
    </div>            

    <div class="form-check">
      <input type="checkbox" class="form-check-input" required>
      <label class="form-check-label" for="exampleCheck1">Dengan ini saya menyatakan konfirmasi untuk mengikuti kegiatan sesuai jadwal yang ditetapkan.</label>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-success" id="daftar-btn">Daftar</button>
    <button type="reset" class="btn btn-danger">Kosongi</button>            
  </div>

  <div id="pageloader" class="text-center">
     <img src="<?=base_url()?>/assets/dist/img/loader-large.gif" alt="processing..." />
  </div>
<?= form_close() ?>
