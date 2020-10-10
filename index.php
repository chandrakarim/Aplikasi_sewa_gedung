<?php 
  session_start();
  include"admin/koneksi.php";
  require"admin/function.php";
  $var = decode($_SERVER['REQUEST_URI']);
  $antarid = $var["id"];
  //var_dump($var);

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

    <!-- Services Section Start -->
    <section id="services" class="section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Layanan Kami</h2>
          <span>Layanan</span>
          <p class="section-subtitle">Mengapa Anda harus memilih kami?</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.2s">
              <div class="icon color-1">
                <i class="lni-pencil"></i>
              </div>
              <h4>Administrasi</h4>
              <p>Customer service kami melayani dengan cepat, Andalah prioritas kami, penyelesaian administrasi prioritas kesekian.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.4s">
              <div class="icon color-2">
                <i class="lni-cog"></i>
              </div>
              <h4>Pemesanan Online</h4>
              <p>Kami menyediakan pemesanan via internet, artinya pelanggan dapat memesan dari mananapun & kapanpun.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.6s">
              <div class="icon color-3">
                <i class="lni-stats-up"></i>
              </div>
              <h4>Pelayanan Memuaskan</h4>
              <p>Kami memberikan pelayanan yang pasti memuaskan pelanggan.<br><br></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services Section End -->

    <?php 
      if(empty($antarid)){
        echo'
        <!-- Call to Action Start -->
        <section class="call-action section">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-10">
                <div class="cta-trial text-center">
                  <h3>Siap bekerja sama dengan kami?</h3>
                  <a href="pendaftaran.html" class="btn btn-success">Daftar</a> 
                  <a href="login.html" class="btn btn-primary ">Login</a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Call to Action End -->  
        ';
      }
    ?>
    
    <?php include"peta.php"; ?>
    <?php include"footer.php"; ?>
  </body>
</html>