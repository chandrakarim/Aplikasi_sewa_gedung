<?php
include"koneksi.php";
include"function.php";
$var = decode($_SERVER['REQUEST_URI']);
$ktp = mysqli_real_escape_string($konek,$_POST["ktp"]);
$alamat = mysqli_real_escape_string($konek,$_POST["alamat"]);
$nama = mysqli_real_escape_string($konek,$_POST["nama"]);
$jk = $_POST["jk"];
$telp = mysqli_real_escape_string($konek,$_POST["telp"]);
$imel = mysqli_real_escape_string($konek,$_POST["imel"]);
$kunci = mysqli_real_escape_string($konek,$_POST["kunci"]);

$id = $_POST["id"];
if(empty($id))
{
	//simpan
	//cari kembar ktp
	$cariKembar = mysqli_query($konek,"select ktp from t_pelanggan where ktp='$ktp' or imel='$imel'");
	$jumKembar = mysqli_num_rows($cariKembar);
	if(empty($jumKembar))
	{
	$daftar = date('Y-m-d');
	$masuk = "insert into t_pelanggan(tgl_daftar,ktp,nama,jk,telp,alamat,imel,kunci)values('$daftar','$ktp','$nama','$jk','$telp','$alamat','$imel','$kunci')";
		$masukkan = mysqli_query($konek,$masuk);
		if($masukkan)
		{
			echo"<script> 
			window.alert('DATA TELAH DISIMPAN!');
			setTimeout(\"location.href='pelanggan.html'\");</script>";
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
		echo"<script>
		window.alert('KTP SUDAH ADA DI DALAM DATABASE, KETIKKAN KTP LAIN!');
		setTimeout(\"location.href='javascript:history.back()'\");</script>";
	}
}
else
{
	//edit
	//cari kembar ktp
	$cariKembar = mysqli_query($konek,"select * from t_pelanggan where (ktp='$ktp' or imel='$imel') and id<>'$id'");
	$jumKembar = mysqli_num_rows($cariKembar);
	if(empty($jumKembar))
	{
		$masuk = "update t_pelanggan set ktp='$ktp',nama='$nama',jk='$jk',telp='$telp',alamat='$alamat',imel='$imel',kunci='$kunci' where id='$id'";
		$masukkan = mysqli_query($konek,$masuk);
		if($masukkan)
		{
			echo"<script>
			window.alert('DATA TELAH DIPERBARUI!');
			setTimeout(\"location.href='pelanggan.html'\");</script>";
		}
		else
		{
			echo"<script>
			window.alert('DATA GAGAL DIPERBARUI!');
			setTimeout(\"location.href='pelanggan.html?".paramEncrypt("id=$id")."'\");</script>";
		}
	}
	else
	{
		echo"<script>
		window.alert('KTP SUDAH ADA DI DALAM DATABASE, KETIKKAN KTP LAIN!');
		setTimeout(\"location.href='javascript:history.back()'\");</script>";
	}
}
?>