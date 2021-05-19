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
            <div class="form-group">
              <label>NIK</label>
              <div class="input-group mb-3">
                <input type="hidden" name="token" value="<?= $this->input->post('token') ?? $row->token ?>" />
                <input type="hidden" name="link" value="<?= $this->input->post('link') ?? $surat->link ?>" />
                <input type="hidden" name="tipe_surat" value="<?= $this->input->post('tipe_surat') ?? $surat->id ?>" />
                <input type="text" name="nik" class="form-control" placeholder="Ex: 350xxx" required value="<?= $row->nik ?>">
              </div>
              <?php echo form_error('nik')?>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Ex: Fitrah Izul Falaq" required value="<?= $row->nama?>" />
                </div>
                <?php echo form_error('nama')?>
              </div>
              <div class="form-group col-md-6">
                <label>TTL</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" name="ttl" class="form-control" placeholder="Ex: 85231519519 (Tanpa angka 0)" value="<?= $row->ttl?>" required>
                </div>
                <?php echo form_error('ttl')?>
              </div>
            </div>      

            <div class="form-group">
              <label>Kelamin</label>
              <div>
                <select name="kelamin" class="form-control" required>
                  <option value="<?= $row->kelamin?>">Pilih : <?= $row->kelamin?></option>                
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
                  <option value="<?= $row->kenegaraan?>">Pilih : <?= $row->kenegaraan?></option>                
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
                  <option value="<?= $row->perkawinan?>">Pilih : <?= $row->perkawinan?></option>                
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
                  <option value="<?= $row->agama?>">Pilih : <?= $row->agama?></option>                
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
                <input type="text" name="pekerjaan" class="form-control" placeholder="Ex: Petani" required value="<?= $row->pekerjaan?>">
              </div>
              <?php echo form_error('pekerjaan')?>
            </div>

            <hr>

            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="form-group">
                  <label>Dusun Asal</label>
                  <input type="text" class="form-control" name="dusun_asal" placeholder="Ex: Krajan" required value="<?= $row->dusun_asal?>" />
                </div>
                <?php echo form_error('dusun_asal')?>
              </div>
              <div class="form-group col-md-3">
                <label>RT</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" name="rt_asal" class="form-control" placeholder="Ex: 3" value="<?= $row->rt_asal?>" required>
                </div>
                <?php echo form_error('rt_asal')?>
              </div>
              <div class="form-group col-md-3">
                <label>RW</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" name="rw_asal" class="form-control" placeholder="Ex: 4" value="<?= $row->rw_asal?>" required>
                </div>
                <?php echo form_error('rw_asal')?>
              </div>
            </div>

            <div class="form-group">
              <label>Desa Asal</label>
              <div class="input-group mb-3">
                <input type="text" name="desa_asal" class="form-control" placeholder="Ex: Sidodadi" required value="<?= $row->desa_asal?>">
              </div>
              <?php echo form_error('desa_asal')?>
            </div>

            <div class="form-group">
              <label>Kecamatan Asal</label>
              <div class="input-group mb-3">
                <input type="text" name="kecamatan_asal" class="form-control" placeholder="Ex: Garum" required value="<?= $row->kecamatan_asal?>">
              </div>
              <?php echo form_error('kecamatan_asal')?>
            </div>

            <div class="form-group">
              <label>Kabupaten Asal</label>
              <div class="input-group mb-3">
                <input type="text" name="kabupaten_asal" class="form-control" placeholder="Ex: Sidodadi" required value="<?= $row->kabupaten_asal?>">
              </div>
              <?php echo form_error('kabupaten_asal')?>
            </div>

            <hr>

            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="form-group">
                  <label>Dusun Tujuan</label>
                  <input type="text" class="form-control" name="dusun_tujuan" placeholder="Ex: Krajan" required value="<?= $row->dusun_tujuan?>" />
                </div>
                <?php echo form_error('dusun_tujuan')?>
              </div>
              <div class="form-group col-md-3">
                <label>RT</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" name="rt_tujuan" class="form-control" placeholder="Ex: 3" value="<?= $row->rt_tujuan?>" required>
                </div>
                <?php echo form_error('rt_tujuan')?>
              </div>
              <div class="form-group col-md-3">
                <label>RW</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" name="rw_tujuan" class="form-control" placeholder="Ex: 4" value="<?= $row->rw_tujuan?>" required>
                </div>
                <?php echo form_error('rw_tujuan')?>
              </div>
            </div>

            <div class="form-group">
              <label>Desa Tujuan</label>
              <div class="input-group mb-3">
                <input type="text" name="desa_tujuan" class="form-control" placeholder="Ex: Sidodadi" required value="<?= $row->desa_tujuan?>">
              </div>
              <?php echo form_error('desa_tujuan')?>
            </div>

            <div class="form-group">
              <label>Kecamatan Tujuan</label>
              <div class="input-group mb-3">
                <input type="text" name="kecamatan_tujuan" class="form-control" placeholder="Ex: Garum" required value="<?= $row->kecamatan_tujuan?>"">
              </div>
              <?php echo form_error('kecamatan_tujuan')?>
            </div>

            <div class="form-group">
              <label>Kabupaten Tujuan</label>
              <div class="input-group mb-3">
                <input type="text" name="kabupaten_tujuan" class="form-control" placeholder="Ex: Sidodadi" required value="<?= $row->kabupaten_tujuan?>">
              </div>
              <?php echo form_error('kabupaten_tujuan')?>
            </div>

            <hr>

            <div class="form-group">
              <label>Jumlah Pengikut</label>
              <div class="input-group mb-3">
                <input type="number" name="jumlah_pengikut" class="form-control" placeholder="Ex: 2" required value="<?= $row->jumlah_pengikut?>">
              </div>
              <?php echo form_error('jumlah_pengikut')?>
            </div>

            <hr>

            <div class="form-group">
              <label>Data Pengikut 1</label>
              <div class="input-group mb-3">
                <input type="text" name="nama_pengikut1" class="form-control" placeholder="Nama: Fitrah Izul Falaq" value="<?= $row->nama_pengikut1?>"">
              </div>
              <?php echo form_error('nama_pengikut1')?>
              <div class="input-group mb-3">
                <input type="text" name="kelamin_pengikut1" class="form-control" placeholder="Kelamin: L / P" value="<?= $row->kelamin_pengikut1?>">
              </div>
              <?php echo form_error('kelamin_pengikut1')?>
              <div class="input-group mb-3">
                <input type="text" name="pendidikan_pengikut1" class="form-control" placeholder="Pendidikan: SD / SMP / SMA / S1 sederajat" value="<?= $row->pendidikan_pengikut1?>">
              </div>
              <?php echo form_error('pendidikan_pengikut1')?>
              <div class="input-group mb-3">
                <input type="text" name="hubungan_pengikut1" class="form-control" placeholder="Hubungan: Ayah, Ibu, Anak, dll" value="<?= $row->hubungan_pengikut1?>">
              </div>
              <?php echo form_error('hubungan_pengikut1')?>
            </div>

            <div class="form-group">
              <label>Data Pengikut 2</label>
              <div class="input-group mb-3">
                <input type="text" name="nama_pengikut2" class="form-control" placeholder="Nama: Fitrah Izul Falaq" value="<?= $row->nama_pengikut2?>">
              </div>
              <?php echo form_error('nama_pengikut2')?>
              <div class="input-group mb-3">
                <input type="text" name="kelamin_pengikut2" class="form-control" placeholder="Kelamin: L / P" value="<?= $row->kelamin_pengikut2?>">
              </div>
              <?php echo form_error('kelamin_pengikut2')?>
              <div class="input-group mb-3">
                <input type="text" name="pendidikan_pengikut2" class="form-control" placeholder="Pendidikan: SD / SMP / SMA / S1 sederajat" value="<?= $row->pendidikan_pengikut2?>">
              </div>
              <?php echo form_error('pendidikan_pengikut2')?>
              <div class="input-group mb-3">
                <input type="text" name="hubungan_pengikut2" class="form-control" placeholder="Hubungan: Ayah, Ibu, Anak, dll" value="<?= $row->hubungan_pengikut2?>">
              </div>
              <?php echo form_error('hubungan_pengikut2')?>
            </div>

            <div class="form-group">
              <label>Data Pengikut 3</label>
              <div class="input-group mb-3">
                <input type="text" name="nama_pengikut3" class="form-control" placeholder="Nama: Fitrah Izul Falaq" value="<?= $row->nama_pengikut3?>">
              </div>
              <?php echo form_error('nama_pengikut3')?>
              <div class="input-group mb-3">
                <input type="text" name="kelamin_pengikut3" class="form-control" placeholder="Kelamin: L / P" value="<?= $row->kelamin_pengikut3?>">
              </div>
              <?php echo form_error('kelamin_pengikut3')?>
              <div class="input-group mb-3">
                <input type="text" name="pendidikan_pengikut3" class="form-control" placeholder="Pendidikan: SD / SMP / SMA / S1 sederajat" value="<?= $row->pendidikan_pengikut3?>">
              </div>
              <?php echo form_error('pendidikan_pengikut3')?>
              <div class="input-group mb-3">
                <input type="text" name="hubungan_pengikut3" class="form-control" placeholder="Hubungan: SD / SMP / SMA / S1 sederajat" value="<?= $row->hubungan_pengikut3?>">
              </div>
              <?php echo form_error('hubungan_pengikut3')?>
            </div>

            <hr>
            
            <div class="form-group">
              <label>Alasan</label>
              <textarea class="form-control" name="alasan" rows="4" placeholder="Ex: Berkeja sebagai Petani di desa " required><?= $row->alasan?></textarea>
              <?php echo form_error('alasan')?>
            </div>

            <div class="form-group">
              <label>Keperluan</label>
              <textarea class="form-control" name="keperluan" rows="4" placeholder="Ex: Perlengkapan Persyaratan Adminitrasi Pengajuan Pembuatan Rekening di BANK Jatim" required><?= $row->keperluan?></textarea>
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