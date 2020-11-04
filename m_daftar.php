 <?php 
  session_start();
  include "admin/koneksi.php";
  require "admin/function.php";
  $var = decode($_SERVER['REQUEST_URI']);
  $antarid = $var["id"];

  $query = mysqli_query($konek, "select * from t_pelanggan where id='$antarid'");
  $data = mysqli_fetch_array($query);
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
  
    <!-- Start Pricing Table Section -->
       <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Pendaftaran</h2>
          <p class="section-subtitle">Isi formulir online di bawah untuk menyewa gedung.</p>
        </div>
        <div class="row">          
            <div class="col-12">
              <div class="contact-block">
                <form action="prosespendaftaran.html" method="post">
                  <input type="hidden" value="<?php echo $antarid; ?>" name="id">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class='col-sm-3 col-form-label'>KTP</label>
                        <input type="number" class="form-control" name="ktp" placeholder="Masukkan Nomor KTP Anda" required data-error="Ketikkan KTP Anda!">
                        <div class="help-block with-errors"></div>
                      </div>                                 
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class='col-sm-3 col-form-label'>Nama</label>
                        <input type="text" placeholder="Masukkan Nama Anda"  class="form-control" name="nama" required data-error="Ketikkan Nama Lengkap Anda!">
                        <div class="help-block with-errors"></div>
                      </div> 
                    </div>
                      <div class="col-md-6">
                      <div class="form-group">
                    <label class='col-sm-3 col-form-label'>Jenis Kelamin</label>
                    <select name="jk"  required>
                      <option selected>Pilih Jenis Kelamin  </option>
                        <option value ="Laki-Laki">Laki-Laki</option>
                        <option value ="Perempuan">Perempuan</option>                     
                    </select>
                        <div></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class='col-sm-3 col-form-label'>Alamat</label>
                        <input type="text" placeholder="Masukkan Alamat Lengkap Anda"  name="alamat" class="form-control" required data-error="Ketikkan Alamat Lengkap Anda!">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class='col-sm-3 col-form-label'>Email</label>
                        <input type="email" class="form-control" name="imel" placeholder="Masukkan Email Anda"  required data-error="Ketikkan Email Anda!">
                        <div class="help-block with-errors"></div>
                      </div>                                 
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class='col-sm-3 col-form-label'>Password</label>
                        <input type="password" placeholder="Masukkan Password Anda"  class="form-control" name="kunci" required data-error="Ketikkan Password login Anda!">
                        <div class="help-block with-errors"></div>
                      </div> 
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class='col-sm-3 col-form-label'>Telepon</label>
                        <input type="text" placeholder="Masukkan Nomor Telp/HP Anda" class="form-control" name="telp" required data-error="Ketikkan Telp/HP Anda!">
                        <div class="help-block with-errors"></div>
                      </div> 
                    </div>
                    <div class="col-6">
                      <div class="submit-button">
                        <?php 
                        if(empty($antarid)){
                          echo'
                            <button class="btn btn-success" type="submit" name="kirim" >Daftar</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                            <a href="login.html" class="btn btn-primary">Login</a>
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
    <!-- End Pricing Table Section -->

    <!-- Portfolio Section -->
    <section id="portfolios" class="section">
      <!-- Container Starts -->
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Galeri</h2>
          <span>Galeri</span>
          <p class="section-subtitle">Beberapa galeri foto gedung dan pada saat penggunaannya.</p>
        </div>

        <!-- Portfolio Recent Projects -->
        <div id="portfolio" class="row">
          <div class="col-lg-4 col-md-6 col-xs-12 mix development print">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/img-1.jpg" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-1.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">Zoom</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 mix design print">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/img-2.jpg" alt="" /> 
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-2.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">Zoom</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 mix development">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/img-3.jpg" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-3.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">Zoom</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 mix development design">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/img-4.jpg" alt="" /> 
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-4.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">Zoom</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 mix development">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/img-5.jpg" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-5.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">Zoom</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 mix print design">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/img-6.jpg" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-6.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">Zoom</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
        </div>
      </div>
      <!-- Container Ends -->
    </section>
    <!-- Portfolio Section Ends -->
    
    <?php include"peta.php"; ?>
    <?php include"footer.php"; ?>
  </body>
</html>