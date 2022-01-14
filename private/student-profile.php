<?php
define("TITLE" , "Profile");
include ("../inc/constants.php");
include ("../inc/db_connection.php");
session_start();
if(!isset($_SESSION["logged"])){
    header('location:../public/login.php');
}
$user_id = $_SESSION['userid'];

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($db, $sql);

$fetch = mysqli_fetch_assoc($result); 

//Password form 

include_once ("../inc/functions.php");
$errors = array();
$success="";
    if(isset($_POST['pass-update'])){
        
        $old_pass = input_data($_POST['old-password']);
        $new_pass = input_data($_POST['new-password']);
        $cnf_pass = input_data($_POST['confirm-password']);

        $old_pass_chk = check_empty($old_pass);
        $new_pass_chk = check_empty($new_pass);
        $cnf_pass_chk = check_empty($cnf_pass);

        $check_pass = "SELECT * FROM users WHERE id = '$user_id'";
        $res = mysqli_query($db, $check_pass);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
        }
        if(empty($old_pass)){
            $errors['old-pass'] = "Old Password field can not be empty";
        }
        elseif(!password_verify($old_pass, $fetch_pass)){
            $errors['wrong-pass'] = "Wrong old password";
        }
        
        if($new_pass_chk == false){
            $errors['new-pass']= "New password field can not be empty";
        }elseif($new_pass_chk == true){
            $new_pass_chk = password_field_validation($new_pass);
            if($new_pass_chk == false){
                $errors['new-pass']= "Use upper and small later and atleast one digit and one sign";
        }
        }
        if($cnf_pass_chk == false ){
            $errors['cnf-pass']= "Confirm password field can not be empty";
        }elseif($new_pass != $cnf_pass){
            $errors['cnf-pass']= "Passwod not matched";
        }

        if(empty($errors)){
            $enc_pass = password_hash($new_pass, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET password='$enc_pass' WHERE id='$user_id'";

            $result_pass = mysqli_query($db, $update_pass);
        if($result_pass){
            $success = "<span style='color:green;font-size:14px;text-align:center;'> Pasword changed Successfully</span>";
            header( "refresh:1;url=../public/login.php" );
        }

        }
    }

?>
<?php include('navigation.php');?>

<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title">Profile</h3>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="profile-header">
<div class="row align-items-center">
<div class="col-auto profile-image">

 <!-- <img class='rounded-circle' alt='User Image' src='<?php #echo $fetch['image_path'];?>'> -->
</div>
<div class="col ml-md-n2 profile-user-info">
<h2 class="user-name mb-0">Your Details</h2>
<br>
<h6 class="user-name mb-0">Name: <?php echo $fetch['name'];?> </h6>
<br>
<h6 class="user-name mb-0">Email: <?php echo $fetch['email'];?></h6>
<!-- <div class="user-Location" ><i class="fas fa-map-marker-alt" style="padding-right:10px;"></i><?php #echo $fetch['address'];?></div> -->
</div>
<div class="col-auto profile-btn">
</div>
</div>
</div>





<div id="password_tab" class="col-12" style="margin-top:40px;" >
<div class="card">
<div class="card-body">
<h5 class="card-title">Change Password</h5>
<?php echo $success?>
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
<div class="row">
<div class="col-md-12 col-lg-12">

    <?php
    
    ?>
<form method="POST">
<div class="form-group">
<label>Old Password</label>
<input type="password" name="old-password" class="form-control" required>
</div>
<div class="form-group">
<label>New Password</label>
<input type="password" name="new-password" class="form-control" required>
</div>
<div class="form-group">
<label>Confirm Password</label>
<input type="password" name="confirm-password" class="form-control" required>
</div>
<input class="btn btn-primary" type="submit" name="pass-update" value="Save Changes">
</form>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>

</div>

    <script src="<?php echo PUBLICPATH?>assets/scripts/jquery.js"></script>
    
    
    <script src="<?php echo PUBLICPATH?>assets/scripts/popper.min.js"></script>
    <script src="assets/scripts/bootstrap.min.js"></script>

    <script src="<?php echo PUBLICPATH?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo PUBLICPATH?>assets/plugins/jquery.slimscroll.min.js"></script>

    <!-- <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script> -->

    <script src="<?php echo PUBLICPATH?>assets/scripts/script.js"></script>
</body>



</html>