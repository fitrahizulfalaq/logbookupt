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
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Acara</th>
                  <th>Tema</th>
                  <th>Pimpinan</th>
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
                    <p><?= $data->acara?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->tema?></p>
                  </td>
                  <td scope="row">
                    <p><?= $data->pimpinan?></p>
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
