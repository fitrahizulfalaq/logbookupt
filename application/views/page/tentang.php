<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>
    <?php $this->view('message'); ?>
    <div class="row">
      <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-info card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="img-fluid" src="<?=base_url()?>/assets/dist/img/login-logo.png" width="400px">
            </div>
            <br>
            <div class="text-left">
              <h5>
                E-UPT Pelatihan Dinas Koperasi dan UKM Provinsi Jawa Timur merupakan sebuah platform untuk menghubungkan setiap pegawai dalam satu portal, sehingga akan lebih mempermudah pengelolaan dan manajamen kedepannya. 
              </h5>
            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->        
      </div>      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
