<?php
	include"admin/koneksi.php";
	session_start();
	$imel = $_POST["imel"];
	$kunci = $_POST["kunci"];
	$cekimel = mysqli_real_escape_string($konek,$imel);
    $ceksandi = mysqli_real_escape_string($konek,$kunci);
	
	//CARI AKUN	
	$cariakun = mysqli_query($konek,"select * from t_pelanggan where imel='$cekimel' and kunci='$ceksandi'");
	$namaakun = mysqli_fetch_array($cariakun);
    $jumlahakun = mysqli_num_rows($cariakun);
    
	
	if($jumlahakun == 0)
	{
		header("location:login.html");
	}
	else
	{
        $_SESSION["id"] = $namaakun["id"];
        $_SESSION["imel"] = $namaakun["imel"];
        $_SESSION["user"] = $namaakun["nama"];
        
		
		header("location:paketsewa.html");
	}
?>