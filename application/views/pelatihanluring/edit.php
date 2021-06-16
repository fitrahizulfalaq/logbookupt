<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('pelatihanluring')?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
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
              <label>Deskripsi</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="deskripsi" placeholder="Ex: Pembukuan Sederhana Bagi UMKM" value="<?= $this->input->post('deskripsi') ?? $row->deskripsi;?>">
              <?php echo form_error('deskripsi')?>
            </div>
            <div class="form-group">
              <label>Header</label>
              <div class="input-group mb-3">
                <textarea class="form-control" name="header" placeholder="Ex: BIODATA PESERTA PELATIHAN<br>KOPERASI/UMKM/KELOMPOK STATEGIS<br>DIGITALISASI UMKM<br>TANGGAL 27 SD 29 MEI 2021<br>KABUPATEN PASURUAN<br>"><?= $this->input->post('header') ?? $row->header;?></textarea>
              <?php echo form_error('header')?>
            </div>
            <div class="form-group">
              <label>Kota</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="kota" placeholder="Ex: Probolinggo" value="<?= $this->input->post('kota') ?? $row->kota;?>">
              <?php echo form_error('kota')?>
            </div>
            <div class="form-group">
              <label>Template</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="template" placeholder="Ex: Probolinggo" value="<?= $this->input->post('template') ?? $row->template;?>">
              <?php echo form_error('template')?>
            </div>
            <div class="form-group">
              <label>Status</label>
              <div>
                <select name="status" class="form-control" required>
                  <option value="<?= $this->input->post('status') ?? $row->status; ?>">Pilih : <?= $this->input->post('status') ?? $row->status; ?></option>                
                  <option value="1">AKTIF</option>
                  <option value="2">TIDAK</option>
                </select>
                <?php echo form_error('status')?>
              </div>
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
