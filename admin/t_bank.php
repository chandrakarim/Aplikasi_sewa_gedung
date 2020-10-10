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
                        <h3 class='card-title'><i class='fas fa-shopping-cart mr-1'></i>Data Bank</h3>
                      </div>

                      <div class='card-body'>
                        <h3 class='card-title'><a href='t_tambah_bank.php' class='btn bg-success'>Tambah Data</a>
                      </div>
                      <div class='card-body'>
                        <table id='pemesanan' class='display compact' >
                            <thead>
                                <tr align='center'>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Bank</th>
                                     <th>Nama</th>
                                    <th>No.Rekening</th>
                                </tr>
                            </thead>
                            <tbody>";
                                $akun = mysqli_query($konek,"select * from t_bank order by id desc");
                                while($list = mysqli_fetch_array($akun)){
                             
                                    
                                    echo'
                                    <tr align="center">
                                        <td><a id="edit" href="bankedit.html?'.paramEncrypt("id=$list[id]").'">
                                        <i class="fa fa-pencil-alt"></i></a>
                                         <a href="bankhapus.html?'.paramEncrypt("id=$list[id]").'" onclick="javascript:return confirm(\'Anda yakin menghapus?\');">
                                         <i class="fa fa-trash"></i></a></td>
                                        <td>'.$list["kode"].'</td>
                                        <td>'.$list["bank"].'</td>
                                        <td>'.$list["nama"].'</td>
                                        <td>'.$list["no_rek"].'</td>
                      
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