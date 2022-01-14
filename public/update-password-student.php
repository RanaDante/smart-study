<?php 
include ("../inc/db_connection.php");
include ("../inc/constants.php");
include ("../inc/functions.php");
session_start();
if(!isset($_SESSION["emai-verified"])){
    header('location:forgot-password.php');
}
$email = $_SESSION["email"]; 
$success="";
$errors = array();

if(isset($_POST['update-pass'])){
    $new_pass = input_data($_POST['new-password']);
    $cnf_pass =input_data($_POST['confirm-password']);
    $new_pass_chk =check_empty($new_pass);
    $cnf_pass_chk =check_empty($cnf_pass);
    if($new_pass_chk == false){
        $errors['new-pass']= "password field can not be empty";
    }elseif($new_pass_chk == true){
        $new_pass_chk = password_field_validation($new_pass);
        if($new_pass_chk == false){
            $errors['new-pass']= "Use upper and small later and atleast one digit and one sign";
    }
    }
    if($cnf_pass_chk == false){
        $errors['cnf-pass']= "Confirm password field can not be empty";
    }elseif($cnf_pass_chk == true){
        if($cnf_pass != $new_pass){
            $errors['cnf-pass']= "Password must match";
        }
    }
    if(empty($errors)){
        $enc_pass = password_hash($new_pass, PASSWORD_BCRYPT);
        $pass_update = "UPDATE users SET password='$enc_pass' WHERE email = '$email'";
        $result = mysqli_query($db, $pass_update);
        if($result){
            $success = "<span style='color:green;font-size:14px;text-align:center;'> Password reset Successfully</span>";
            header( "refresh:1;url=login.php" );
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Update Password</title>
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
                            
                            <h1 class="mb-5">Update Password</h1>
                            <p class="account-subtitle">Add new password</p>

                            <?php
                                echo $success;
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
                                <div class="form-group border border-secondary">
                                <input class="form-control" type="password" name="new-password" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="confirm-password" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-block login-btn" name="update-pass" type="submit" value="Update Password">
                                </div>
                            </form>

                            
                            
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