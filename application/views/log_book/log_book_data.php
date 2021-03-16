<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">          
        <a href="<?=base_url("");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>
      <?php $this->load->view("template/message/status_log_book"); ?>
      <div class="card">        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="list">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="10%">Tanggal</th>
                <th width="50%">Target</th>
                <th width="50%">Realisasi</th>
                <th width="20%">#</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
                <tr>
                  <td scope="row">
                    <p><?= $no++?></p>
                  </td>                  
                  <td scope="row">
                    <p><?= date("d - m - Y",strtotime($data->tgl))?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->target?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->realisasi?></p>
                  </td>
                  <td>
                    <a href="<?= site_url('log_book/edit/'.$data->id);?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
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
<!-- /.content --