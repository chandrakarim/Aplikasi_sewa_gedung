<?php
include"admin/koneksi.php";
include"admin/function.php";
//include"PHPMailer";
//var_dump($_POST); die();
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