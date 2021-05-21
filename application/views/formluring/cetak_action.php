<?php    
    
    $document = file_get_contents('application\views\formluring\template\form_' . $template . '.rtf');
    // $document = file_get_contents('application\views\formluring\template\-surat_domisili_penduduk.rtf');

    $params['[[nama]]'] =  $row->nama;   
    $params['[[nik]]'] =  $row->nik;   
    $params['[[pernikahan]]'] =  $row->pernikahan;   
    $params['[[kelamin]]'] =  $row->kelamin;   
    $params['[[tempat_lahir]]'] =  $row->tempat_lahir;   
    $params['[[agama]]'] =  $row->agama;   
    $params['[[pendidikan_terakhir]]'] =  $row->pendidikan_terakhir;   
    $params['[[domisili]]'] =  $row->domisili;   
    $params['[[daerah_asal]]'] =  $row->daerah_asal;   
    $params['[[hp]]'] =  $row->hp;   
    $params['[[email]]'] =  $row->email;   
    $params['[[status_peserta]]'] =  $row->status_peserta;   
    $params['[[status_usaha]]'] =  $row->status_usaha;   
    $params['[[sektor_usaha]]'] =  $row->sektor_usaha;   
    $params['[[nama_usaha]]'] =  $row->nama_usaha;   
    $params['[[domisili_usaha]]'] =  $row->domisili_usaha;   
    $params['[[tipe_usaha]]'] =  $row->tipe_usaha;   
    $params['[[bidang_usaha]]'] =  $row->bidang_usaha;   
    $params['[[lama_usaha]]'] =  $row->lama_usaha;   
    $params['[[jumlah_karyawan]]'] =  $row->jumlah_karyawan;   
    $params['[[omset]]'] =  $row->omset;
    $xbulan = date("m",strtotime($row->created));
    if ($xbulan == "1") {
        $bulan = "Januari";
    } elseif ($xbulan == "2") {
        $bulan = "Februari";
    } elseif ($xbulan == "3") {
        $bulan = "Maret";
    } elseif ($xbulan == "4") {
        $bulan = "April";
    } elseif ($xbulan == "5") {
        $bulan = "Mei";
    } elseif ($xbulan == "6") {
        $bulan = "Juni";
    } elseif ($xbulan == "7") {
        $bulan = "Juli";
    } elseif ($xbulan == "8") {
        $bulan = "Agustus";
    } elseif ($xbulan == "9") {
        $bulan = "September";
    } elseif ($xbulan == "10") {
        $bulan = "Oktober";
    } elseif ($xbulan == "11") {
        $bulan = "November";
    } elseif ($xbulan == "12") {
        $bulan = "Desember";
    }   
    $params['[[created]]'] =  date("d",strtotime($row->created))." ".$bulan." ".date("Y",strtotime($row->created));   

    foreach($params as $i=>$v) {
        $document = str_replace($i,$v,$document);
    }
    $file="Form Pendaftaran " . $row->nama . ".rtf";
    header("Content-type: application/msword");
    header("Content-disposition: inline; filename=\"".$file."\"");
    header("Content-length: " . strlen($document));
    echo $document;

?>