<?php
include"koneksi.php";
include"function.php";
$var = decode($_SERVER['REQUEST_URI']);
$id = $var["id"];

$hapusFoto = mysqli_query($konek,"delete from m_paket_foto where id_m_paket='$id'");
$hapus = "delete from m_paket where id='$id'";
$dihapus = mysqli_query($konek,$hapus);
if($dihapus)
{
	echo"<script>
	window.alert('DATA TELAH DIHAPUS!');
	setTimeout(\"location.href='aturpaket.html'\");</script>";
}
else
{
	echo"<script>
	window.alert('DATA GAGAL DIHAPUS!');
	setTimeout(\"location.href='aturpaket.html'\");</script>";
}
?>