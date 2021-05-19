<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <?php $this->view('message'); ?>
      <div class="card-header">
        <a href="<?=base_url("");?>" class="btn btn-sm btn-info float-right"><i class="fas fa-backward"></i> Kembali</a>
      </div>

      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="example2">
            <thead>
            <tr>
              <th width="5%">no</th>
              <th width="30%">Pelatihan</th>
              <th width="25%">Nama</th>
              <th width="20%">Status</th>
              <th width="20%">#</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
                <tr>
                  <td><?= $no++?></td>
                  <td><?= $data->pelatihan_id ?></td>
                  <td>
                    <?= $data->nama?><br>
                    <small><?= $data->nik?></small>                      
                  </td>
                  <td>                    
                    <?= $data->status == 1 ? '<span class="badge badge-success"> Sudah di Proses </span>' : '<span class="badge badge-warning"> Belum di Proses </span>'?><br>                    
                    <?= date('d-m-Y',strtotime($data->created))?>                    
                  </td>
                  <td>                    
                    <a href="<?= site_url('formluring/acc/'.$data->id);?>" class="btn btn-sm btn-success"><i class='fas fa-check'></i></a>                   
                    <a href="<?= site_url('formluring/cetak/'.$data->id);?>" class="btn btn-sm btn-info"><i class='fas fa-file-word'></i></a>
                    <a href="<?= site_url('formluring/cetakpdf/'.$data->id);?>" class="btn btn-sm btn-warning"><i class='fas fa-file-pdf'></i></a>
                  </td>
                </tr>
            	 <?php }?>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->