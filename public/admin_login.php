<?php 
include ("../inc/db_connection.php");
include ("../inc/constants.php");
session_start();
$email = "";
$name = "";
$errors = array();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password =$_POST['password'];
    $check_email = "SELECT * FROM admins WHERE admin_email = '$email'";
    $res = mysqli_query($db, $check_email);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['admin_password'];
        if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email; 
            $_SESSION['userid'] = $fetch['admin_id'];
            $_SESSION['password'] = $fetch['admin_password'];
            $_SESSION['name'] = $fetch['admin_name'];           
            $_SESSION['admin_logged'] = "yes";
            header('location: ../private/admins/admin-dashboard.php');
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    }else{
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login</title>
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
                            
                            <h1>Admin Login</h1>

                            <p class="account-subtitle">Access to our dashboard</p>

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
                                <div class="form-group border border-secondary">
                                    <input class="form-control" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-block login-btn" name="login" type="submit" value="Login">
                                </div>
                            </form>

                            <div class="text-center forgotpass"><a href="<?php echo ROOTPATH; ?>public/forgot-password-admin.php">Forgot Password?</a>
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