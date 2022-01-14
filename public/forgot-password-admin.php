<?php 
include ("../inc/constants.php");
include ("../inc/db_connection.php");
session_start();
$errors = array();
if(isset($_POST['frg-pass'])){
    $email = $_POST['email'];
    $check_email = "SELECT * FROM admins WHERE admin_email = '$email'";
    $res = mysqli_query($db, $check_email);
    if(mysqli_num_rows($res) > 0){
        $_SESSION['email'] = $email;
        $_SESSION['emai-verified'] = "yes";
        header('location: update-password-admin.php');
        }else{
            $errors['email'] = "Incorrect email";
        }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
    <link rel="stylesheet" href="<?php echo ROOTPATH?>public/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ROOTPATH?>public/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo ROOTPATH?>public/assets/plugins/fontawesome/css/all.min.css">
    


    <link rel="stylesheet" href="<?php echo ROOTPATH?>public/assets/css/style.css">

</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/images/logo-white.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            
                            <h1>Forgot Password?</h1>
                            <p class="account-subtitle">Enter your email to get a password reset link</p>
                            <?php
                                if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach($errors as $showerror){
                                echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                                }
                            ?>

                            <form action="" method="POST">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-0">
                                    <input class="btn btn-block login-btn" type="submit" name="frg-pass" value="Reset Password">
                                </div>
                            </form>

                            <div class="text-center dont-have">Remember your password? <a href="<?php echo ROOTPATH; ?>public/admin_login.php">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="<?php echo ROOTPATH?>public/assets/scripts/jquery.js"></script>
    
    
    <script src="<?php echo ROOTPATH?>public/assets/scripts/popper.min.js"></script>
    <script src="<?php echo ROOTPATH?>public/assets/scripts/bootstrap.min.js"></script>

    <!-- <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/script.js"></script> -->
</body>

</html>