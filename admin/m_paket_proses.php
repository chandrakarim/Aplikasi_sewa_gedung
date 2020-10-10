<?php
include"koneksi.php";
include"function.php";
$var = decode($_SERVER['REQUEST_URI']);
//$kode = mysqli_real_escape_string($konek,$_POST["kode"]);
$listrik = mysqli_real_escape_string($konek,$_POST["listrik"]);
$nama = mysqli_real_escape_string($konek,$_POST["nama"]);
$kapasitas = mysqli_real_escape_string($konek,$_POST["kapasitas"]);
$fasilitas = mysqli_real_escape_string($konek,$_POST["fasilitas"]);
$harga = mysqli_real_escape_string($konek,$_POST["harga"]);
$foto1 = $_FILES["filefoto1"]["name"];
$foto2 = $_FILES["filefoto2"]["name"];
$foto3 = $_FILES["filefoto3"]["name"];
$foto1tmp = $_FILES["filefoto1"]["tmp_name"];
$foto2tmp = $_FILES["filefoto2"]["tmp_name"];
$foto3tmp = $_FILES["filefoto3"]["tmp_name"];

$id = $_POST["id"];
if(empty($id))
{
    //simpan
    //urutkan kode desc
    $cariKode = "select * from m_paket order by id desc";
    $kueriKode = mysqli_query($konek,$cariKode);
    $jumKode = mysqli_num_rows($kueriKode);
    $Kode = mysqli_fetch_array($kueriKode);
    $Kodenya = $Kode["kode"];
    
    if(empty($jumKode))
    {
        //simpan Kode dengan urut mulai 1
        $angkanol = '01';
        $arrayKodenya = array("PS",$angkanol);
        $Kodenya = implode("",$arrayKodenya);
       
    }
    else
    {
        //simpan Kode dengan urut selanjutnya
        $ambilkarakter = substr($Kodenya,2,4);
        $tambah = $ambilkarakter+1;
        $lebarkarakter = strlen($tambah);
        if($lebarkarakter == 1)
        {
            $angkanol = '0';
            $arrayKodenya = array("PS",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        else
        if($lebarkarakter == 2)
        {
            $angkanol = '0';
            $arrayKodenya = array("PS",$angkanol,$tambah);
            $Kodenya = implode("",$arrayKodenya);
        }
        // else
        // if($lebarkarakter == 3)
        // {
        //     $angkanol = '0';
        //     $arrayKodenya = array("PS",$angkanol,$tambah);
        //     $Kodenya = implode("",$arrayKodenya);
        // }
        // else
        // if($lebarkarakter == 4)
        // {
        //     $arrayKodenya = array("PS",$tambah);
        //     $Kodenya = implode("",$arrayKodenya);
        // }
    }
     
	//simpan
	//cari kembar kode
	$cariKembar = mysqli_query($konek,"select kode from m_paket where kode='$Kodenya'");
	$jumKembar = mysqli_num_rows($cariKembar);
	if(empty($jumKembar))
	{
		$masuk = "insert into m_paket(kode,nama,kapasitas,listrik,harga,fasilitas)values('$Kodenya','$nama','$kapasitas','$listrik','$harga','$fasilitas')";
		$masukkan = mysqli_query($konek,$masuk);
		if($masukkan)
		{
			$cariIdPaket = mysqli_query($konek, "select * from m_paket order by id desc");
			$idPaket = mysqli_fetch_array($cariIdPaket);

			if(!empty($foto1)){
				$masukFoto = mysqli_query($konek,"insert into m_paket_foto(id_m_paket,foto)values('".$idPaket["id"]."','$foto1')");
				copy($foto1tmp,"../img/foto/".$foto1);
			}
			if(!empty($foto2)){
				$masukFoto = mysqli_query($konek,"insert into m_paket_foto(id_m_paket,foto)values('".$idPaket["id"]."','$foto2')");
				copy($foto2tmp,"../img/foto/".$foto2);
			}
			if(!empty($foto3)){
				$masukFoto = mysqli_query($konek,"insert into m_paket_foto(id_m_paket,foto)values('".$idPaket["id"]."','$foto3')");
				copy($foto3tmp,"../img/foto/".$foto3);
			}

			echo"<script>
			window.alert('DATA TELAH DISIMPAN!');
			setTimeout(\"location.href='aturpaket.html'\");</script>";
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
		window.alert('KODE SUDAH ADA DI DALAM DATABASE, KETIKKAN KODE LAIN!');
		setTimeout(\"location.href='javascript:history.back()'\");</script>";
	}
}
else
{
	//edit
	//cari kembar kode
	$cariKembar = mysqli_query($konek,"select kode from m_paket where kode='$kode' and id<>'$id'");
	$jumKembar = mysqli_num_rows($cariKembar);
	if(empty($jumKembar))
	{
		$masuk = "update m_paket set kode='$kode',nama='$nama',kapasitas='$kapasitas',listrik='$listrik',harga='$harga',fasilitas='$fasilitas' where id='$id'";
		$masukkan = mysqli_query($konek,$masuk);
		if($masukkan)
		{
			$hapusFoto = mysqli_query($konek,"delete from m_paket_foto where id_m_paket = '$id'");

			if(!empty($foto1)){
				$masukFoto = mysqli_query($konek,"insert into m_paket_foto(id_m_paket,foto)values('$id','$foto1')");
				copy($foto1tmp,"../img/foto/".$foto1);
			}
			if(!empty($foto2)){
				$masukFoto = mysqli_query($konek,"insert into m_paket_foto(id_m_paket,foto)values('$id','$foto2')");
				copy($foto2tmp,"../img/foto/".$foto2);
			}
			if(!empty($foto3)){
				$masukFoto = mysqli_query($konek,"insert into m_paket_foto(id_m_paket,foto)values('$id','$foto3')");
				copy($foto3tmp,"../img/foto/".$foto3);
			}
			

			echo"<script>
			window.alert('DATA TELAH DIPERBARUI!');
			setTimeout(\"location.href='aturpaket.html'\");</script>";
		}
		else
		{
			echo"<script>
			window.alert('DATA GAGAL DIPERBARUI!');
			setTimeout(\"location.href='aturpaket.html?".paramEncrypt("id=$id")."'\");</script>";
		}
	}
	else
	{
		echo"<script>
		window.alert('KODE SUDAH ADA DI DALAM DATABASE, KETIKKAN KODE LAIN!');
		setTimeout(\"location.href='javascript:history.back()'\");</script>";
	}
}
?>