<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">                  
        <a href="<?=base_url("presensi");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>

      <div class="card-body">
        <div class="post clearfix">
          <div class="user-block">
          <?= form_open_multipart('presensi/agenda/')?>
          <div class="input-group input-group-sm mb-3">
              <select class="form-control form-control-sm" name="agenda" required>
                <option value="<?= set_value('agenda');?>">Pilih Sekolah : <?= set_value('agenda');?></option>
                <?php
                  foreach ($this->fungsi->pilihan("tb_agenda")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->tema?></option>
                <?php }?>
              </select>
            </div>
            <div class="input-group-append">
              <button type="submit" class="btn btn-sm btn-success">Filter Sekolah</button>
            </div>
          <?= form_close() ?>
        </div>
      </div>

      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="example3">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Usaha</th>
              <th>HP</th>
              <th>#</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
                <tr>
                  <td scope="row"><?= $data->nama?></td>
                  <td scope="row"><?= $data->usaha?></td>
                  <td scope="row"><?= $data->hp?></td>
                  <td scope="row"><?= $data->status == "1" ? "Sudah" : "Belum"?></td>
            	  </tr>
            	<?php }?>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <span class="tableTools-container btn btn-sm"></span>
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