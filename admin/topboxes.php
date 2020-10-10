<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php 
                    $cariPesan = mysqli_query($konek, "select id from t_pemesanan");
                    $pesan = mysqli_num_rows($cariPesan);
                    echo"$pesan";
                  ?>
                </h3>

                <p>Pemesanan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <div class="small-box-footer">&nbsp;</div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php 
                      $cariBayar = mysqli_query($konek, "select id from t_pembayaran");
                      $bayar = mysqli_num_rows($cariBayar);
                      echo"$bayar";
                    ?>
                </h3>

                <p>Pembayaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <div class="small-box-footer">&nbsp;</div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php 
                    $cariDaftar = mysqli_query($konek, "select id from t_pelanggan");
                    $daftar = mysqli_num_rows($cariDaftar);
                    echo"$daftar";
                  ?>
                </h3>

                <p>Pendaftaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <div class="small-box-footer">&nbsp;</div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Pengunjung</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <div class="small-box-footer">&nbsp;</div>
            </div>
          </div>
          <!-- ./col -->