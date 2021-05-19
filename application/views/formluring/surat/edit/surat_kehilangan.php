<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <div class="card-header">
        <a href="<?=base_url('permohonan');?>" class="btn btn-info float-right"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?= base_url("permohonan/edit/".$surat->link)?>" method="post">
          <div class="card-body">
          <?php $this->load->view('permohonan/surat/edit/form_template')?>
            
            <div class="form-group">
              <label>Jenis Berkas</label>
              <div class="input-group mb-3">
                <input type="text" name="jenis_berkas" class="form-control" placeholder="Ex: KTP" required value="<?= $this->input->post('jenis_berkas') ?? $row->jenis_berkas?>">
              </div>
              <?php echo form_error('jenis_berkas')?>
            </div>
            
            <div class="form-group">
              <label>Nomor Berkas</label>
              <div class="input-group mb-3">
                <input type="text" name="no_berkas" class="form-control" placeholder="Ex: 3504141201290001" required value="<?= $this->input->post('no_berkas') ?? $row->no_berkas?>">
              </div>
              <?php echo form_error('no_berkas')?>
            </div>

            <div class="form-group">
              <label>Pemilik Berkas</label>
              <div class="input-group mb-3">
                <input type="text" name="pemilik_berkas" class="form-control" placeholder="Ex: Supriadi" required value="<?= $this->input->post('pemilik_berkas') ?? $row->pemilik_berkas?>">
              </div>
              <?php echo form_error('pemilik_berkas')?>
            </div>           

            <div class="form-group">
              <label>Keperluan</label>
              <textarea class="form-control" name="keperluan" rows="4" placeholder="Ex: Perlengkapan Persyaratan Adminitrasi Pengajuan Pembuatan Rekening di BANK Jatim" required><?= $this->input->post('keperluan') ?? $row->keperluan?></textarea>
              <?php echo form_error('keperluan')?>
            </div>

            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Proses Surat</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>

