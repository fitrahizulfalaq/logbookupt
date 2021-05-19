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
              <label>Keterangan Pembuatan</label>
              <textarea class="form-control" name="ket_pembuatan" rows="4" placeholder="Ex: Jl. Galunggung 25B, Klojen" required><?= $this->input->post('ket_pembuatan') ?? $row->ket_pembuatan?></textarea>
              <?php echo form_error('ket_pembuatan')?>
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