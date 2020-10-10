<?php
    session_start();
    require"koneksi.php";
    if(isset($_SESSION["akun"])){
        echo"
        <!DOCTYPE html>
        <html>";
        include'head.php';
        echo"
        <body class='hold-transition sidebar-mini layout-fixed'>
        <div class='wrapper'>";
        include'wrapper.php';
        echo"
          <aside class='main-sidebar sidebar-dark-primary elevation-4'>";
              include'brandandname.php';
              include'sidebarmenu.php';
        echo"
          </aside>
          <div class='content-wrapper'>
            <section class='content'>
              <div class='container-fluid'>
                <div class='row'><p></p></div>
                <div class='row'>
                  <div class='col-6'>
                    <div class='small-box bg-info'>
                      <div class='inner'>
                        <h3>";
                            $cariPesan = mysqli_query($konek, "select id from t_pemesanan");
                            $pesan = mysqli_num_rows($cariPesan);
                            echo"$pesan";
                        echo"
                        </h3>
                        <h4>Pemesanan</h4>
                      </div>
                      <div class='icon'>
                        <i class='ion ion-bag'></i>
                      </div>
                      <div class='small-box-footer'>&nbsp;</div>
                    </div>
                  </div>
                  <div class='col-6'>
                    <div class='small-box bg-success'>
                      <div class='inner'>
                        <h3>";
                              $cariBayar = mysqli_query($konek, "select id from t_pembayaran");
                              $bayar = mysqli_num_rows($cariBayar);
                              echo"$bayar";
                        echo"
                        </h3>
                        <h4>Pembayaran</h4>
                      </div>
                      <div class='icon'>
                        <i class='ion ion-stats-bars'></i>
                      </div>
                      <div class='small-box-footer'>&nbsp;</div>
                    </div>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-6'>
                    <div class='small-box bg-warning'>
                      <div class='inner'>
                        <h3>";
                            $cariDaftar = mysqli_query($konek, "select id from t_pelanggan");
                            $daftar = mysqli_num_rows($cariDaftar);
                            echo"$daftar";
                          echo"
                        </h3>
                        <h4>Pendaftaran</h4>
                      </div>
                      <div class='icon'>
                        <i class='ion ion-person-add'></i>
                      </div>
                      <div class='small-box-footer'>&nbsp;</div>
                    </div>
                  </div>
                  <div class='col-6'>
                    <div class='small-box bg-danger'>
                      <div class='inner'>
                        <h3>65</h3>
                        <h4>Pengunjung</h4>
                      </div>
                      <div class='icon'>
                        <i class='ion ion-pie-graph'></i>
                      </div>
                      <div class='small-box-footer'>&nbsp;</div>
                    </div>
                  </div>
                </div>
            </section>
          </div>
          ";
          include'footer.php';
          echo"
          <aside class='control-sidebar control-sidebar-dark'>
          </aside>
        </div>
        ";
        include'js.php';
        echo"
        </body>
        </html>
        ";
    }
    else{
        header("location:keluarakses.html");
    }
?>