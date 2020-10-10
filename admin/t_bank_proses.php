<?php
include"koneksi.php";
include"function.php";
$var = decode($_SERVER['REQUEST_URI']);
$bank = mysqli_real_escape_string($konek,$_POST["bank"]);
$nama = mysqli_real_escape_string($konek,$_POST["nama"]);
$no_rek = mysqli_real_escape_string($konek,$_POST["no_rek"]);

$id = $_POST["id"];
if(empty($id))
{
    //simpan
    //urutkan kode desc
    $cariKode = "select * from t_bank order by id desc";
    $kueriKode = mysqli_query($konek,$cariKode);
    $jumKode = mysqli_num_rows($kueriKode);
    $Kode = mysqli_fetch_array($kueriKode);
    $Kodenya = $Kode["kode"];
    
    if(empty($jumKode))
    {
        //simpan Kode dengan urut mulai 1
        $angkanol = '0001';
        $arrayKodenya = array("B",$angkanol);
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
            $arrayKodenya = array("B",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 2)
        {
            $angkanol = '00';
            $arrayKodenya = array("B",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 3)
        {
            $angkanol = '0';
            $arrayKodenya = array("B",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 4)
        {
            $arrayKodenya = array("B",$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
    }
    $masuk = "insert into t_bank(kode,bank,nama,no_rek)values('$Kodenya','$bank','$nama','$no_rek')";
   // var_dump($masuk); die();
    $masukkan = mysqli_query($konek,$masuk);
    if($masukkan)
    {
        echo"<script>
        window.alert('DATA TELAH DISIMPAN!');
        setTimeout(\"location.href='bank.html'\");</script>";
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
	//edit
    $masuk = "update t_bank set bank = '$bank', nama='$nama',no_rek='$no_rek' where id='$id'";
    $masukkan = mysqli_query($konek,$masuk);
// var_dump($masuk); die();
    if($masukkan)
    {
        echo"<script>
        window.alert('DATA TELAH DIPERBARUI!');
        setTimeout(\"location.href='bank.html'\");</script>";
    }
    else
    {
        echo"<script>
        window.alert('DATA GAGAL DIPERBARUI!');
        setTimeout(\"location.href='bank.html?".paramEncrypt("id=$id")."'\");</script>";
    }
}
?>