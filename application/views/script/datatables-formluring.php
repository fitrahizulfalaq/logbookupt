<!-- DataTables -->
<script src="<?=base_url()?>/assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-select/js/dataTables.select.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-select/js/select.bootstrap4.min.js"></script>

<!-- DataTables Data -->
<script>
  $(function () {
    $("#example1").DataTable({
      "lengthMenu": [ [20, 50, 100], [20, 50, 100] ],
    });
    
    $('#list').DataTable({
      "paging": true,
      "pagingType": "simple",
      "autoWidth": true,
      "searching": false,
      "info": true,
      "ordering": false,
      "lengthChange": false,
      "lengthMenu": [ [10, 20, 30], [10, 20, 30] ],
    });

    $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": false,
          "autoWidth": false,                      
        });

    $('#list').DataTable({
      "paging": true,
      "pagingType": "simple_numbers",
      "autoWidth": true,
      "searching": true,
      "info": true,
      "ordering": false,
      "lengthChange": true,
      "lengthMenu": [ [10, 20, 30, 50, 100], [10, 20, 30, 50, 100] ],
    });

    var table = $('#example3').DataTable({
        "lengthMenu": [ [10, 15, 20, 50, 100, -1], [10, 15, 20, 50, 100, "All"] ],
        "autoWidth": true,
        "info": false,
        select: true
      });

    new $.fn.dataTable.Buttons(table, {
          buttons: [        
            {
                extend: 'colvis',
                text: '<i class="fas fa-eye"></i>',                
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i>',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-excel"></i>',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i>',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i>',
                exportOptions: {
                    columns: ':visible'
                }
            },        
          ],            
      });

      table.buttons( 0, null ).containers().appendTo( '.tableTools-container' );                   
  });
</script>
