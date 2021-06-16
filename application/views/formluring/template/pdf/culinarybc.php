<table border="0" cellspacing="0" cellpadding="0" width="737">
  <tr>
    <td colspan="6" valign="top" align="center"><?= $this->fungsi->pilihan_selected("tb_pelatihan_luring",$row->pelatihan_id)->row("header") ?>
  </tr>
  <tr>
    <td height="30" valign="top">&nbsp;</td>
    <td height="30" valign="top">&nbsp;</td>
    <td height="30" colspan="4" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>NAMA</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->nama) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>NIK</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= $row->nik ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>STATUS PERKAWINAN</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="2" valign="top"><p><?= strtoupper($row->pernikahan) ?></p></td>
    <td height="30" colspan="2" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>JENIS KELAMIN</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="2" valign="top"><p><?= strtoupper($row->kelamin) ?></p></td>
    <td height="30" colspan="2" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>TEMPAT LAHIR</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->tempat_lahir) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>TANGGAL LAHIR</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= date("d",strtotime($row->tgl_lahir))." ".$bulanlahir." ".date("Y",strtotime($row->tgl_lahir)) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>AGAMA</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="2" valign="top"><p><?= strtoupper($row->agama) ?></p></td>
    <td height="30" colspan="2" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>PENDIDIKAN</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td width="274" height="30" valign="top"><p><?= strtoupper($row->pendidikan_terakhir) ?></p></td>
    <td height="30" colspan="2" valign="top"><p>&nbsp;</p></td>
    <td width="65" height="30" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>ALAMAT RUMAH</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->domisili) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>KABUPATEN/ KOTA</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->daerah_asal) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>NO. TELP (WA)</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->hp) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>EMAIL</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= $row->email ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>STATUS PESERTA</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->status_peserta) ?></p></td>
  </tr>
  <!-- <tr>
    <td width="293" height="30" valign="top"><p>STATUS USAHA</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->status_usaha) ?></p></td>
  </tr> -->
  <tr>
    <td width="293" height="30" valign="top"><p>SEKTOR USAHA UMKM</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->sektor_usaha) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>NAMA USAHA (UMKM)</p></td>
    <td width="19" height="30" valign="top"><p>: </p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->nama_usaha) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>ALAMAT USAHA</p></td>
    <td width="19" height="30" valign="top"><p>: </p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->domisili_usaha) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>JENIS USAHA (UMKM)</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->tipe_usaha) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>BIDANG USAHA</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->bidang_usaha) ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>LAMA USAHA</p></td>
    <td width="19" height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p><?= $row->lama_usaha ?></p></td>
  </tr>
  <tr>
    <td width="293" height="30" valign="top"><p>JUMLAH TENAGA KERJA UMKM</p></td>
    <td width="19" height="30" valign="top"><p>: </p></td>
    <td height="30" colspan="4" valign="top"><p><?= strtoupper($row->jumlah_karyawan) ?> orang</p></td>
  </tr>
  <tr>
    <td height="30" valign="top"><p>OMSET USAHA PERBULAN</p></td>
    <td height="30" valign="top"><p>:</p></td>
    <td height="30" colspan="4" valign="top"><p>Rp. <?= number_format($row->omset,2,',','.'); ?></p></td>
  </tr>
  <tr>
    <td height="30" valign="top">&nbsp;</td>
    <td height="30" valign="top">&nbsp;</td>
    <td height="30" colspan="4" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" valign="top">&nbsp;</td>
    <td height="30" valign="top">&nbsp;</td>
    <td height="30" colspan="4" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle" align="center">
      <img src="assets/dist/files/formluring/foto/<?= $row->foto ?>" alt="" style="max-width: 150px; max-height: 250px">
    </td>
    <td valign="top">&nbsp;</td>
    <td colspan="4" valign="top" align="center">
      <p align="center">
        <?= $this->fungsi->pilihan_selected("tb_pelatihan_luring",$row->pelatihan_id)->row("kota") ?>, <?= date("d",strtotime($row->created))." ".$bulanttd." ".date("Y",strtotime($row->created)) ?>
        <br>
        <img src="assets/dist/files/formluring/ttd/<?= $row->ttd ?>" alt="" width="200px" height="100px">
        <br>
        <?= strtoupper($row->nama) ?>
      </p>
    </td>
  </tr>
</table>
