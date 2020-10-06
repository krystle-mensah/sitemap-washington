<?php //include 'admin/inc/dbconfig.php';?>

<!DOCTYPE html>
<html lang="en">

<?php include 'inc/admin_head.php';?>

  <body class="login">

      <div class="row">

        <div class="col-md-6 left">
          <div class="photo">
            <span class="bg"></span>
          </div>
        </div>

        <div class="col-md-6 right">

          <div class="container">

            <div class="logo-client">
            	<img src="img/logo.png" class="img-responsive" alt="">
            </div>

            <h1>Tour CMS</h1>

            <p>Login to your admin panel</p>

            <form action="login.php" method="POST">
              <div class="form-group">
                <label for="email">Email address:</label>
                <div class="input-group input-append">
                    <input type="text" class="form-control" name="login_email" autofocus />
                    <span class="input-group-addon add-on"> <i class="fa fa-envelope"></i></span>
                </div>
              </div>
              <br />

              <div class="form-group">
                <label for="password">Username:</label>
                <div class="input-group input-append">
                    <input type="text" class="form-control" name="username" />
                    <span class="input-group-addon add-on"> <i class="fa fa-user"></i></span>
                </div>
              </div>

              <br />
              <div class="form-group">
                <label for="password">Password:</label>
                <div class="input-group input-append">
                    <input type="password" class="form-control" name="login_password"/>
                    <span class="input-group-addon add-on"> <i class="fa fa-lock"></i></span>
                </div>
              </div>

              <br />

              <div class="form-group">
                <div class="col-sm-12 controls">
                  <button class="btn btn-success btn-full" name="login_button" type="submit">Login</button>
                </div>
              </div>

            </form> 

            <p class="footer"><a href="">Forgotten password?</a></p>

          </div>

        </div>

      </div>

      <div class="footer-sb"><a href="http://studentbridge.com/" target="_blank"></a></div>

    <?php //include 'inc/scripts.php';?>

  </body>
</html>