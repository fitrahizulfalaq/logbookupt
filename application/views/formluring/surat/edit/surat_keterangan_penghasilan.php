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
            <label>Keterangan Surat</label>
            <div class="input-group mb-3">
              <input type="text" name="ket_surat" class="form-control" placeholder="Ex: Untuk Beasiswa S1 UM" required value="<?= $this->input->post('ket_surat') ?? $row->ket_surat?>">
            </div>
            <?php echo form_error('ket_surat')?>
          </div>
          <div class="form-group">
            <label>Gaji Per Bulan</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp. </span>
              </div>
              <input type="text" name="gaji_perbulan" class="form-control" placeholder="Ex: 85231519519 (Tanpa angka 0)" value="<?= $this->input->post('gaji_perbulan') ?? $row->gaji_perbulan?>" required>
            </div>
            <?php echo form_error('gaji_perbulan')?>
          </div>
          
          <div class="form-group">
            <label>Umur</label>
            <div class="input-group mb-3">
              <input type="number" name="umur" class="form-control" placeholder="Ex: 20" required value="<?= $this->input->post('umur') ?? $row->umur?>">
            </div>
            <?php echo form_error('umur')?>
          </div>

          <div class="form-group">
            <label>Tanggungan Keluarga</label>
            <div class="input-group mb-3">
              <input type="number" name="tanggungan_keluarga" class="form-control" placeholder="Ex: 4" required value="<?= $this->input->post('tanggungan_keluarga') ?? $row->tanggungan_keluarga?>">
            </div>
            <?php echo form_error('tanggungan_keluarga')?>
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