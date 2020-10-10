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
                        <h3 class='card-title'><i class='fas fa-money-bill mr-1'></i>Form Pembayaran</h3>
                      </div>
                      <div class='card-body'>";
                        $query = mysqli_query($konek, "select * from t_pembayaran where id='$antarid'");
                        $data = mysqli_fetch_array($query);

                        $cariPesan = mysqli_query($konek,"select * from t_pemesanan where id='".$data["id_t_pemesanan"]."'");
                        $pesan = mysqli_fetch_array($cariPesan);

                        $cariPelanggan = mysqli_query($konek,"select * from t_pelanggan where id='".$pesan["id_t_pelanggan"]."'");
                        $pelanggan = mysqli_fetch_array($cariPelanggan);
                      echo"
                        <form class='form-horizontal' method='post' action='pembayaranproses.html' enctype='multipart/form-data'>
                            <input type='hidden' class='form-control' name='id' value='".$data["id"]."'>
                            <div class='card-body'>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Kode Pesan</label>
                                    <div class='col-sm-9'>
                                        <select class='form-control' name='id_t_pemesanan' required>
                                            <option value='".$pesan['id']."' selected>".$pesan["kode"]."-".$pesan["tgl_pesan"]."-".$pelanggan["nama"]."</option>";
                                            $cariPesan = mysqli_query($konek,"select tp.id,tp.kode,tp.tgl_pesan,tp.id_t_pelanggan from t_pemesanan tp left join t_pembayaran tpem on tp.id=tpem.id_t_pemesanan where tpem.id_t_pemesanan is null order by tp.kode asc");
                                            while($pesan = mysqli_fetch_array($cariPesan)){
                                                $cariPelanggan = mysqli_query($konek,"select * from t_pelanggan where id='".$pesan["id_t_pelanggan"]."'");
                                                $pelanggan = mysqli_fetch_array($cariPelanggan);

                                                echo"<option value='".$pesan['id']."'>".$pesan["kode"]."-".$pesan["tgl_pesan"]."-".$pelanggan["nama"]."</option>";
                                            }
                                        echo"                                            
                                        </select>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Tgl Bayar</label>
                                    <div class='col-sm-9'>
                                        <input type='date' class='form-control' name='tgl_bayar' value='".$data["tgl_bayar"]."' placeholder='Tgl Bayar' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Metode</label>
                                    <div class='col-sm-9'>
                                        <select class='form-control' name='cara' required>
                                            <option selected>".$data["cara"]."</option>
                                            <option>Cash</option>
                                            <option>Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Nominal</label>
                                    <div class='col-sm-9'>
                                        <input type='number' class='form-control' name='nominal' value='".$data["nominal"]."' placeholder='Nominal' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Bank</label>
                                    <div class='col-sm-9'>
                                        <input type='text' class='form-control' name='bank' value='".$data["bank"]."' placeholder='Bank'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>No. Rek</label>
                                    <div class='col-sm-9'>
                                        <input type='number' class='form-control' name='rekening' value='".$data["rekening"]."' placeholder='No. Rek'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Atas Nama</label>
                                    <div class='col-sm-9'>
                                        <input type='text' class='form-control' name='atas_nama' value='".$data["atas_nama"]."' placeholder='Atas Nama'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Bukti</label>
                                    <div class='col-sm-9'>
                                        <input type='file' class='form-control' name='bukti' accept='image/*'>
                                    </div>
                                </div>
                                <div class='form-group row'>";
                                if(!empty($data["bukti"]))
                                {
                                    echo"<img src='img/".$data["bukti"]."' width='200px' height='100px'>";
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
                                    echo"<button type='submit' class='btn btn-info' id='simpan'>Edit</button> <a href='pembayaran.html' class='btn btn-danger'>Kembali</a>";
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