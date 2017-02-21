<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="app/styles/login-style.css">
<link rel="stylesheet" type="text/css" href="app/styles/libs/bootstrap.css">
<head>
  <title>Login Page</title>
</head>
<body>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
    <?php echo $this->session->flashdata('verify_msg'); ?>
    <?php echo  $this->session->flashdata('msg')?>
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="app/img/logo.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="<?php echo base_url()?>login">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="<?php echo base_url()?>login/register_view"><button class="btn btn-lg btn-primary btn-block btn-signin" type="button" >Sign up</button></a>
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->

</body>
<style type="text/css" src="app/js/libs/jquery.min.js"></style>
<style type="text/css" src="app/js/libs/bootstrap.min.js"></style>
<style type="text/css" src="app/js/login.js"></style>
</html>