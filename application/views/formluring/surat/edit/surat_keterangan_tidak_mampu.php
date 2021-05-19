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
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="form-group">
                  <label>Nama Penerima</label>
                  <input type="text" class="form-control" name="nama_penerima" placeholder="Ex: Fitrah Izul Falaq" required value="<?= $this->input->post('nama_penerima') ?? $row->nama_penerima?>" />
                </div>
                <?php echo form_error('nama_penerima')?>
              </div>
              <div class="form-group col-md-6">
                <label>TTL Penerima</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" name="ttl_penerima" class="form-control" placeholder="Ex: 85231519519 (Tanpa angka 0)" value="<?= $this->input->post('ttl_penerima') ?? $row->ttl_penerima?>" required>
                </div>
                <?php echo form_error('ttl_penerima')?>
              </div>
            </div>
            <div class="form-group">
              <label>Kelamin</label>
              <div>
                <select name="kelamin_penerima" class="form-control" required>
                  <option value="<?= $this->input->post('kelamin') ?? $row->kelamin?>">Pilih : <?= $this->input->post('kelamin') ?? $row->kelamin ?></option>                
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <?php echo form_error('kelamin')?>
              </div>
            </div>
            <div class="form-group">
              <label>Sekolah/Universitas/dll</label>
              <div class="input-group mb-3">
                <input type="text" name="sekolah" class="form-control" placeholder="Ex: Universitas Negeri Malang" required value="<?= $this->input->post('sekolah') ?? $row->sekolah?>">
              </div>
              <?php echo form_error('sekolah')?>
            </div>
            <div class="form-group">
              <label>Alamat Sekolah</label>
              <textarea class="form-control" name="alamat_sekolah" rows="4" placeholder="Ex: Jl. Galunggung 25B, Klojen" required><?= $this->input->post('alamat_sekolah') ?? $row->alamat_sekolah?></textarea>
              <?php echo form_error('alamat_sekolah')?>
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