<?php
include"koneksi.php";
include"function.php";
$var = decode($_SERVER['REQUEST_URI']);
$id = $var["id"];

$hapusPembayaran = mysqli_query($konek,"delete from t_pembayaran where id_t_pemesanan='$id'");
$hapus = "delete from t_pemesanan where id='$id'";
$dihapus = mysqli_query($konek,$hapus);
if($dihapus)
{
	echo"<script>
	window.alert('DATA TELAH DIHAPUS!');
	setTimeout(\"location.href='pemesanan.html'\");</script>";
}
else
{
	echo"<script>
	window.alert('DATA GAGAL DIHAPUS!');
	setTimeout(\"location.href='pemesanan.html'\");</script>";
}
?>