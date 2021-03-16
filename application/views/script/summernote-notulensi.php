<script>
  $('#summernote').summernote({
  placeholder: 'Ketik notulensi disini, jangan di copy paste. Contoh : Mendata buku perpustakaan',
  width: "100%",
  height: "500px",
  onPaste: "false",
  toolbar: [
    // [groupName, [list of button]]
    ['para', ['ol']],
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['view', ['fullscreen', 'codeview', 'help']],
  ]
  });
</script>