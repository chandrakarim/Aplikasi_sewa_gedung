<?php
include "admin/koneksi.php";
include "admin/function.php";
$var = decode($_SERVER['REQUEST_URI']);
$id_t_pelanggan = $_POST['id_t_pelanggan'];
$nominal = $_POST['nominal'];
$kode_pesan = $_POST["kode_pesan"];
$tgl_bayar = $_POST["tgl_bayar"];
$metode = $_POST["metode"];
$id_t_bank = $_POST["id_t_bank"]; 
$bukti = $_FILES["bukti"]["name"];
$status = $_POST['status'];
//var_dump($_POST); die();
//   //edit
//     $masuk = "update t_pemesanan set metode='$metode',bukti='$bukti',id_t_bank='$id_t_bank',status='$status' where kode ='$kode'";
// //var_dump($masuk); die();
//     $masukkan = mysqli_query($konek,$masuk);
    
//     if($masukkan)
//     {
//         echo"<script>
//         window.alert('DATA TELAH DISIMPAN!');
//         setTimeout(\"location.href='formpesan.html'\");</script>";
//     }
//     else
//     {
//         echo"<script>
//         window.alert('DATA GAGAL DISIMPAN!');
//         setTimeout(\"location.href='formpesan.html?".paramEncrypt("id=$id")."'\");</script>";
//     }
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
        $arrayKodenya = array("P",$angkanol);
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
            $arrayKodenya = array("P",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 2)
        {
            $angkanol = '00';
            $arrayKodenya = array("P",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 3)
        {
            $angkanol = '0';
            $arrayKodenya = array("P",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 4)
        {
            $arrayKodenya = array("P",$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
    }

//$Kodenya ="tt44t";
$masuk = "insert into t_pembayaran(kode,kode_pesan,tgl_bayar,id_t_pelanggan,nominal,id_t_bank,status)values('$Kodenya','$kode_pesan','$tgl_bayar','$id_t_pelanggan','$nominal','$id_t_bank','$status')";
//var_dump($masuk); die();
    $masukkan = mysqli_query($konek,$masuk);
    if($masukkan)
    {
        echo"<script>
        window.alert('PROSES PEMESANAN ANDA BERHASIL!');
        setTimeout(\"location.href='formpesan.html'\");</script>";
    }
    else
    {
        echo"<script>
        window.alert('PROSES PEMESANAN ANDA GAGAL!');
        setTimeout(\"location.href='javascript:history.back()'\");</script>";
     }  
}

?>