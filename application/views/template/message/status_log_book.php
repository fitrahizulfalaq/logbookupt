<?php if ($status_log_book == "1") { ?>
	<div class="alert alert-success alert-dismissible">
	  Anda Telah Mengisi Hari Ini    
	</div>
<?php } else { ?>
	<div class="alert alert-danger alert-dismissible">
	  Anda Belum Mengisi Hari Ini
	  <a href="<?=base_url("log_book/tambah");?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Isi Log Book</a>      
	</div>
<?php } ?>