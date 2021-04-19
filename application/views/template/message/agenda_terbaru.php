<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-info"></i> Agenda Hari ini !</h5>
  <?php
    $no = 1;
    foreach ($row->result() as $key => $data) {;
  ?>
    <p>
	  <?= date("d- m-Y",strtotime($data->tgl))?> / <?= $data->waktu_mulai?> s.d. <?= $data->waktu_selesai?><br>
	  <small class="badge badge-warning"><?= $data->acara?></small> <?= $data->tema != null ? $data->tema : "<i>Belum ada tema</i>"?><br>
	  <small><?= $data->pimpinan?></small>
	</p>    
  <?php }?>
  <?= $row->result() == null ? "Tidak ada agenda" : ""?>  
</div>