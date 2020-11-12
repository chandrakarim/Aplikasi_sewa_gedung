<?php
include "admin/koneksi.php";
include "admin/function.php";
$var = decode($_SERVER['REQUEST_URI']);
$kode = $_POST["kode"];
$metode = $_POST["metode"];
$id_t_bank = $_POST["id_t_bank"]; 
$bukti = $_FILES["bukti"]["name"];
$status = $_POST['status'];
//var_dump($id);



  //edit
    $masuk = "update t_pemesanan set metode='$metode',bukti='$bukti',id_t_bank='$id_t_bank',status='$status' where kode ='$kode'";
//var_dump($masuk); die();
    $masukkan = mysqli_query($konek,$masuk);
    
    if($masukkan)
    {
        echo"<script>
        window.alert('DATA TELAH DISIMPAN!');
        setTimeout(\"location.href='formkonfirmasi.html'\");</script>";
    }
    else
    {
        echo"<script>
        window.alert('DATA GAGAL DISIMPAN!');
        setTimeout(\"location.href='formpesan.html?".paramEncrypt("id=$id")."'\");</script>";
    }


?>