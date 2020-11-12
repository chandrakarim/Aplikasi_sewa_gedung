 <?php 
  session_start();
  include "admin/koneksi.php";
  require "admin/function.php";
  $var = decode($_SERVER['REQUEST_URI']);
  $antarid = $var["id"];
  //var_dump($antarid);
  // $user =   $_SESSION["user"];

  // $query = mysqli_query($konek, "select * from t_pemesanan where id='$antarid'");
  // $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "head.php"; ?>
  </head>
  
<body>
    <!-- Header Section Start -->
    <header id="slider-area">  
    <?php include "menu.php";
        include "carousel.php"; ?>
    </header>
    <!-- Header Section End --> 
    </aside>

        
          <!-- Start Pricing Table Section -->
    <div id="pricing" class="section pricing-section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Keranjang Pesan</h2>
        
          <p class="section-subtitle">Isi formulir online di bawah untuk menyewa gedung.</p>
        </div>
        <div class="row">          
            <div class="col-12">
              <div class="contact-block">
                <form class='form-horizontal' action="keranjangproses.html" method="post"  enctype='multipart/form-data'>
                  <input type="hidden" value="<?php echo $antarid; ?>" name="id">
                 <div class='card-body'>
                  <?php
                   $queryPaket = mysqli_query($konek, "select * from m_paket ");
                   $paket = mysqli_fetch_array($queryPaket);
                  ?>
                </div>
              </div>
                    <div class="col-sm-9">
                      <div class="form-group row">
                        <label class='col-sm-2 col-form-label'>Tanggal pesan</label>
                        <div class='col-sm-10'>
                       <input type='date' class='form-control' name='tgl_pesan' placeholder='Tanggal pesan' required>
                      </div>                                 
                    </div>
                    <div class="form-group row">
                        <div class='col-sm-10'>
                        <?php
                       $id = $_SESSION["id"];
                     //  $imel = $_SESSION["imel"];
                   //  var_dump($imel);
                      // var_dump($user);    
                        ?>
                        <input type="hidden" name="id_t_pelanggan"value="<?php echo $id ?>"> 
                                                                   
                      </div> 
                    </div>
                    <div class="form-group row">
                        <div class='col-sm-10'>
                        <?php
                     //  $id = $_SESSION["id"];
                       $imel = $_SESSION["imel"];
                  //  var_dump($_SESSION["imel"]);
                      // var_dump($user);    
                        ?>
                        <input type="hidden" name="imel"value="<?php echo $imel ?>"> 
                                                                   
                      </div> 
                    </div>
                  
                          <div class="form-group row">
                        <label class='col-sm-2 col-form-label'>Nama</label>
                        <div class='col-sm-10'>
                        <input type="text" placeholder="Masukan Nama Lengkap Anda"  class="form-control" name="nama" required data-error="Ketikkan Nama Lengkap Anda!">
                      </div> 
                    </div>
                     <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Paket</label>
                      <div class='col-sm-10'>
                      <select id='id' class='form-control form-control-lg'  name='id_m_paket' required data-error="Pilih Paket">
                        <option selected>Pilih Paket</option>
                      <?php
                      $queryPaket = mysqli_query($konek, "select * from m_paket order by nama asc");
                      while($paket = mysqli_fetch_array($queryPaket)){
                  //   var_dump($paket);
                      echo"<option value='".$paket['id']."'>".$paket['nama']."</option>";
                      }
                      ?>     
                      </select>
                      </div>
                    </div>
                        <div class="form-group row">
                        <label class='col-sm-2 col-form-label'>Deposit</label>
                        <div class='col-sm-10'>
                        <input type="text" placeholder="-Rp Masukan Jumlah Deposit "  class="form-control" name="deposit" required data-error="Ketikkanjumlah Depostit Anda!">
                           <label class='col-sm- col-form-label'>Maksimal Deposit : Rp.1000.000,00-</label>
                      </div> 
                    </div>
                    <div class='form-group row'>
                    <label class='col-sm-2 col-form-label'>Pelaksanaan</label>
                    <div class='col-sm-10'>
                    <input type='date' class='form-control' name='tgl' placeholder='Tanggal' required>
                      </div> 
                    </div>
                  <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Jam</label>
                      <div class='col-sm-10'>
                      <input type='time' class='form-control' name='jam'  placeholder='Jam' required>
                      </div>
                    </div>
                     <div class='form-group row'>
                      <label class='col-sm-2 col-form-label'>Audience</label>
                      <div class='col-sm-10'>
                      <input type='number' class='form-control' name='orang'  placeholder='Masukanjumlah orang' required>
                      </div>
                        </div>
        
                    <div class="col-sm-9">
                      <div class="submit-button">
                        <?php 
                        if(empty($antarid)){
                          echo'
                            <button class="btn bg-success" type="submit" name="kirim" >Simpan</button>
                            <button class="btn bg-danger" type="reset">Batal</button>
                          ';
                        }
                        else{
                          echo'
                            <button class="btn btn-common btn-effect" type="submit">Perbarui</button>
                          ';
                        }
                        ?>
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