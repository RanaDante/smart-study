<?php 
include ("../inc/db_connection.php");
include ("../inc/constants.php");
include ("../inc/functions.php");
$error_tx="";
$error_em="";
$error_pass="";
$error_c_pass="";
$success="";
$error_same_email="";



if(isset($_POST['submit'])){

    // Store values in variables and trmi data
    $name = input_data($_POST['name']);
    $email = input_data($_POST['email']);
    $password = input_data($_POST['password']);
    $c_password = input_data($_POST['c-password']);

    // Check empty values
    $name_chk_v = check_empty($name);
    $email_chk_v = check_empty($email);
    $password_chk_v = check_empty($password);
    $c_password_chk_v = check_empty($c_password);

    if($name_chk_v == false){
        $error_tx= "Name field can not be empty";
    }elseif($name_chk_v == true){
            $name_chk_v = text_field_validation_alph($name);
        if($name_chk_v == false){
            $error_tx= "Use alphabets and white space only";
    }else{
        $error_tx= " ";
    }

    }
    
    if($email_chk_v == false){
        $error_em= "email field can not be empty";
    }elseif($email_chk_v == true){
        $email_chk_v = email_field_validation($email);
        
        $sql_chk = "SELECT * FROM users WHERE email='$email'" ;

       $result_chk = mysqli_query($db, $sql_chk ) ;

       if( mysqli_num_rows($result_chk) > 0 ){
        $error_same_email = "<span style='color:red;font-size:14px;text-align:center;'> Email already exist</span>";
       }
        if($email_chk_v == false){
            $error_em= "Make sure its a valid email syntax";
        }else{
                $error_em= " ";
        }
       
        
    }

    if($password_chk_v == false){
        $error_pass= "password field can not be empty";
    }elseif($password_chk_v == true){
        $password_chk_v = password_field_validation($password);
        if($password_chk_v == false){
        $error_pass= "Use upper and small later and atleast one digit and one sign";
    }
    }
    if($c_password_chk_v == false){
        $error_c_pass= "password field can not be empty";
    }elseif($c_password_chk_v == true){
        if($c_password_chk_v != $password_chk_v){
            $error_c_pass= "Password must match";
        }
    }
    $chk = mysqli_num_rows($result_chk);


    if($name_chk_v != false && $email_chk_v !=false && $password_chk_v !=false && $chk == 0 ){
        $enc_pass = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (id, name, email, password) VALUES (null, '$name' , '$email', '$enc_pass')";
        
        $result = mysqli_query($db, $sql);
        if($result){
            $success = "<span style='color:green;font-size:14px;text-align:center;'> Registered Successfully</span>";
            header( "refresh:2;url=login.php" );
        }
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
                            
                            <h1 style="margin-bottom: 15px;">Register</h1>
                            <?php echo $success; ?>

                            <form action="" method="POST">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" placeholder="Name">
                                    <span><?php echo $error_tx; ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="Email">
                                    <span><?php echo $error_em; echo $error_same_email; ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password"  placeholder="Password">
                                    <span><?php echo $error_pass; ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="c-password" placeholder="Confirm Password">
                                    <span><?php echo $error_c_pass; ?></span>
                                </div>
                                <div class="form-group mb-0">
                                    <input class="btn btn-block login-btn" name="submit" type="submit" value="Register">
                                </div>
                            </form>
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>
                            <div class="text-center dont-have">Already Have Account? <a
                                    href="<?php echo ROOTPATH; ?>public/login.php">Login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo ROOTPATH?>public/assets/scripts/jquery.js"></script>
    
    
    <script src="<?php echo ROOTPATH?>public/assets/scripts/popper.min.js"></script>
    <script src="<?php echo ROOTPATH?>public/assets/scripts/bootstrap.min.js"></script>
</body>

</html>