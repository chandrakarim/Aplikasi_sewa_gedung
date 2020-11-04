<?php 
  session_start();
  include "admin/koneksi.php";
  require"admin/function.php";
  $var = decode($_SERVER['REQUEST_URI']);
  $antarid = $var["id"];
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
          <h2 class="section-title">Paket Sewa Gedung</h2>
          <span>Paket</span>
          <p class="section-subtitle">Di bawah beberapa paket sewa gedung yang kami sediakan bagi pelanggan.</p>
        </div>

        <div class="row pricing-tables">
          <?php
            $queryPaket = mysqli_query($konek,"select * from m_paket order by id asc");
            
            while($paket = mysqli_fetch_array($queryPaket)){
              $rego = number_format($paket["harga"]);
              echo"
              <div class='col-sm-4'>
                <div class='pricing-table'>
                  <div class='pricing-details'>
                    <h2>".$paket["nama"]."</h2>
                    <div class='price'>Rp $rego <span>/hari</span></div>
                    <ul>
                      <li>Kapasitas: ".$paket["kapasitas"]." orang</li>
                      <li>Listrik: ".$paket["listrik"]." watt</li>
                      <li>Fasilitas: ".$paket["fasilitas"]."</li>
                    </ul>
                  </div>
                  <div class='plan-button' onclick='myFunction()'>
                    <a href='m_masuk.php' class='btn btn-common btn-effect' >Pesan</a>
                  </div>
                </div>
              </div>
              ";
            }
          ?>
          <script>
          function myFunction() {
           alert("Maaf,Untuk Melakukan Pesan Anda Harus Melakukan Login Terlebih Dahulu!");
          }
          </script>

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
                <img src="img/portfolio/img-1.JPG" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-1.JPG"><i class="lni-zoom-in item-icon"></i></a>
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
                <img src="img/portfolio/img-2.JPG" alt="" /> 
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-2.JPG"><i class="lni-zoom-in item-icon"></i></a>
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
                <img src="img/portfolio/img-3.JPG" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-3.JPG"><i class="lni-zoom-in item-icon"></i></a>
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
                <img src="img/portfolio/img-4.JPG" alt="" /> 
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-4.JPG"><i class="lni-zoom-in item-icon"></i></a>
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
                <img src="img/portfolio/img-5.JPG" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-5.JPG"><i class="lni-zoom-in item-icon"></i></a>
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
                <img src="img/portfolio/img-6.JPG" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/img-6.JPG"><i class="lni-zoom-in item-icon"></i></a>
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