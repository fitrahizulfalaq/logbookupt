<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">
        <a href="<?=base_url("");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>

      <div class="card-body">
        <div class="post clearfix">
          <div class="user-block">
          <?= form_open_multipart('formluring/showPelatihan/') ?>
          <div class="input-group input-group-sm mb-3">
              <select class="form-control form-control-sm select2" name="kode" required>
                <option value="<?= set_value('kode');?>">Pilih Pelatihan : <?= set_value('kode');?></option>
                <?php
                  foreach ($this->fungsi->pilihan("tb_pelatihan_luring")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->deskripsi?></option>
                <?php }?>
              </select>
            </div>
            <div class="input-group-append">
              <button type="submit" class="btn btn-sm btn-success">Pilih pelatihan</button>
            </div>
          <?= form_close() ?>
        </div>
      </div>
      <!-- /.card -->
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->