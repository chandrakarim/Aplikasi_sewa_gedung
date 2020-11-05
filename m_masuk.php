<?php 
  session_start();
  include "admin/koneksi.php";
  require "admin/function.php";
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
    <div id="pricing" class="section pricing-section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Login</h2>
          <span>Login</span>
          <p class="section-subtitle">Login di bawah untuk menyewa gedung.</p>
        </div>
        <div class="row">          
            <div class="col-12">
              <div class="contact-block">
                <form action="proseslogin.html" method="post">
                  <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                      <div class="form-group">
                        <input type="text" class="form-control" name="imel" placeholder="Masukkan Email" required data-error="Ketikkan email Anda!">
                        <div class="help-block with-errors"></div>
                        <input type="password" placeholder="Masukkan Password" class="form-control" name="kunci" required data-error="Ketikkan password Anda!">
                        <div class="help-block with-errors"></div>
                        <button class="btn btn-primary" type="submit">Login</button>
                        <button class="btn btn-danger" type="reset">Batal</button>
                        <a href="pendaftaran.html" class="btn btn-success">Daftar</a>
                      </div>
                    </div>
                    <div class="col-3"></div>
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