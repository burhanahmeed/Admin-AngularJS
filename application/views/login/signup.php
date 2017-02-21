<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>app/styles/login-style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>app/styles/libs/bootstrap.css">
<head>
  <title>Sign Up</title>
</head>
<body>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">

        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url()?>app/img/logo.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form method="POST" class="form-signin" action="<?php echo base_url()?>login/register">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="inputName" class="form-control" placeholder="Your Name" required autofocus>
                <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required ><span class="text-danger"><?php echo form_error('inputEmail'); ?></span>
                <input type="password" name="inputPassword" class="form-control" placeholder="Password" required><span class="text-danger"><?php echo form_error('inputPassword'); ?></span>
                <input type="password" name="CPassword" class="form-control" placeholder="Confirm Password" required><span class="text-danger"><?php echo form_error('CPassword'); ?></span>
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Register</button>
                <a href="<?php echo base_url()?>login"><button class="btn btn-lg btn-primary btn-block btn-signin" type="button">Cancel</button></a>

            </form><!-- /form -->
        </div><!-- /card-container -->
        <?php echo $this->session->flashdata('msg'); ?>
    </div><!-- /container -->

</body>
<style type="text/css" src="<?php echo base_url()?>app/js/libs/jquery.min.js"></style>
<style type="text/css" src="<?php echo base_url()?>app/js/libs/bootstrap.min.js"></style>
<style type="text/css" src="<?php echo base_url()?>app/js/login.js"></style>
</html>