<?php
include"koneksi.php";
include"function.php";
$var = decode($_SERVER['REQUEST_URI']);
$id = $var["id"];

$hapusPemesanan = mysqli_query($konek,"delete from t_pemesanan where id_t_pelanggan='$id'");
$hapusPembayaran = mysqli_query($konek,"delete from t_pembayaran where id_t_pelanggan='$id'");

$hapus = "delete from t_pelanggan where id='$id'";
$dihapus = mysqli_query($konek,$hapus);
if($dihapus)
{
	echo"<script>
	window.alert('DATA TELAH DIHAPUS!');
	setTimeout(\"location.href='pelanggan.html'\");</script>";
}
else
{
	echo"<script>
	window.alert('DATA GAGAL DIHAPUS!');
	setTimeout(\"location.href='pelanggan.html'\");</script>";
}
?>