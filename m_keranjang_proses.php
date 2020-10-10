<?php
include"admin/koneksi.php";
include"admin/function.php";
//include"PHPMailer";
//var_dump($_POST); die();
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'pachanddfs@gmail.com';    //email admin             // SMTP username
$mail->Password = 'janti123ku';                //pasword admin          // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;

$mail->setFrom('pachanddfs@gmail.com', 'Admin Graha Kirani Atambua NTT');   //email admin
$mail->addAddress('chandrakarim27@gmail.com', 'Pachand User');   //email user  // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true); 


$var = decode($_SERVER['REQUEST_URI']);
//var_dump($_POST); die();
$tgl_pesan = mysqli_real_escape_string($konek,$_POST["tgl_pesan"]);
$id_t_pelanggan = mysqli_real_escape_string($konek,$_POST["id_t_pelanggan"]);
$nama = mysqli_real_escape_string($konek,$_POST["nama"]);
$id_m_paket = mysqli_real_escape_string($konek,$_POST["id_m_paket"]);
$deposit = mysqli_real_escape_string($konek,$_POST["deposit"]);
$tgl = mysqli_real_escape_string($konek,$_POST["tgl"]);
$jam = mysqli_real_escape_string($konek,$_POST["jam"]);
$orang = mysqli_real_escape_string($konek,$_POST["orang"]);
//$metode = $_POST["metode"];

//var_dump($_POST);
//$catatan = mysqli_real_escape_string($konek,$_POST["catatan"]);
//var_dump($_POST); die();
//var_dump($id_t_pelanggan); die();
$id = $_POST["id"];
if(empty($id))
{
    //simpan
    //urutkan kode desc
    $cariKode = "select * from t_pemesanan order by id desc";
    $kueriKode = mysqli_query($konek,$cariKode);
    $jumKode = mysqli_num_rows($kueriKode);
    $Kode = mysqli_fetch_array($kueriKode);
    $Kodenya = $Kode["kode"];
    
    if(empty($jumKode))
    {
        //simpan Kode dengan urut mulai 1
        $angkanol = '0001';
        $arrayKodenya = array("P",$angkanol);
        $Kodenya = implode("",$arrayKodenya);
    }
    else
    {
        //simpan Kode dengan urut selanjutnya
        $ambilkarakter = substr($Kodenya,1,4);
        $tambah = $ambilkarakter+1;
        $lebarkarakter = strlen($tambah);
        if($lebarkarakter == 1)
        {
            $angkanol = '000';
            $arrayKodenya = array("P",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 2)
        {
            $angkanol = '00';
            $arrayKodenya = array("P",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 3)
        {
            $angkanol = '0';
            $arrayKodenya = array("P",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 4)
        {
            $arrayKodenya = array("P",$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
    }

//$Kodenya ="tt44t";
$masuk = "insert into t_pemesanan(kode,tgl_pesan,id_t_pelanggan,nama,deposit,tanggal,jam,orang,id_m_paket)values('$Kodenya','$tgl_pesan','$id_t_pelanggan','$nama','$deposit','$tgl','$jam','$orang','$id_m_paket')";
//var_dump($masuk); die();
    $masukkan = mysqli_query($konek,$masuk);

$mail->Subject = 'Here is the subject';
$mail->Body    = $masukkan;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    echo 'Pesan Gagal Di Kirim!.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Pesan Berhasil Di Kirim';
}
   
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
        setTimeout(\"location.href='javascript:history.back()'\");</script>";
     }  
}
?>