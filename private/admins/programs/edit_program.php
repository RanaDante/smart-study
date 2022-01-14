<?php
define("TITLE" , "Add Program");

include ("../../../inc/constants.php");
include ("../../../inc/db_connection.php");
include("../../../inc/functions.php");
// include("../../application_controller.php");


session_start();
if(!isset($_SESSION["admin_logged"])){
    header('location:../../../public/admin_login.php');
}

$id = $_GET['prog_id'];

$program_sql= "SELECT * FROM programs WHERE program_id ={$id}";
$result_p = mysqli_query($db, $program_sql);

$row_p = mysqli_fetch_assoc($result_p);
 
$errors = array();
$success = "";
if (isset($_POST['addProg'])) {
    // text_field_validation($_POST['sname']);
    
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
        
        $sql = "UPDATE programs SET program_name='$program', program_duration='$duration' WHERE program_id={$id}" ;
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
            

            <!-- <div class="form"> -->
            <!-- <div class="row"> -->
            <div class="col-md-11 col-lg-12">
                <div class="heading">
                    <h3>eDIT College Program #  </h3>
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
                            <label>Program Name</label>
                            <input type="text" class="form-control" name="sname" value="<?php echo $row_p["program_name"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Duration</label>
                            <input type="text" class="form-control" name="duration" value="<?php echo $row_p["program_duration"]; ?>" required>
                        </div>
                        
                        <button class="btn btn-primary" type="submit" name="addProg">Save Program</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>

    <!--<footer style="position: absolute;bottom: 0px;width: 100%;">
        <p>Copyright © 2021 KaiZev.</p>
    </footer> -->

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

<!-- Mirrored from preschool.dreamguystech.com/html-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Nov 2021 10:18:32 GMT -->

</html>