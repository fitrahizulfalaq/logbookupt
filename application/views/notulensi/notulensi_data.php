<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">          
        <a href="<?=site_url('notulensi/tambah/')?>" class="btn btn-success btn-sm"><i class='fas fa-plus'></i> Tambah</a>
        <a href="<?=base_url("");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>
      <div class="card">
        <div class="card-header bg-info">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Acara</th>
                  <th>#</th>
                </tr>
            </thead>
            <tbody>
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
<!-- /.content -->