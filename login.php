
<?php
require_once __DIR__.'/db-connect.php';  
require_once __DIR__.'/session.php';  
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
    header('Location: index.php');
} else {
    $logged = 'out';
 
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library | </title>

    <!-- Bootstrap -->
    <link href="<?php echo SITE_URL;?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo SITE_URL;?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo SITE_URL;?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo SITE_URL;?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo SITE_URL;?>build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">

          <div>

            <h3 class="text-center">Libray Management</h3>
                   
          </div>
          <section class="login_content"> 


            <form action="process_login.php" method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="email" placeholder="email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="pass" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-success submit" name="submit">Log in</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>


              <div class="clearfix"></div>

              <div class="separator">
               <!--  <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p> -->

              <?php 

                if(@ $_GET['error']==1)
                {

                echo 

                    '<div class="alert-light text-danger">
                    
                    Invalid Credentials

                    </div>';
                }
                else
                {
                  echo " ";
                }

              ?>



                <div class="clearfix"></div>
                <br />

                <div>
                  
                 <!--  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
                 <!--  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p> -->

                </div>
              </div>
            </form>
          </section>
        </div>

         
      </div>
    </div>
  </body>
</html>
