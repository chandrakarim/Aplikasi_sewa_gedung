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
                        <h3 class='card-title'><i class='fas fa-building mr-1'></i>Form Paket Sewa</h3>
                      </div>
                      <div class='card-body'>";
                        $query = mysqli_query($konek, "select * from m_paket where id='$antarid'");
                        $data = mysqli_fetch_array($query);
                      echo"
                        <form class='form-horizontal' method='post' action='aturpaketproses.html' enctype='multipart/form-data'>
                            <input type='hidden' class='form-control' name='id' value='".$data["id"]."'>
                            <div class='card-body'>
                                <div class='form-group row'>
                                    <label class='col-sm-2 col-form-label'>Nama</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' name='nama' value='".$data["nama"]."' placeholder='Nama Paket' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-2 col-form-label'>Kapasitas</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' name='kapasitas' value='".$data["kapasitas"]."' placeholder='Kapasitas' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-2 col-form-label'>Listrik</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' name='listrik' value='".$data["listrik"]."' placeholder='Listrik' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-2 col-form-label'>Fasilitas</label>
                                    <div class='col-sm-10'>
                                        <textarea name='fasilitas' class='form-control'>".$data["fasilitas"]."</textarea>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-2 col-form-label'>Harga</label>
                                    <div class='col-sm-10'>
                                        <input type='number' class='form-control' name='harga' value='".$data["harga"]."' placeholder='Harga' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-2 col-form-label'>Foto</label>
                                    <div class='col-sm-10'>
                                        <input type='file' class='form-control' name='filefoto1' accept='image/*'>
                                        <input type='file' class='form-control' name='filefoto2' accept='image/*'>
                                        <input type='file' class='form-control' name='filefoto3' accept='image/*'>
                                    </div>
                                </div>
                                <div class='form-group row'>";
                                    $queryGmb = mysqli_query($konek, "select * from m_paket_foto where id_m_paket='".$data["id"]."'");
                                    while($dataGmb = mysqli_fetch_array($queryGmb))
                                    {
                                        echo"
                                        <img src='../img/foto/".$dataGmb["foto"]."' width='100px' height='75px' style='float:left;'>&nbsp;&nbsp;&nbsp;
                                        ";
                                    }
                                echo"
                                </div>
                            </div>
                            <div class='card-footer'>
                                ";
                                if(empty($antarid))
                                {
                                    echo"<button type='submit' class='btn btn-info' id='simpan'>Simpan</button> <button type='reset' class='btn btn-warning'>Reset</button>";
                                }
                                else
                                {
                                    echo"<button type='submit' class='btn btn-info' id='simpan'>Edit</button> <a href='aturpaket.html' class='btn btn-danger'>Kembali</a>";
                                }
                                echo"
                            </div>
                        </form>
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