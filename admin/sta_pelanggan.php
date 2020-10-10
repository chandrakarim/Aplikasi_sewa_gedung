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
                    <section class='col-12'>
                        <div class='card'>
                            <div class='card-header'><h3 class='card-title'><i class='fas fa-user mr-1'></i>Data Pelanggan</h3></div>
                            <div class='card-body'>
                                <form class='form-horizontal' method='post' action='reportpelanggan.html'>
                                    <input type='number' name='tahun' placeholder='Tahun' required> <button type='submit' class='btn btn-info'>Tampilkan</button>
                                </form>
                                <div id='sta_pelanggan'></div>
                            </div>
                        </div>
                    </section>
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
        $tahun = $_POST["tahun"];
        if(empty($tahun)){
            echo"";
        }
        else{
            echo"
            <script>
                Highcharts.chart('sta_pelanggan', {
                    title: {
                        text: 'Data Pelanggan Tahun $tahun'
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah'
                        }
                    },
                    xAxis: {
                        type: 'category',
                        labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                        },
                        title: {
                        text: 'Bulan'
                    }
                    },
                    series: [{
                        name: 'Pelanggan',
                        data: [";
                        for($m = 1;$m <= 12;$m++){
                            $cariPelanggan = mysqli_query($konek, "select id from t_pelanggan where year(tgl_daftar) = '$tahun' and month(tgl_daftar) = '$m'");
                            $pelanggan = mysqli_num_rows($cariPelanggan);
                            echo"
                                [$m,$pelanggan],
                            "; 
                        }
                    echo"
                    ]}],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            }
                        }]
                    }
                });
            </script>
            ";
        }
        echo"
        </body>
        </html>
        ";
    }
    else{
        header("location:keluarakses.html");
    }
?>