<?php
require_once("../include/initialize.php");

 ?>
  <?php
 // login confirmation
  if(isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
  }
  ?>
 <!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image" href="img/logo-round.png" />
<title>Brainboost E Learning Academy</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet"> 
  <link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet" media="screen">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


  <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>css/util.css">
  <link rel="stylesheet" href="<?php echo web_root; ?>css/styles1.css">

</head>
<body>
  
<div class="container">

<div class="left">
    <div class="content">
        <img src="<?php echo web_root; ?>img/background1.jpg" alt="E Learning Platform Image" class="full-image">
        <div class="bottom-text">E Learning Platform for Learners</div>
    </div>
</div>
<div class="right">
    <div class="form-container">
        <h2>Welcome back to the BrainBoost E-Learning Academy</h2>
        <?php check_message(); ?>
        <form action="" method="POST">
            <label for="usernamne">Username</label>
            <input type="text" id="email" name="user_email" required>
            
            <label for="password">Password</label>
            <div class="password-container">
                <input type="password" id="password" name="user_pass" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
            
            <button type="submit" name="btnLogin" class="login-btn">Log In</button>
    
        </form>
    </div>
</div>
</div>
<script src="../js/script.js"></script>
</body>
</html>
 
<?php

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);

   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");

    } else {
  //it creates a new objects of member
    $user = new User();
    //make use of the static function, and we passed to parameters
    $res = $user::userAuthentication($email, $h_upass);
    if ($res==true) {
       message("You login as ".$_SESSION['TYPE'].".","success");
      if ($_SESSION['TYPE']=='Administrator'){
         redirect(web_root."admin/index.php");
      }else{
           redirect(web_root."admin/login.php");
      }
    }else{
      message("Account does not exist! Please contact Administrator.", "error");
       redirect(web_root."admin/login.php");
    }
 }
 }
 ?> 