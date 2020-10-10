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
                  <section class='col-lg-6'>
                    <div class='card'>
                      <div class='card-header'>
                        <h3 class='card-title'><i class='fas fa-key mr-1'></i>Data Hak Akses</h3>
                      </div>
                      <div class='card-body'>
                        <table id='hakakses' class='display compact' style='width:100%'>
                            <thead>
                                <tr align='center'>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Akses</th>
                                </tr>
                            </thead>
                            <tbody>";
                                $akun = mysqli_query($konek,"select * from m_hakakses order by id desc");
                                while($list = mysqli_fetch_array($akun)){
                                    echo'
                                    <tr align="center">
                                        <td>
                                        <a id="edit" href="aturhakakses.html?'.paramEncrypt("id=$list[id]").'">
                                        <i class="fa fa-pencil-alt">
                                        </i>
                                        </a> 
                                        <a href="aturhakakseshapus.html?'.paramEncrypt("id=$list[id]").'" onclick="javascript:return confirm(\'Anda yakin menghapus?\');">
                                        <i class="fa fa-trash"></i></a></td>
                                        <td>'.$list["nama"].'</td>
                                        <td>'.$list["akun"].'</td>
                                        <td>'.$list["kunci"].'</td>
                                        <td>'.$list["akses"].'</td>
                                    </tr>   
                                    ';
                                }
                            echo"
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                  <section class='col-lg-6'>
                    <div class='card'>
                      <div class='card-header'>
                        <h3 class='card-title'><i class='fas fa-key mr-1'></i>Form Hak Akses</h3>
                      </div>
                      <div class='card-body'>";
                        
                      $query = mysqli_query($konek, "select * from m_hakakses where id='$antarid'");
                      $data = mysqli_fetch_array($query);

                      echo"
                        <form class='form-horizontal' method='post' action='aturhakaksesproses.html'>
                            <input type='hidden' class='form-control' name='id' value='".$data["id"]."'>
                            <div class='card-body'>
                                <div class='form-group row'>
                                    <label class='col-sm-2 col-form-label'>Nama</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' name='nama' value='".$data["nama"]."' placeholder='Nama' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-2 col-form-label'>Username</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' name='akun' value='".$data["akun"]."' placeholder='Username' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-2 col-form-label'>Password</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control' name='kunci' value='".$data["kunci"]."' placeholder='Password' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label class='col-sm-2 col-form-label'>Akses</label>
                                    <div class='col-sm-10'>
                                        <select class='form-control' name='akses' required>
                                            <option selected>".$data["akses"]."</option>
                                            <option>root</option>
                                            <option>admin</option>
                                            <option>manager</option>
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
                                    echo"<button type='submit' class='btn btn-info' id='simpan'>Edit</button> <a href='aturhakakses.html' class='btn btn-danger'>Kembali</a>";
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