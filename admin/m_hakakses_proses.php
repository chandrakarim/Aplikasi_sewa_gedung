<?php
include"koneksi.php";
include"function.php";
$var = decode($_SERVER['REQUEST_URI']);
$akun = mysqli_real_escape_string($konek,$_POST["akun"]);
$kunci = mysqli_real_escape_string($konek,$_POST["kunci"]);
$nama = mysqli_real_escape_string($konek,$_POST["nama"]);
$akses = mysqli_real_escape_string($konek,$_POST["akses"]);
$id = $_POST["id"];
if(empty($id))
{
	//simpan
	//cari kembar akun
	$cariKembar = mysqli_query($konek,"select akun from m_hakakses where akun='$akun' and akses='$akses'");
	$jumKembar = mysqli_num_rows($cariKembar);
	if(empty($jumKembar))
	{
		$masuk = "insert into m_hakakses(akun,nama,akses,kunci)values('$akun','$nama','$akses','$kunci')";
		$masukkan = mysqli_query($konek,$masuk);
		if($masukkan)
		{
			echo"<script>
			window.alert('DATA TELAH DISIMPAN!');
			setTimeout(\"location.href='aturhakakses.html'\");</script>";
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
		window.alert('USERNAME SUDAH ADA DI DALAM DATABASE, KETIKKAN USERNAME LAIN!');
		setTimeout(\"location.href='javascript:history.back()'\");</script>";
	}
}
else
{
	//edit
	//cari kembar akun
	$cariKembar = mysqli_query($konek,"select akun from m_hakakses where akun='$akun' and akses='$akses' and id<>'$id'");
	$jumKembar = mysqli_num_rows($cariKembar);
	if(empty($jumKembar))
	{
		$masuk = "update m_hakakses set akun='$akun',nama='$nama',akses='$akses',kunci='$kunci' where id='$id'";
		$masukkan = mysqli_query($konek,$masuk);
		if($masukkan)
		{
			echo"<script>
			window.alert('DATA TELAH DIPERBARUI!');
			setTimeout(\"location.href='aturhakakses.html'\");</script>";
		}
		else
		{
			echo"<script>
			window.alert('DATA GAGAL DIPERBARUI!');
			setTimeout(\"location.href='aturhakakses.html?".paramEncrypt("id=$id")."'\");</script>";
		}
	}
	else
	{
		echo"<script>
		window.alert('USERNAME SUDAH ADA DI DALAM DATABASE, KETIKKAN USERNAME LAIN!');
		setTimeout(\"location.href='javascript:history.back()'\");</script>";
	}
}
?>