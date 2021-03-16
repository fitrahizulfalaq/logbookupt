<!-- Main content -->
<section class="content">
  <div class="container-fluid">    
    <div class="row">      
      <!-- Menu-->
      <div class="col-lg-2 col-4">      	
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('profil')?>">
            <img src="<?= base_url("")?>/assets/dist/img/profil.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('profil')?>" class="small-box-footer">
            Profil
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('log_book')?>">
            <img src="<?= base_url("")?>/assets/dist/img/log_book.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('log_book')?>" class="small-box-footer">
            Log Book
          </a>
        </div>
      </div>
      <!-- Menu-->
      <?php if ($this->fungsi->hitung_rows("akses_notulensi","user_id",$this->session->id) != null or $this->session->tipe_user == '4') { ?>
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('notulensi')?>">
            <img src="<?= base_url("")?>/assets/dist/img/notulensi.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('notulensi')?>" class="small-box-footer">
            Notulensi
          </a>
        </div>
      </div>  
      <?php } ?>
      <!-- Menu-->
      <?php if ($this->fungsi->hitung_rows("akses_link","user_id",$this->session->id) != null or $this->session->tipe_user == '4') { ?>
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('link')?>">
            <img src="<?= base_url("")?>/assets/dist/img/link.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('link')?>" class="small-box-footer">
            Link
          </a>
        </div>
      </div>  
      <?php } ?>
      <!-- Menu-->      
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/tentang')?>">
            <img src="<?= base_url("")?>/assets/dist/img/tentang.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/tentang')?>" class="small-box-footer">
            Tentang
          </a>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content