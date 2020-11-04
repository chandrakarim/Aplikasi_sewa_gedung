 <?php 
  session_start();
  require"admin/koneksi.php";
  require"admin/function.php";
  $var = decode($_SERVER['REQUEST_URI']);
  $antarid = $var["id"];
  //var_dump($antarid);
  //$user =   $_SESSION["user"];
  // $query = mysqli_query($konek, "select * from t_pemesanan where id='$antarid'");
  // $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include"head.php"; ?>
  </head>
  
<body>

    <!-- Header Section Start -->
    <header id="slider-area">  
    <?php include"menu.php";
        include"carousel.php"; ?>
    </header>
    <!-- Header Section End --> 
    </aside>
      
          <!-- Start Pricing Table Section -->
    <div id="pricing" class="section pricing-section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Keranjang Pemesanan</h2>
         <?php
          $akun = mysqli_query($konek,"select * from t_pemesanan order by id desc");
          while($list = mysqli_fetch_array($akun)){

          $queryPelanggan = mysqli_query($konek, "select * from t_pelanggan where id = '".$list["id_t_pelanggan"]."'");
          $pelanggan = mysqli_fetch_array($queryPelanggan);
          
          $queryPaket = mysqli_query($konek, "select * from m_paket where id = '".$list["id_m_paket"]."'");
          $paket = mysqli_fetch_array($queryPaket);
        }     
        ?>
        <p class="section-subtitle">.</p>
        </div>
        <div class="row">          
        <div class="col-12">
        <div class="contact-block">
        <tbody>
        <?php
        $id = $_SESSION["id"];
        // var_dump($id);
        // echo "<br>";
        $akun = mysqli_query($konek,"select * from t_pelanggan left join t_pemesanan on t_pelanggan.id = t_pemesanan.id_t_pelanggan  where t_pelanggan.id =  '".$id."'" );
        //var_dump($akun);
        // echo "<br>";
        while($list = mysqli_fetch_assoc($akun)){ 
        //var_dump($goro);
      $tgl_pesan  =  $list["tgl_pesan"];
      $nama       =  $list["nama"];
      $id_m_paket =  $list["id_m_paket"];
      $deposit    =  $list["deposit"];
      $tanggal    =  $list["tanggal"];
      $jam        =  $list["jam"];
      $orang      =  $list["orang"];
      // var_dump($list);
        // $queryPelanggan = mysqli_query($konek, "select * from t_pelanggan where id = '".$list["id_t_pelanggan"]."'");
        // $pelanggan = mysqli_fetch_array($queryPelanggan);
        // $queryPaket = mysqli_query($konek, "select * from m_paket where id = '".$list["id_m_paket"]."'");
        // $paket = mysqli_fetch_array($queryPaket);                                       
        }

        ?>
          </tbody>
                <form class='form-horizontal' action="form_pesan_proses.html" method="post"  enctype='multipart/form-data'>
                  <input type="hidden" value="<?php echo $antarid; ?>" name="id">
                 <div class='card-body'>
                 
            
                </div>
              </div>
                 <div class="form-group row">
                        <div class='col-sm-10'>
                        <?php
                       $id = $_SESSION["id"];
                  //  var_dump($_SESSION);
                      //var_dump($user);    
                        ?>
                        <input type="hidden" name="id_t_pelanggan"value="<?php echo $id ?>">                     
                      </div> 
                    </div>
                    <div class="col-sm-9">
                      <div class="form-group row">
                        <label class='col-sm-2 col-form-label'>Tanggal pesan</label>
                        <div class='col-sm-5'>
                        <input type='date' class='form-control' name='tgl_pesan' value="<?php echo $tgl_pesan ?>" placeholder='Tanggal pesan' required>                        
                      </div>                                 
                    </div>
                        <div class="form-group row">
                        <label class='col-sm-2 col-form-label'>Nama</label>
                        <div class='col-sm-10'>
                        <input type="text" placeholder="Masukan Nama Lengkap Anda"  class="form-control" name="nama" value="<?php echo $nama ?>" required data-error="Ketikkan Nama Lengkap Anda!">
                      </div> 
                    </div>
                     <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Paket</label>
                      <div class='col-sm-10'>
                      <input id='id'  name='id_m_paket' value ="<?php echo $id_m_paket ?>" required>
                       
                      </div>
                    </div>
                        <div class="form-group row">
                        <label class='col-sm-2 col-form-label'>Deposit</label>
                        <div class='col-sm-5'>
                        <input type="text" placeholder="-Rp Masukan Jumlah Deposit "  class="form-control" name="deposit"  value = "<?php echo $deposit ?>" required data-error="Ketikkanjumlah Depostit Anda!">
                         
                      </div> 
                    </div>
                    <div class='form-group row'>
                    <label class='col-sm-2 col-form-label'>Pelaksanaan</label>
                    <div class='col-sm-5'>
                    <input type='date' class='form-control' name="tgl" value="<?php echo $tanggal  ?>" placeholder='Tanggal' required>
                      </div> 
                    </div>
                  <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Jam</label>
                      <div class='col-sm-10'>
                      <input type='time' class='form-control' name='jam' value="<?php echo  $jam ?>"  placeholder='Jam' required>
                    
                      </div>
                    </div>
                     <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Audience</label>
                      <div class='col-sm-10'>
                        <input type='number' class='form-control' name='orang' value="<?php echo $orang ?>"  placeholder='Audience' required>
                      </div>
                        </div>

                        <div class="form-group row">
                        <label class='col-sm-2 col-form-label'>KODE</label>
                        <div class='col-sm-10'>
                        <input type="text" placeholder="Masukan Nama Lengkap Anda"  class="form-control" name="kode"  required data-error="Ketikkan Nama Lengkap Anda!">
                      </div> 
                    </div>
                        <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Metode Pembayaran</label>
                      <div class='col-sm-10'>
                      <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="metode" id="cash" value="cash">
                      <label class="form-check-label" for="inlineRadio1">Cash</label>
                      </div>
                      <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="metode" id="transfer" value="transfer">
                      <label class="form-check-label" for="inlineRadio2">Transfer</label>
                      </div>
                        </div>
                      </div>
                      <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Bank</label>
                      <div class='col-sm-10'>
                      <select id='id'  name='id_t_bank' required>
                      <option selected>Pilih Bank </option>
                     <?php
                      $queryPaket = mysqli_query($konek, "select * from t_bank order by bank asc");
                      while($bank = mysqli_fetch_array($queryPaket)){
                  //   var_dump($paket);
                      echo"<option value='".$bank['id']."'>".$bank['bank']."</option>";
                      }
                      ?>    
                      </select>
                      </div>
                    </div>
                         <div class="form-group row">
                        <label class='col-sm-2 col-form-label'>No Rek</label>
                        <div class='col-sm-10'>
                        :
                      </div> 
                    </div>
                    <div class='form-group row'>
                    <label class='col-sm-2 col-form-label'>Bukti</label>
                    <div class='col-sm-10'>
                    <input type='file' class='form-control' name='bukti' accept='image/*'>             
                    </div>
                    </div>
                    <div class="col-sm-9">
                      <div class="submit-button">
                      <?php 
                        if(empty($antarid)){
                          echo'
                            <button class="btn bg-success" type="submit">Simpan</button>
                            <button class="btn bg-danger" type="reset">Batal</button>
                          ';
                        }
                        else{
                          echo'
                            <button class="btn btn-common btn-effect" type="submit">Perbarui</button>
                          ';
                        }
                        ?>
<!--  -->
                      </div>
                    </div>
                  </div>            
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
          
 </html> 