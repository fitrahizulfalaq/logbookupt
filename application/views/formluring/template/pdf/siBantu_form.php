<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PERMOHONAN BANTUAN - <?= $row->nama ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body style="background-image: url(assets/dist/files/userCertificate.png); background-repeat: no-repeat; background-attachment: fixed; height: 100%; background-position: center; background-size: cover;">
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top"><h3><strong>        </strong><br>
        <strong>        Kepada</strong><br>
        <strong>YTH. KEPALA UPT PELATIHAN KOPERASI DAN UKM</strong><br>
        <strong>           PROVINSI JAWA TIMUR</strong><br>
        <strong>Di –</strong><br>
        <strong>        <u>MALANG</u></strong></h3></td>
    </tr>
    <tr>
      <td width="300" height="350" valign="top"><p align="center"><img style="max-width: 300px; max-height: 300px" src="assets/dist/files/formluring/foto/<?= $row->foto ?>"></p></td>
      <td width="60" valign="top"><p>&nbsp;</p></td>
      <td width="539" valign="top"></td>
    </tr>
    <tr>
      <td width="300" valign="top">
        <h3>Profile</h3>
        <p><?= $row->nama ?><br>
          <?= $row->jabatan ?><br>
          <?= $row->nama_usaha ?>
        </p>
        <br>
        <br>
        <h3>ALAMAT KANTOR</h3>
        <p><?= $row->domisili_usaha ?> <br>
          <?= $row->kelurahan ?> <br>
          <?= $row->kecamatan ?><br>
          <?= $row->kota ?>
        </p>
        <br>
        <br>
        <h3>EMAIL:</h3>
        <p><?= $row->email ?> </p>
        <br>
        <br>
        <h3>NO KONTAK</h3>
        <p><?= $row->hp ?></p>
        <br>
        <br>
        <h3>Tanda tangan</h3>
        <p><img src="assets/dist/files/formluring/ttd/<?= $row->ttd ?>" alt="" width="200px" height="100px"></p></td>
      <td width="60" valign="top"><p>&nbsp;</p></td>
      <td width="539" valign="top">
        <h3>CERITAKAN TENTANG KOPERASI/USAHA ANDA</h3>
        <p><?= $row->deskripsi_usaha ?></p>
        <br>
        <h3>PERMASALAHAN</h3>
        <p><?= $row->masalah ?></p>
        <br>
        <h3>SOLUSI YANG DIHARAPKAN</h3>
        <p><?= $row->solusi ?></p>
        <br>
      </td>
    </tr>
  </table> 
</body>
</html>