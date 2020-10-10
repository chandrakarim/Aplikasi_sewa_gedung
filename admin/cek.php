<?php
	include"koneksi.php";
	session_start();
	$akun = $_POST["akun"];
	$kunci = $_POST["kunci"];
	$cekakun = mysqli_real_escape_string($konek,$akun);
	$okeakun = substr($cekakun, 0, 10);
	$ceksandi = mysqli_real_escape_string($konek,$kunci);
	$okesandi = substr($ceksandi, 0, 10);
	
	//CARI AKUN	
	$cariakun = mysqli_query($konek,"select * from m_hakakses where akun='$okeakun' and kunci='$okesandi'");
	$namaakun = mysqli_fetch_array($cariakun);
	$jumlahakun = mysqli_num_rows($cariakun);
	
	if($jumlahakun == 0)
	{
		header("location:./");
	}
	else
	{
		$_SESSION["akun"] = $namaakun["akun"];
		$_SESSION["nama"] = $namaakun["nama"];
		$_SESSION["hak"] = $namaakun["akses"];
		
		header("location:homepage.html");
		//var_dump($_SESSION);

	}

?>