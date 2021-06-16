<?php $this->view('message') ?>

<?= form_open_multipart('')?>
  <div class="card-body">
    <?php $this->view("template/message/info_pendaftaran")?>
    <div class="form-group">
      <label>Pelatihan</label>
      <select name="pelatihan_id" class="form-control" id="pelatihan_id" required>
        <?php
          $this->db->where("template","culinarybc");
          foreach ($this->fungsi->pilihan("tb_pelatihan_luring")->result() as $key => $pilihan) {;
        ?>
        <option value="<?= $pilihan->id?>" <?= $pilihan->status == "1" ? "" : "disabled"?>><?= $pilihan->deskripsi?></option>
        <?php }?>
      </select>
      <?php echo form_error('komisariat_id')?>
    </div>

    <div class="form-group">
      <label>NAMA</label>
      <div class="input-group mb-3">
        <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>" placeholder="Ex: FITRAH IZUL FALAQ" minlength="3" maxlength="50" required >
      </div>
      <?php echo form_error('nama')?>
    </div>
    <div class="form-group">
      <label>NIK</label>
      <div class="input-group mb-3">
        <input type="text" name="nik" class="form-control" placeholder="Ex: 3561012901950002" value="<?= set_value('nik'); ?>" minlength="16" maxlength="16" required>
      </div>
      <?php echo form_error('nik')?>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text" class="form-control" name="tempat_lahir" placeholder="Ex: Kota Malang" required value="<?= set_value('tempat_lahir'); ?>" minlength="3" maxlength="30" />
        </div>
        <?php echo form_error('tempat_lahir')?>
      </div>
      <div class="form-group col-md-6">
        <label>Tanggal Lahir</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
          </div>
          <input type="date" name="tgl_lahir" class="form-control" placeholder="Ex: 081231390340" value="<?= set_value('tgl_lahir') == null ? date("Y-m-d",1990-1-1) : set_value('tgl_lahir'); ?>" required>
        </div>
        <?php echo form_error('tgl_lahir')?>
      </div>
    </div>
    <div class="form-group">
      <label>Status Perkawinan</label>
      <div>
        <select name="pernikahan" class="form-control" required>
          <option value="<?= set_value('pernikahan'); ?>">Pilih : <?= set_value('pernikahan'); ?></option>                
          <option value="LAJANG">LAJANG</option>
          <option value="MENIKAH">MENIKAH</option>
        </select>
        <?php echo form_error('pernikahan')?>
      </div>
    </div>          
    <div class="form-group">
      <label>Kelamin</label>
      <div>
        <select name="kelamin" class="form-control" required>
          <option value="<?= set_value('kelamin'); ?>">Pilih : <?= set_value('kelamin'); ?></option>                
          <option value="LAKI - LAKI">LAKI - LAKI</option>
          <option value="PEREMPUAN">PEREMPUAN</option>
        </select>
        <?php echo form_error('kelamin')?>
      </div>
    </div>
    <div class="form-group">
      <label>Agama</label>
      <div>
        <select name="agama" class="form-control" required>
          <option value="<?= set_value('agama'); ?>">Pilih : <?= set_value('agama'); ?></option>                
          <option value="ISLAM">ISLAM</option>
          <option value="KRISTEN">KRISTEN</option>
          <option value="KATOLIK">KATOLIK</option>
          <option value="HINDU">HINDU</option>
          <option value="BUDHA">BUDHA</option>
          <option value="KONGHUCU">KONGHUCU</option>
        </select>
        <?php echo form_error('agama')?>
      </div>
    </div>
    <div class="form-group">
      <label>Pendidikan</label>
      <div>
        <select name="pendidikan_terakhir" class="form-control" required>
          <option value="<?= set_value('pendidikan_terakhir'); ?>">Pilih : <?= set_value('pendidikan_terakhir'); ?></option>                
          <option value="SD">SD</option>
          <option value="SLTP">SLTP</option>
          <option value="SLTA">SLTA</option>
          <option value="DIPLOMA">DIPLOMA</option>
          <option value="S1">S1</option>
          <option value="S2">S2</option>
          <option value="S3">S3</option>
        </select>
        <?php echo form_error('pendidikan_terakhir')?>
      </div>
    </div>
    <div class="form-group">
      <label>Alamat</label><small> Maksimal 80 Karakter</small>
      <textarea class="form-control" name="domisili" rows="4" placeholder="Ex: Jl. Galunggung 25B, Klojen" required minlength="15" maxlength="80"><?= set_value('domisili'); ?></textarea>
      <?php echo form_error('domisili')?>
    </div>
    <div class="form-group">
      <label>Kota / Kabupaten Domisili</label>
      <div class="input-group mb-3">
        <input type="text" name="daerah_asal" class="form-control" placeholder="Ex: Lumajang" value="<?= set_value('daerah_asal'); ?>" minlength="3" maxlength="50" required>
      </div>
      <?php echo form_error('daerah_asal')?>
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
      <label>Status Peserta</label>
      <div>
        <select name="status_peserta" class="form-control" required>
          <option value="<?= set_value('status_peserta'); ?>">Pilih : <?= set_value('status_peserta'); ?></option>                
          <option value="PELAKU UMKM">PELAKU UMKM</option>
          <option value="WIRAUSAHA PEMULA">WIRAUSAHA PEMULA</option>
          <option value="MASYARAKAT">MASYARAKAT</option>
        </select>
        <?php echo form_error('status_peserta')?>
      </div>
    </div>
    <!-- <div class="form-group">
      <label>Status Usaha</label>
      <div>
        <select name="status_usaha" class="form-control" required>
          <option value="<?= set_value('status_usaha'); ?>">Pilih : <?= set_value('status_usaha'); ?></option>                
          <option value="KOPERASI">KOPERASI</option>
          <option value="USAHA (UMKM)">USAHA (UMKM)</option>
        </select>
        <?php echo form_error('status_usaha')?>
      </div>
    </div> -->
    <div class="form-group">
      <label>Sektor Usaha</label>
      <div>
        <select name="sektor_usaha" class="form-control" required>
          <option value="<?= set_value('sektor_usaha'); ?>">Pilih : <?= set_value('sektor_usaha'); ?></option>                
          <option value="PARIWISATA">PARIWISATA</option>
          <option value="KULINER">KULINER</option>
          <option value="EKONOMI KREATIF">EKONOMI KREATIF</option>
          <option value="HOME DECOR">HOME DECOR</option>
          <option value="FASHION">FASHION</option>
          <option value="PERIKANAN & HASIL LAUT">PERIKANAN & HASIL LAUT</option>
          <option value="PERTANIAN / PERKEBUNAN">PERTANIAN / PERKEBUNAN</option>
          <option value="LAINNYA">LAINNYA</option>
        </select>
        <?php echo form_error('sektor_usaha')?>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label>Nama Usaha</label>
      <div class="input-group mb-3">
        <input type="text" name="nama_usaha" class="form-control" placeholder="Ex: BikinKarya Creative Media" value="<?= set_value('nama_usaha'); ?>" minlength="5" maxlength="50" required>
      </div>
      <?php echo form_error('nama_usaha')?>
    </div>
    <div class="form-group">
      <label>Alamat Usaha</label><small> Maksimal 80 Karakter</small>
      <textarea class="form-control" name="domisili_usaha" rows="4" placeholder="Ex: Jl. Galunggung 25B, Klojen" required minlength="15" maxlength="80"><?= set_value('domisili_usaha'); ?></textarea>
      <?php echo form_error('domisili_usaha')?>
    </div>
    <div class="form-group">
      <label>Jenis Usaha</label>
      <div>
        <select name="tipe_usaha" class="form-control" required>
          <option value="<?= set_value('tipe_usaha'); ?>">Pilih : <?= set_value('tipe_usaha'); ?></option>             
          <option value="JASA">JASA</option>
          <option value="PRODUKSI">PRODUKSI</option>
          <option value="PERDAGANGAN">PERDAGANGAN</option>
        </select>
        <?php echo form_error('tipe_usaha')?>
      </div>
    </div>
    <div class="form-group">
      <label>Bidang Usaha</label>
      <div>
        <select name="bidang_usaha" class="form-control" required>
          <option value="<?= set_value('bidang_usaha'); ?>">Pilih : <?= set_value('bidang_usaha'); ?></option>          
          <option value="BARBERSHOP">BARBERSHOP</option>
          <option value="BENGKEL LAS">BENGKEL LAS</option>
          <option value="BENGKEL MOTOR">BENGKEL MOTOR</option>
          <option value="KOPERASI">KOPERASI</option>
          <option value="WARNET">WARNET</option>
          <option value="JASA TRANSPORT DARAT">JASA TRANSPORT DARAT</option>
          <option value="JASA TRANSPORT AIR">JASA TRANSPORT AIR</option>
          <option value="JASA PIJAT">JASA PIJAT</option>
          <option value="AKTIVITAS PEMROGRAMAN">AKTIVITAS PEMROGRAMAN</option>
          <option value="AKTIVITAS HUKUM & AKUNTANSI">AKTIVITAS HUKUM & AKUNTANSI</option>
          <option value="AKTIVITAS ARSITEKTUR">AKTIVITAS ARSITEKTUR</option>
          <option value="PENELITIAN & PENGEMBANGAN ILMU PENGETAHUAN">PENELITIAN & PENGEMBANGAN ILMU PENGETAHUAN</option>
          <option value="AKTIVITAS KESEHATAN HEWAN">AKTIVITAS KESEHATAN HEWAN</option>
          <option value="KLINIK / BIDAN / APOTEK">KLINIK / BIDAN / APOTEK</option>
          <option value="JASA EKSPEDISI">JASA EKSPEDISI</option>
          <option value="AKTIVITAS JASA PERSEORANGAN">AKTIVITAS JASA PERSEORANGAN</option>
          <option value="JASA REPARASI/ KONSULTAN KOMPUTER">JASA REPARASI/ KONSULTAN KOMPUTER</option>
          <option value="LAINNYA">LAINNYA</option>
        </select>
        <?php echo form_error('bidang_usaha')?>
      </div>
    </div>
    <div class="form-group">
      <label>Lama Usaha</label>
      <div>
        <select name="lama_usaha" class="form-control" required>
          <option value="<?= set_value('lama_usaha'); ?>">Pilih : <?= set_value('lama_usaha'); ?></option>             
          <option value="< 12 BULAN">< 12 BULAN</option>
          <option value="< 24 BULAN">< 24 BULAN</option>
          <option value="< 36 BULAN">< 36 BULAN</option>
          <option value="< 48 BULAN">< 48 BULAN</option>
          <option value="> 4 TAHUN">> 4 TAHUN</option>
        </select>
        <?php echo form_error('lama_usaha')?>
      </div>
    </div>

    <div class="form-group">
      <label>Jumlah Tenaga Kerja</label>
      <div class="input-group mb-3">
        <input type="number" name="jumlah_karyawan" class="form-control" placeholder="Ex: 4" value="<?= set_value('jumlah_karyawan'); ?>" required min="0" max="100">
      </div>
      <?php echo form_error('jumlah_karyawan')?>
    </div>

    <div class="form-group">
      <label>Omset Per Bulan</label>
      <div class="input-group mb-3">
        <input type="number" name="omset" class="form-control" placeholder="Ex: 900000000" value="<?= set_value('omset'); ?>" required min="10000" max="950000000">
      </div>
      <?php echo form_error('omset')?>
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
