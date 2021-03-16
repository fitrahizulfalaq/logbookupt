<?php
  $url_1 = $this->uri->segment(1);
  $url_2 = $this->uri->segment(2);
  $url_3 = $this->uri->segment(3);

  if ($url_1 == "profil" and $url_2 =="edit") {
    $this->load->view("script/profil_edit");
  } elseif ($this->uri->segment(1)=="notulensi" and $this->uri->segment(2)== null) {
    $this->load->view("script/datatables-footer");
    $this->load->view("script/datatables-notulensi");
  } elseif ($url_1 == "notulensi" and $url_2 == "tambah" or $url_1 == "notulensi" and $url_2 == "edit") {
    $this->load->view("script/summernote-footer");
    $this->load->view("script/summernote-notulensi");
  } elseif ($url_1 == "log_book" and $url_2 == null) {
    $this->load->view("script/datatables-footer");
    $this->load->view("script/datatables-log-book");
  } elseif ($url_1 == "log_book" and $url_2 == "kepala" or $url_1 == "log_book" and $url_2 == "pimpinan" or $url_1 == "log_book" and $url_2 == "detail") {
    $this->load->view("script/datatables-footer");
    $this->load->view("script/datatables-log-book");
  } elseif ($url_1 == "log_book" and $url_2 == "tambah" or $url_1 == "log_book" and $url_2 == "edit") {
    $this->load->view("script/summernote-footer");
    $this->load->view("script/summernote-log-book");
  } elseif ($url_1 == "link" and $this->uri->segment(2)== null) {
    $this->load->view("script/datatables-footer");
    $this->load->view("script/datatables-link");
  }
?>