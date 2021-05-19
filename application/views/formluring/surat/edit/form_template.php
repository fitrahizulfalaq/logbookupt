<div class="form-group">
  <label>NIK</label>
  <div class="input-group mb-3">
    <input type="hidden" name="token" value="<?= $this->input->post('token') ?? $row->token ?>" />
    <input type="hidden" name="link" value="<?= $this->input->post('link') ?? $surat->link ?>" />
    <input type="hidden" name="tipe_surat" value="<?= $this->input->post('tipe_surat') ?? $surat->id ?>" />
    <input type="text" name="nik" class="form-control" placeholder="Ex: 350xxx" required value="<?= $this->input->post('nik') ?? $row->nik ?>">
  </div>
  <?php echo form_error('nik')?>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" class="form-control" name="nama" placeholder="Ex: Fitrah Izul Falaq" required value="<?= $this->input->post('nama') ?? $row->nama ?>" />
    </div>
    <?php echo form_error('nama')?>
  </div>
  <div class="form-group col-md-6">
    <label>TTL</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
      </div>
      <input type="date" name="ttl" class="form-control" value="<?= $this->input->post('ttl') ?? $row->ttl ?>" required>
    </div>
    <?php echo form_error('ttl')?>
  </div>
</div>          
<div class="form-group">
  <label>Kelamin</label>
  <div>
    <select name="kelamin" class="form-control" required>
      <option value="<?= $this->input->post('kelamin') ?? $row->kelamin ?>">Pilih : <?= $this->input->post('kelamin') ?? $row->kelamin ?></option>                
      <option value="Laki-Laki">Laki-Laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
    <?php echo form_error('kelamin')?>
  </div>
</div>
<div class="form-group">
  <label>Kewarganegaraan</label>
  <div>
    <select name="kenegaraan" class="form-control" required>
      <option value="<?= $this->input->post('kenegaraan') ?? $row->kenegaraan ?>">Pilih : <?= $this->input->post('kenegaraan') ?? $row->kenegaraan ?></option>                
      <option value="Indonesia">Indonesia</option>
      <option value="Asing">Asing</option>
    </select>
    <?php echo form_error('kenegaraan')?>
  </div>
</div>
<div class="form-group">
  <label>Status Perkawinan</label>
  <div>
    <select name="perkawinan" class="form-control" required>
      <option value="<?= $this->input->post('perkawinan') ?? $row->perkawinan ?>">Pilih : <?= $this->input->post('perkawinan') ?? $row->perkawinan ?></option>                
      <option value="Belum Menikah">Belum Menikah</option>
      <option value="Menikah">Menikah</option>
      <option value="Cerai Hidup">Cerai Hidup</option>
      <option value="Cerai Mati">Cerai Maati</option>
    </select>
    <?php echo form_error('perkawinan')?>
  </div>
</div>
<div class="form-group">
  <label>Agama</label>
  <div>
    <select name="agama" class="form-control" required>
      <option value="<?= $this->input->post('agama') ?? $row->agama ?>">Pilih : <?= $this->input->post('agama') ?? $row->agama ?></option>                
      <option value="Islam">Islam</option>
      <option value="Protestan">Protestan</option>
      <option value="Katolik">Katolik</option>
      <option value="Hindu">Hindu</option>
      <option value="Buddha">Buddha</option>
      <option value="Khonghucu">Khonghucu</option>
    </select>
    <?php echo form_error('agama')?>
  </div>
</div>
<div class="form-group">
  <label>Pekerjaan</label>
  <div class="input-group mb-3">
    <input type="text" name="pekerjaan" class="form-control" placeholder="Ex: Petani" required value="<?= $this->input->post('pekerjaan') ?? $row->pekerjaan ?>">
  </div>
  <?php echo form_error('pekerjaan')?>
</div>
<div class="form-group">
  <label>Alamat</label>
  <textarea class="form-control" name="alamat" rows="4" placeholder="Ex: Jl. Galunggung 25B, Klojen" required><?= $this->input->post('alamat') ?? $row->alamat ?></textarea>
  <?php echo form_error('alamat')?>
</div>