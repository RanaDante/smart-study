<?php
define("TITLE" , "Update Admin");

include ("../../../inc/constants.php");
include ("../../../inc/db_connection.php");
include("../../../inc/functions.php");
session_start();
if(!isset($_SESSION["admin_logged"])){
    header('location:../../../public/admin_login.php');
}

$id = $_GET['admin_id'];

$admin_sql= "SELECT * FROM admins WHERE admin_id ={$id}";
$result_admin = mysqli_query($db, $admin_sql);

$row_admin = mysqli_fetch_assoc($result_admin);
 
$errors = array();
$success = "";
if (isset($_POST['edit_admin'])) {
    $name = input_data($_POST['name']);
    $email = input_data($_POST['email']);
    $password = input_data($_POST['password']);
    

    $name_chk = check_empty($name);
    $email_chk = check_empty($email);
    $password_chk = check_empty($password);
    

    if($name_chk == false){
        $errors['name']= "Name field can not be empty,\n";
    }elseif($name_chk == true){
            $name_chk = text_field_validation_alph($name);
        if($name_chk == false){
            $errors['name']= "Use alphabets and white space only in Program Name,\n";
        }
    }

    if($email_chk == false){
        $errors['email']= "Email field can not be empty,\n";
    }elseif($email_chk == true){
            $email_chk = email_field_validation($email);
        if($email_chk == false){
            $errors['email']= "Email syntax error,\n";
        }
    }
    if($password_chk == false){
        $errors['pass']= "password field can not be empty";
    }elseif($password_chk == true){
        $password_chk = password_field_validation($password);
        if($password_chk == false){
            $errors['pass']= "Use upper and small later and atleast one digit and one sign";
    }
    }


    if(empty($errors)){
        
        $sql = "UPDATE admins SET admin_name='$name', admin_email='$email', admin_password='$epassword' WHERE admin_id={$id}" ;
        $result = mysqli_query($db, $sql);
        if($result){
            $success= "<div class='alert alert-success text-center'>Program Saved</div>";
            header('location:admins.php');
        }
    }

}

$email = $_SESSION["email"];
$user_id = $_SESSION['userid'];


?>
<?php include('../navigation.php');?>

<div class="page-wrapper">
    <!-- Progams Offered -->
    <div class="content container">
        <div class="row">
            <div class="col-md-11 col-lg-12">
                <div class="heading">
                    <h3>Edit Admin</h3>
                    <?php
                    echo $success;
                    if (isset($errors)) :
                        if(count($errors) > 0) : 
                ?>
                    <div class="alert alert-danger text-center">
                        <?php
                    foreach($errors as $showerror){
                        echo $showerror;
                    }
                    endif;
                endif;
                ?>
                    </div>
                </div>
                <div class="col-lg-12">

                    <form method="POST">
                        <div class="form-group">
                            <label>Admin Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row_admin["admin_name"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Admin Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $row_admin["admin_email"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Admin Password</label>
                            <input type="password" class="form-control" name="password" value="" required>
                        </div>
                        <button class="btn btn-primary" type="submit" name="edit_admin">Update Admin</button>
                    </form>
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
<script src="<?php echo PUBLICPATH?>assets/scripts/script.js"></script>
</body>

</html>