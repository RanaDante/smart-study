<?php
define("TITLE" , "Merit Close");

include ("../../../inc/constants.php");
include ("../../../inc/db_connection.php");
include("../../../inc/functions.php");



session_start();
if(!isset($_SESSION["admin_logged"])){
    header('location:../../../public/admin_login.php');
}
$errors = array();
$success = "";
if (isset($_POST['addProg'])) {
    $program = input_data($_POST['sname']) ;
    $duration = $_POST['duration'];
    $program_chk = check_empty($program);
    $duration_chk = check_empty($duration);
    if($program_chk == false){
        $errors['prog']= "Prog Name field can not be empty,\n";
    }elseif($program_chk == true){
            $program_chk = text_field_validation_alph($program);
        if($program_chk == false){
            $errors['prog']= "Use alphabets and white space only in Program Name,\n";
        }
    }
    if($duration_chk == false){
        $errors['prog-dur']= "Name field can not be empty,\n";
    }elseif($duration_chk == true){
            $duration_chk = text_field_validation($duration);
        if($duration_chk == false){
            $errors['prog-dur']= "Use alphabets and Numbers Only white space only,\n";
        }
    }


    if(empty($errors)){
        
        $sql = "INSERT INTO programs(program_id, program_name, program_duration) VALUES(Null, '$program', '$duration')" ;
    //    echo $sql;
        $result = mysqli_query($db, $sql);
        if($result){
            $success= "<div class='alert alert-success text-center'>Program Saved</div>";
            header('location:programs.php');
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
                    <h3>Add College Programs</h3>
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
                            <label>Year</label>
                            <input type="text" class="form-control" name="year" required>
                        </div>
                        <div class="form-group">
                            <label>Duration</label>
                            <input type="text" class="form-control" name="duration" required>
                        </div>
                        
                        <button class="btn btn-primary" type="submit" name="addProg">Save Program</button>
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
<!-- <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script> -->
<script src="<?php echo PUBLICPATH?>assets/scripts/script.js"></script>
</body>
</html>