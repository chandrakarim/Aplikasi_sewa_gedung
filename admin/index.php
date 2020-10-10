<!DOCTYPE html>
<html>
<?php include"head.php"; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- <div class="wrapper">
  <aside class="main-sidebar sidebar-dark-primary elevation-4"></aside>
  <div class="content-wrapper"> -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding-top:50px;">
          <section class="col-3"></section>
          <section class="col-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Administrator</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="ceklogin.html">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="akun" placeholder="Username" autofocus>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-5">
                      <input type="password" class="form-control" name="kunci" placeholder="Password">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                	 <div class="col-sm-3">
                  <button type="submit" class="btn btn-info">Log in</button>
                  <button type="reset" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </section>
          <section class="col-3"></section>
        </div>
      </div>
        </div>
      </div>
    </section>
  </div>

</body>
</html>