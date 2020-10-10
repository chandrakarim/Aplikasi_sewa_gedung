<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="highchart/highchart.css"/>
  <link rel='shortcut icon' href='img/favicon.ico'>
  <script src="plugins/jquery/jquery.js"></script>
  <script type="text/javascript" src="datatables.js"></script>
  <link rel="stylesheet" type="text/css" href="datatables.css"/>
  <script>
    $(document).ready(function() {
      $("#simpan").click(function(e){
        if(!confirm('Apakah Anda yakin menyimpan data?'))
          {
            e.preventDefault();returnfalse;
          }
        returntrue;
      });
      $('#hakakses').dataTable();
      $('#paket').dataTable();
      $('#pelanggan').dataTable();
      $('#pemesanan').dataTable();
      $('#pembayaran').dataTable();
  } );
  </script>
</head>