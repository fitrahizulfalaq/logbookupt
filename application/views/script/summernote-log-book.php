<script>
  $('#summernote1').summernote({
  placeholder: 'Ketik disini, jangan di copy paste. Contoh : Mendata buku perpustakaan',
  width: "100%",
  height: "200px",
  onPaste: "false",
  toolbar: [
    // [groupName, [list of button]]
    ['para', ['ol']],
    ['style', ['bold', 'italic', 'underline', 'clear']],
  ]
  });
  $('#summernote2').summernote({
  placeholder: 'Ketik disini, jangan di copy paste. Contoh 100 buku diarsipkan',
  width: "100%",
  height: "200px",
  onPaste: "false",
  toolbar: [
    // [groupName, [list of button]]
    ['para', ['ol']],
    ['style', ['bold', 'italic', 'underline', 'clear']],
  ]
  });
</script>