<?php  
require_once ("include/initialize.php"); 
if (isset($_SESSION['StudentID'])) {
  # code...
  redirect('index.php');
}
?>

 
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <link rel="icon" type="image" href="img/logo-round.png" />
    <title>BrainBoost E-Learning Academy Registration</title>

    <link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet"> 

    
    <!-- Main CSS-->
    <link rel="stylesheet" href="<?php echo web_root;?>css/styles.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
<div class="container">

        <div class="left">
            <div class="content">
                <img src="img/background1.jpg" alt="E Learning Platform Image" class="full-image">
                <div class="bottom-text">E Learning Platform for Learners</div>
            </div>
        </div>
        
        <div class="right">
        
            <form action="register.php" method="POST">
            <br><br><br><br>
                <h2>Join & Connect the BrainBoost E-Learning Academy</h2>
                <?php check_message(); ?>
                <label for="name">First Name</label>
                <input type="text" id="name" name="FNAME" required>

                <label for="name">Last Name</label>
                <input type="text" id="name" name="LNAME" required>

                <label for="name">Address</label>
                <input type="text" id="name" name="ADDRESS" required>

                <label for="name">Phone Number</label>
                <input type="text" id="name" name="PHONE" required> 

                <label for="username">Username</label>
                <input type="text" id="username" name="USERNAME" required>
                 
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="PASS" required>
                    <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                </div>
                
                <div class="button-container">
                    <button type="submit" name="btnRegister">Sign Up</button>
                </div>
                <br><br>
                <label class="link">Own an Account?<a href="login.php">JUMP RIGHT IN</a></label>
            </form>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo web_root;?>plugins/registration/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo web_root;?>plugins/registration/vendor/select2/select2.min.js"></script>
    <script src="<?php echo web_root;?>plugins/registration/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo web_root;?>plugins/registration/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/script.js"></script>
</body>

</html>
<!-- end document-->




<?php 
if (isset($_POST['btnRegister'])) {
    # code...  

    $student = New Student(); 
    $student->Fname         = $_POST['FNAME']; 
    $student->Lname         = $_POST['LNAME'];
    $student->Address       = $_POST['ADDRESS']; 
    $student->MobileNo         = $_POST['PHONE'];  
    $student->STUDUSERNAME      = $_POST['USERNAME'];
    $student->STUDPASS      = sha1($_POST['PASS']); 
    $student->create();  

    message("Your now succefully registered. You can login now!","success");
    redirect("register.php");

}

?> 