<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $menu ?></title>
  <!-- Ikon -->
  <link rel="shortcut icon" href="<?=base_url()?>/assets/dist/img/favicon.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/fontawesome-free/css/all.min.css">  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme stye -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- Aous -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/aos/aos.css">
  <?php $this->load->view("script/header_function")?>
  <?php 
    if (isset($header_script)) {
      $this->load->view("script/".$header_script);
    }
  ?>
  <style>
    #pageloader
    {
      background: rgba( 255, 255, 255, 0.8 );
      display: none;
      height: 100%;
      width: 100%;
    }

    #pageloader img
    {
      left: 50%;
      top: 50%;
    }
  </style>
</head>

<body class="hold-transition layout-top-nav layout-footer-fixed">
<div class="wrapper">
  <div class="content-wrapper">
    <?= $contents ?>
  </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?=base_url()?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=base_url()?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url()?>/assets/dist/js/demo.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?=base_url()?>/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=base_url()?>/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- pace-progress -->
<script src="<?=base_url()?>/assets/plugins/pace-progress/pace.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?=base_url()?>/assets/dist/js/pages/dashboard2.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>/assets/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  })
</script>

<script type="text/javascript">
  $(document).ready(function(){
  $("form").on("submit", function(){
    $("#pageloader").fadeIn(3000);
  });//submit
});//document ready
</script>

<?php $this->load->view("script/footer_function")?>
<?php 
    if (isset($footer_script)) {
      $this->load->view("script/".$footer_script);
    }
  ?>
</body>
</html>

