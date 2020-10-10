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

    <!-- Contact Section Start -->
    <section id="contact" class="section">      
      <div class="contact-form">
        <div class="container">
          <div class="section-header">          
            <h2 class="section-title">Kontak Kami</h2>
            <span>Kontak</span>
            <p class="section-subtitle">Tuliskan pertanyaan atau saran anda.</p>
          </div>
          <div class="row">          
            <div class="col-12">
              <div class="contact-block">
                <form id="contactForm">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required data-error="Tuliskan nama lengkap anda">
                        <div class="help-block with-errors"></div>
                      </div>                                 
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" placeholder="e-Mail" id="email" class="form-control" name="name" required data-error="Tuliskan email anda">
                        <div class="help-block with-errors"></div>
                      </div> 
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" placeholder="Topik" id="msg_subject" class="form-control" required data-error="Tuliskan topik anda">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group"> 
                        <textarea class="form-control" id="message" placeholder="Pesan" rows="7" data-error="Tuliskan pesan anda" required></textarea>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="submit-button">
                        <button class="btn btn-common btn-effect" id="submit" type="submit">Send Message</button>
                        <div id="msgSubmit" class="h3 hidden"></div> 
                        <div class="clearfix"></div> 
                      </div>
                    </div>
                  </div>            
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>            
    </section>
    <!-- Contact Section End -->
    
    <?php include"peta.php"; ?>
    <?php include"footer.php"; ?>
  </body>
</html>