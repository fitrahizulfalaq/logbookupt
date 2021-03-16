<!-- DataTables Data -->
<script>
  $(function () {
    $("#example1").DataTable({});
    
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

    $('#list_admin').DataTable({
      "paging": true,
      "pagingType": "simple_numbers",
      "autoWidth": true,
      "searching": true,
      "info": true,
      "ordering": false,
      "lengthChange": true,
      "lengthMenu": [ [10, 20, 30, 50, 100], [10, 20, 30, 50, 100] ],
    });                
  });
</script>