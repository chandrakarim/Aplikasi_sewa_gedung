<?php
include"admin/koneksi.php";
include"admin/function.php";
$var = decode($_SERVER['REQUEST_URI']);
$kode = $_POST["kode"];
$metode = $_POST["metode"];
$bukti = $_FILES["bukti"]["name"];
//var_dump($_POST);



  //edit
    $masuk = "update t_pemesanan set metode='$metode',bukti='$bukti' where kode ='$kode'";
//var_dump($masuk); die();
    $masukkan = mysqli_query($konek,$masuk);
    
    if($masukkan)
    {
        echo"<script>
        window.alert('DATA TELAH DISIMPAN!');
        setTimeout(\"location.href='formpesan.html'\");</script>";
    }
    else
    {
        echo"<script>
        window.alert('DATA GAGAL DISIMPAN!');
        setTimeout(\"location.href='formpesan.html?".paramEncrypt("id=$id")."'\");</script>";
    }
}

?>