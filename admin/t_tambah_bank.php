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
         
      
                  <section class='col-lg-12'>
                    <div class='card'>
                      <div class='card-header'>
                        <h3 class='card-title'><i class='fas fa-shopping-cart mr-1'></i>Form Pemesanan</h3>
                      </div>
                      <div class='card-body'>";
                        $query = mysqli_query($konek, "select * from t_bank where id='$antarid'");
                        $data = mysqli_fetch_array($query);
                        
                      echo"
                        <form class='form-horizontal' method='post' action='bankproses.html' enctype='multipart/form-data'>
                            <input type='hidden' class='form-control' name='id' value='".$data["id"]."'>
                            <div class='card-body'>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Bank</label>
                                    <div class='col-sm-9'>
                                <input type='text' class='form-control' name='bank'  placeholder='Masukan Nama Bank' value='".$data["bank"]."' required>
                                </div>
                                </div>
                              
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Nama</label>
                                    <div class='col-sm-9'>
                                <input type='text' class='form-control' name='nama'  placeholder='Masukan Nama' value='".$data["nama"]."' required>
                                </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>No.Rekening</label>
                                    <div class='col-sm-9'>
                                <input type='number' class='form-control' name='no_rek' value='".$data["no_rek"]."'  placeholder='Masukkan no rekening' required>
                                    </div>
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
                                    echo"<button type='submit' class='btn btn-info' id='simpan'>Edit</button> <a href='pemesanan.html' class='btn btn-danger'>Kembali</a>";
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