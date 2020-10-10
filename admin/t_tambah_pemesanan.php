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
                        $query = mysqli_query($konek, "select * from t_pemesanan where id='$antarid'");
                        $data = mysqli_fetch_array($query);

                        $queryPelanggan = mysqli_query($konek, "select * from t_pelanggan where id = '".$data["id_t_pelanggan"]."'");
                        $pelanggan = mysqli_fetch_array($queryPelanggan);

                        $queryPaket = mysqli_query($konek, "select * from m_paket where id = '".$data["id_m_paket"]."'");
                        $paket = mysqli_fetch_array($queryPaket);
                        
                      echo"
                        <form class='form-horizontal' method='post' action='pemesananproses.html' enctype='multipart/form-data'>
                            <input type='hidden' class='form-control' name='id' value='".$data["id"]."'>
                            <div class='card-body'>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Tanggal pesan</label>
                                    <div class='col-sm-9'>
                                        <input type='date' class='form-control' name='tgl_pesan' value='".$data["tgl_pesan"]."' placeholder='Tanggal pesan' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Pelanggan</label>
                                    <div class='col-sm-9'>
                                        <select class='form-control' name='id_t_pelanggan' required>
                                            <option value='".$pelanggan['id']."' selected>".$pelanggan["nama"]."</option>";
                                            $queryPelanggan = mysqli_query($konek, "select * from t_pelanggan order by nama asc");
                                            while($pelanggan = mysqli_fetch_array($queryPelanggan)){
                                                echo"<option value='".$pelanggan['id']."'>".$pelanggan['nama']."</option>";
                                            }
                                        echo"                                            
                                        </select>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Paket</label>
                                    <div class='col-sm-9'>
                                        <select class='form-control' name='id_m_paket' required>
                                            <option value='".$paket['id']."' selected>".$paket["nama"]."</option>";
                                            $queryPaket = mysqli_query($konek, "select * from m_paket order by nama asc");
                                            while($paket = mysqli_fetch_array($queryPaket)){
                                                echo"<option value='".$paket['id']."'>".$paket['nama']."</option>";
                                            }
                                        echo"                                            
                                        </select>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Pelaksanaan</label>
                                    <div class='col-sm-9'>
                                        <input type='date' class='form-control' name='tanggal' value='".$data["tanggal"]."' placeholder='Tanggal' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Jam</label>
                                    <div class='col-sm-9'>
                                        <input type='time' class='form-control' name='jam' value='".$data["jam"]."' placeholder='Jam' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Audience</label>
                                    <div class='col-sm-9'>
                                        <input type='number' class='form-control' name='orang' value='".$data["orang"]."' placeholder='Audience' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Catatan</label>
                                    <div class='col-sm-9'>
                                        <textarea name='catatan' class='form-control'>".$data["catatan"]."</textarea>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Approval</label>
                                    <div class='col-sm-9'>
                                        <select class='form-control' name='setuju' required>
                                            <option selected>".$data["setuju"]."</option>
                                            <option>Proses</option>
                                            <option>Ya</option>
                                            <option>Tidak</option>
                                        </select>
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