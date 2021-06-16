<h1><?= $judul ?></h1>

<table border="1">
  <thead>
  <tr align="center">
    <th>No</th>
    <th>Waktu Pendaftaran</th>
    <th>Nama</th>
    <th>NIK</th>
    <th>Pernikahan</th>
    <th>Kelamin</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Agama</th>
    <th>Pendidikan Terakhir</th>
    <th>Domisili</th>
    <th>Daerah Asal</th>
    <th>HP</th>
    <th>Email</th>
    <th>Status Peserta</th>
    <th>Sektor Usaha</th>
    <th>Nama Usaha</th>
    <th>Domisili Usaha</th>
    <th>Jenis Usaha</th>
    <th>Bidang Usaha</th>
    <th>Lama Usaha</th>
    <th>Jumlah Karyawan</th>
    <th>Omset</th>
  </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($row->result() as $key => $data) {;
    ?>
      <tr>
        <td><?= $no++?></td>
        <td><?= date('H:i d-m-Y',strtotime($data->created))?></td>
        <td><?= $data->nama?><br></td>
        <td><?= $data->nik?></td>
        <td><?= $data->pernikahan?></td>
        <td><?= $data->kelamin?></td>
        <td><?= $data->tempat_lahir?></td>
        <td><?= $data->tgl_lahir?></td>
        <td><?= $data->agama?></td>
        <td><?= $data->pendidikan_terakhir?></td>
        <td><?= $data->domisili?></td>
        <td><?= $data->daerah_asal?></td>
        <td><?= $data->hp?></td>
        <td><?= $data->email?></td>
        <td><?= $data->status_peserta?></td>
        <td><?= $data->sektor_usaha?></td>
        <td><?= $data->nama_usaha?></td>
        <td><?= $data->domisili_usaha?></td>
        <td><?= $data->tipe_usaha?></td>
        <td><?= $data->bidang_usaha?></td>
        <td><?= $data->lama_usaha?></td>
        <td><?= $data->jumlah_karyawan?></td>
        <td><?= $data->omset?></td>
      </tr>
  	 <?php }?>
  </tbody>
</table>