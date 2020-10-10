<?php
include"koneksi.php";
include"function.php";
$var = decode($_SERVER['REQUEST_URI']);
$id = $var["id"];

$hapus = "delete from t_pembayaran where id='$id'";
$dihapus = mysqli_query($konek,$hapus);
if($dihapus)
{
	echo"<script>
	window.alert('DATA TELAH DIHAPUS!');
	setTimeout(\"location.href='pembayaran.html'\");</script>";
}
else
{
	echo"<script>
	window.alert('DATA GAGAL DIHAPUS!');
	setTimeout(\"location.href='pembayaran.html'\");</script>";
}
?>