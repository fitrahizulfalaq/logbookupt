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
                  <th width="20%">Nama</th>
                  <th width="15%">TTL</th>
                  <th width="30%">Alamat</th>
                  <th width="15%">Contact</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
                <tr>
                  <td scope="row"><?= $no++?></td>                  
                  <td scope="row">
                    <?= $data->nama?><br>
                    <small><?= $data->email?></small><br>
                    <small>+62 <?= $data->hp?></small>
                  </td>
                  <td scope="row"><?= $data->tempat_lahir?>, <?= $data->tgl_lahir?></td>
                  <td scope="row"><?= $data->domisili?></td>
                  <td scope="row">
                    <a href="http://wa.me/+62<?= $data->hp?>" class="btn btn-sm btn-success"><i class="fab fa-whatsapp text-white"></i></a>
                    <a href="mailto:<?= $data->email?>" class="btn btn-sm btn-info"><i class="fas fa-envelope text-white">
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
