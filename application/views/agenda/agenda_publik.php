<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="callout callout-info">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="publicTable">
            <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="95%">Acara</th>
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
                    <p>
                      <?= date("d- m-Y",strtotime($data->tgl))?><br>
                      <small class="badge badge-warning"><?= $data->acara?></small><br>
                      <?= $data->tema != null ? $data->tema : "<i>Belum ada tema</i>"?><br>
                      <small><?= $data->pimpinan?></small>
                    </p>
                    <p></p>
                  </td>
                </tr>
              <?php }?>
            </tbody>             
          </table>
          </div>
        </div>               
      </div>      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
