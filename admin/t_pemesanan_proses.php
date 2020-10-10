<?php
include"koneksi.php";
include"function.php";
$var = decode($_SERVER['REQUEST_URI']);
$tgl_pesan = $_POST["tgl_pesan"];
$id_t_pelanggan = mysqli_real_escape_string($konek,$_POST["id_t_pelanggan"]);
$id_m_paket = mysqli_real_escape_string($konek,$_POST["id_m_paket"]);
$tanggal = mysqli_real_escape_string($konek,$_POST["tanggal"]);
$jam = mysqli_real_escape_string($konek,$_POST["jam"]);
$orang = mysqli_real_escape_string($konek,$_POST["orang"]);
$catatan = mysqli_real_escape_string($konek,$_POST["catatan"]);
$setuju = $_POST["setuju"];

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
    $masuk = "insert into t_pemesanan(kode,tgl_pesan,id_t_pelanggan,tanggal,jam,orang,id_m_paket,catatan,setuju)values('$Kodenya','$tgl_pesan','$id_t_pelanggan','$tanggal','$jam','$orang','$id_m_paket','$catatan','$setuju')";
    $masukkan = mysqli_query($konek,$masuk);
    if($masukkan)
    {
        echo"<script>
        window.alert('DATA TELAH DISIMPAN!');
        setTimeout(\"location.href='pemesanan.html'\");</script>";
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
    $masuk = "update t_pemesanan set tgl_pesan='$tgl_pesan',id_t_pelanggan='$id_t_pelanggan',tanggal='$tanggal',jam='$jam',orang='$orang',id_m_paket='$id_m_paket',catatan='$catatan',setuju='$setuju' where id='$id'";
    $masukkan = mysqli_query($konek,$masuk);
    if($masukkan)
    {
        echo"<script>
        window.alert('DATA TELAH DIPERBARUI!');
        setTimeout(\"location.href='pemesanan.html'\");</script>";
    }
    else
    {
        echo"<script>
        window.alert('DATA GAGAL DIPERBARUI!');
        setTimeout(\"location.href='pemesanan.html?".paramEncrypt("id=$id")."'\");</script>";
    }
}
?>