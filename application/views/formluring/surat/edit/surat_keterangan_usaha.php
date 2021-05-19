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
              <label>Nama Usaha</label>
              <div class="input-group mb-3">
                <input type="text" name="nama_usaha" class="form-control" placeholder="Ex: Sidodadi Tani" required value="<?= $this->input->post('nama_usaha') ?? $row->nama_usaha?>">
              </div>
              <?php echo form_error('nama_usaha')?>
            </div>

            <div class="form-group">
              <label>Jenis Usaha</label>
              <div class="input-group mb-3">
                <input type="text" name="jenis_usaha" class="form-control" placeholder="Ex: Pertanian" required value="<?= $this->input->post('jenis_usaha') ?? $row->jenis_usaha?>">
              </div>
              <?php echo form_error('jenis_usaha')?>
            </div>

            <div class="form-group">
              <label>Jumlah Usaha</label>
              <div class="input-group mb-3">
                <input type="number" name="jumlah_usaha" class="form-control" placeholder="Ex: 4" required value="<?= $this->input->post('jumlah_usaha') ?? $row->jumlah_usaha?>">
              </div>
              <?php echo form_error('jumlah_usaha')?>
            </div>

            <div class="form-group">
              <label>Alamat Usaha</label>
              <textarea class="form-control" name="alamat_usaha" rows="4" placeholder="Ex: Jl. Galunggung, No. 25B" required><?= $this->input->post('alamat_usaha') ?? $row->alamat_usaha?></textarea>
              <?php echo form_error('alamat_usaha')?>
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