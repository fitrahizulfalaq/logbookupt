
<script type="text/javascript">
  var table;
  $(document).ready(function() {
      //datatables
      table = $('#table').DataTable({ 
          "processing": true, 
          "serverSide": true, 
          "order": [], 
           
          "ajax": {
              "url": "<?php echo site_url('link/get_data_link')?>",
              "type": "POST"
          },
          "columnDefs": [
          { 
              "targets": [ 0 ], 
              "orderable": false, 
          },
          ],
      });
  });
</script>