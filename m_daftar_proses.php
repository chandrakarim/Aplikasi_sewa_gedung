<?php
include "admin/koneksi.php";
include "admin/function.php";
$var = decode($_SERVER['REQUEST_URI']);
$ktp = mysqli_real_escape_string($konek,$_POST["ktp"]);
$alamat = mysqli_real_escape_string($konek,$_POST["alamat"]);
$nama = mysqli_real_escape_string($konek,$_POST["nama"]);

$telp = mysqli_real_escape_string($konek,$_POST["telp"]);
$imel = mysqli_real_escape_string($konek,$_POST["imel"]);
$kunci = mysqli_real_escape_string($konek,$_POST["kunci"]);
$id = $_POST["id"];
$jk = $_POST["jk"];

if(empty($id))
{
	//simpan
	//cari kembar ktp
	$cariKembar = mysqli_query($konek,"select * from t_pelanggan where ktp='$ktp' or imel='$imel'");
	$jumKembar = mysqli_num_rows($cariKembar);
	if(empty($jumKembar))
	{
	$daftar = date('Y-m-d');
	$masuk = "insert into t_pelanggan(tgl_daftar,ktp,nama,jk,telp,alamat,imel,kunci)values('$daftar','$ktp','$nama','$jk','$telp','$alamat','$imel','$kunci')";
	//var_dump($masuk);
		$masukkan = mysqli_query($konek,$masuk);
		if($masukkan)
		{
			echo"<script>
			window.alert('PENDAFTARAN BERHASIL, SILAKAN LOGIN MENGGUNAKAN EMAIL DAN PASSWORD YANG DIDAFTARKAN!');
			setTimeout(\"location.href='pendaftaran.html'\");</script>";
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
		window.alert('KTP atau EMAIL SUDAH TERDAFTAR, KETIKKAN DATA LAIN!');
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
			window.alert('DATA PROFIL TELAH DIPERBARUI!');
			setTimeout(\"location.href='pendaftaran.html?".paramEncrypt("id=$id")."'\");</script>";
		}
		else
		{
			echo"<script>
			window.alert('DATA PROFIL GAGAL DIPERBARUI!');
			setTimeout(\"location.href='pendaftaran.html?".paramEncrypt("id=$id")."'\");</script>";
		}
	}
	else
	{
		echo"<script>
		window.alert('KTP atau EMAIL SUDAH TERDAFTAR, KETIKKAN DATA LAIN!');
		setTimeout(\"location.href='javascript:history.back()'\");</script>";
	}
}
//mengirim data ke Email
if (isset($_POST['kirim'])) {

	require "PHPMailer/PHPMailerAutoload.php";
	$id = $_POST["id"];
	$ktp=$_POST['ktp'];
	$nama=$_POST['nama'];
	$jk=$_POST['jk'];
	$alamat=$_POST['alamat'];
	$imel=$_POST['imel'];
	$kunci=$_POST['kunci'];
	$imel=$_POST['imel'];
	$telp=$_POST['telp'];

	$mail = new PHPMailer();

	$mail->IsHTML(true);    // set email format to HTML
	$mail->IsSMTP();   // we are going to use SMTP
	$mail->SMTPAuth   = true; // enabled SMTP authentication
	$mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
	$mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
	$mail->Port       = 465;                   // SMTP port to connect to GMail
	$mail->Username   = "pachanddfs@gmail.com";  // alamat email kamu
	$mail->Password   = "janti123ku";            // password GMail
	$mail->SetFrom("pachanddfs@gmail.com", 'Admin Graha Kirani Atambua');  //Siapa yg mengirim email
	$mail->Subject    = 'Verifikasi';
	$mail->Body       = "no ktp : ".$ktp."<br>"."Nama : ".$nama."<br>"."Jenis Kelamin :".$jk."<br>"."alamat :".$alamat."<br>".
						"Email :".$imel."<br>"."Password :".$kunci."<br>". "Telepon".$telp; 
	$mail->AddAddress($imel);

	if(!$mail->Send()) {
		echo "Eror: ".$mail->ErrorInfo;
		exit;
	}else {
		echo "Email telah berhasil dikirim";
	}
}

?>