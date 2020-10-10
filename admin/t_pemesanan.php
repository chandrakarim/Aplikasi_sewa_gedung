<?php
    session_start();
    require"koneksi.php";
    require"function.php";
    $var = decode($_SERVER['REQUEST_URI']);
    $antarid = $var["id"];
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
          <!-- Main Sidebar Container -->
          <aside class='main-sidebar sidebar-dark-primary elevation-4'>";
              include'brandandname.php';
              include'sidebarmenu.php';
        echo"
          </aside>
        
          <!-- Content Wrapper. Contains page content -->
          <div class='content-wrapper'>
            <!-- Main content -->
            <section class='content'>
              <div class='container-fluid'>
                <div class='row'><p></p></div>
                <div class='row'>
                  <section class='col-lg-12'>
                    <div class='card'>
                      <div class='card-header'>
                        <h3 class='card-title'><i class='fas fa-shopping-cart mr-1'></i>Data Pemesanan</h3>
                      </div>

                      <div class='card-body'>
                        <h3 class='card-title'><a href='t_tambah_pemesanan.php' class='btn bg-success'>Tambah Data</a>
                      </div>
                      <div class='card-body'>
                        <table id='pemesanan' class='display compact' >
                            <thead>
                                <tr align='center'>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Tgl pesan</th>
                                    <th>Pelanggan</th>
                                    <th>Nama Pemesan</th>
                                    <th>Paket</th>
                                    <th>Deposit</th>
                                    <th>Pelaksanaan</th>
                                    <th>Orang</th>
                                    <th>Metode</th>
                                    <th>Bukti</th>
                                 
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>";
                                $akun = mysqli_query($konek,"select * from t_pemesanan order by id desc");
                                while($list = mysqli_fetch_array($akun)){
                                  $numHarga = number_format($list["deposit"]);
                                    $queryPelanggan = mysqli_query($konek, "select * from t_pelanggan where id = '".$list["id_t_pelanggan"]."'");
                                    $pelanggan = mysqli_fetch_array($queryPelanggan);
                                    

                                    $queryPaket = mysqli_query($konek, "select * from m_paket where id = '".$list["id_m_paket"]."'");
                                    $paket = mysqli_fetch_array($queryPaket);
                                    echo'
                                    <tr align="center">
                                        <td><a id="edit" href="pemesanan.html?'.paramEncrypt("id=$list[id]").'"><i class="fa fa-pencil-alt"></i></a> <a href="pemesananhapus.html?'.paramEncrypt("id=$list[id]").'" onclick="javascript:return confirm(\'Anda yakin menghapus?\');"><i class="fa fa-trash"></i></a></td>
                                        <td>'.$list["kode"].'</td>
                                        <td>'.$list["tgl_pesan"].'</td>
                                        <td>'.$pelanggan["nama"].'</td>
                                        <td>'.$list["nama"].'</td>
                                        <td>'.$paket["nama"].'</td>
                                        <td>'.$numHarga.'</td>
                                        <td>'.$list["tanggal"].' '.$list["jam"].'</td>
                                        <td>'.$list["orang"].'</td>
                                        <td>'.$list["metode"].'</td>
                                        <td>'.$list["bukti"].'</td>
                                  
                                        <td>'.$list["setuju"].'</td>
                                    </tr>   
                                    ';
                                }
                            echo"
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                 
                </div>
                <!-- /.row (main row) -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->";
          include'footer.php';
          echo"
          <!-- Control Sidebar -->
          <aside class='control-sidebar control-sidebar-dark'>
            <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
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