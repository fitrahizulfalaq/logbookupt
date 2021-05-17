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
          <?= form_open_multipart('presensi/agenda/')?>
          <div class="input-group input-group-sm mb-3">
              <select class="form-control form-control-sm select2" name="kode" required>
                <option value="<?= set_value('kode');?>">Pilih agenda : <?= set_value('kode');?></option>
                <?php
                $this->db->where("katakunci !=",null);
                  foreach ($this->fungsi->pilihan("tb_agenda")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->katakunci?>"><?= $pilihan->tema?></option>
                <?php }?>
              </select>
            </div>
            <div class="input-group-append">
              <button type="submit" class="btn btn-sm btn-success">Filter Agenda</button>
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
<!-- /.content --