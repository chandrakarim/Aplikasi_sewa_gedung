<?php
include "koneksi.php";
include "function.php";
$var = decode($_SERVER['REQUEST_URI']);
$id_t_pemesanan = mysqli_real_escape_string($konek,$_POST["id_t_pemesanan"]);
$tgl_bayar = mysqli_real_escape_string($konek,$_POST["tgl_bayar"]);
$metode = mysqli_real_escape_string($konek,$_POST["metode"]);
$nominal = mysqli_real_escape_string($konek,$_POST["nominal"]);
$bank = mysqli_real_escape_string($konek,$_POST["bank"]);
$status = mysqli_real_escape_string($konek,$_POST["status"]);

// $bukti = $_FILES["bukti"]["name"];
// $buktitmp = $_FILES["bukti"]["tmp_name"];

$id = $_POST["id"];
if(empty($id))
{
	//simpan
    //urutkan kode desc
    $cariKode = "select * from t_pembayaran order by id desc";
    $kueriKode = mysqli_query($konek,$cariKode);
    $jumKode = mysqli_num_rows($kueriKode);
    $Kode = mysqli_fetch_array($kueriKode);
    $Kodenya = $Kode["kode"];
    
    if(empty($jumKode))
    {
        //simpan Kode dengan urut mulai 1
        $angkanol = '0001';
        $arrayKodenya = array("B",$angkanol);
        $Kodenya = implode("",$arrayKodenya);
    }
    else
    {
        //simpan Kode dengan urut selanjutnya
        $ambilkarakter = substr($Kodenya,1,4);
        $tambah = $ambilkarakter+1;
        $lebarkarakter = strlen($tambah);
        if($lebarkarakter == 1)
        {
            $angkanol = '000';
            $arrayKodenya = array("B",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 2)
        {
            $angkanol = '00';
            $arrayKodenya = array("B",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 3)
        {
            $angkanol = '0';
            $arrayKodenya = array("B",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 4)
        {
            $arrayKodenya = array("B",$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
    }
    
    $masuk = "insert into t_pembayaran(kode,kode,tgl_bayar,metode,id_t_pemesanan,bank,nominal,bukti,status)values('$Kodenya','$kode','$tgl_bayar','$metode','$id_t_pemesanan','$bank','$nominal','$bukti','$status)";
    $masukkan = mysqli_query($konek,$masuk);
    if($masukkan)
    {
        if(!empty($bukti)){
            copy($buktitmp,"img/".$bukti);
        }

        echo"<script>
        window.alert('DATA TELAH DISIMPAN!');
        setTimeout(\"location.href='pembayaran.html'\");</script>";
    }
    else
    {
        echo"<script>
        window.alert('DATA GAGAL DISIMPAN!');
        setTimeout(\"location.href='javascript:history.back()'\");</script>";
    }
}
else
{
	//edit
	//cek foto
    if(empty($bukti))
    {
        $masuk = "update t_pembayaran set tgl_bayar='$tgl_bayar',metode='$metode',id_t_pemesanan='$id_t_pemesanan',bank='$bank',nominal='$nominal',rekening='$rekening',atas_nama='$atas_nama' where id='$id'";
    }
    else
    {
        $masuk = "update t_pembayaran set tgl_bayar='$tgl_bayar',cara='$cara',id_t_pemesanan='$id_t_pemesanan',bank='$bank',nominal='$nominal',rekening='$rekening',atas_nama='$atas_nama',bukti='$bukti' where id='$id'";
        copy($buktitmp,"img/".$bukti);
    }
    
    $masukkan = mysqli_query($konek,$masuk);
    if($masukkan)
    {
        echo"<script>
        window.alert('DATA TELAH DIPERBARUI!');
        setTimeout(\"location.href='pembayaran.html'\");</script>";
    }
    else
    {
        echo"<script>
        window.alert('DATA GAGAL DIPERBARUI!');
        setTimeout(\"location.href='pembayaran.html?".paramEncrypt("id=$id")."'\");</script>";
    }
}
?>