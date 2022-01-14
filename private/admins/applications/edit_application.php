<?php
define('TITLE','Student Application');
include ("../../../inc/constants.php");
include ("../../../inc/db_connection.php");
session_start();
if(!isset($_SESSION["admin_logged"])){
    header('location:../../../public/admin_login.php');
}
$app_id = $_GET['app_id'];
$query_programs = "SELECT * FROM programs";
$result_programs = mysqli_query($db, $query_programs);

$query_status = "SELECT * FROM status";
$result_status = mysqli_query($db, $query_status);
 

$join  = "SELECT applications.application_id, applications.student_name, applications.father_name, applications.email, applications.gender, applications.state, applications.city, applications.age, applications.date_of_birth, applications.id_card, applications.religion, applications.address, applications.student_mobile, applications.father_mobile, applications.matric_mark, applications.submit_date, applications.image_path,applications.program_id,applications.status_id, applications.id, ";
$join .= "programs.program_id, programs.program_name,";
$join .= "status.status_id, status.status ";
$join .= "FROM applications ";
$join .= "INNER JOIN programs ON applications.program_id = programs.program_id ";
$join .= "INNER JOIN status ON applications.status_id = status.status_id ";
$join .= "WHERE application_id = {$app_id}";
$result_app = mysqli_query($db, $join);
$fetch = mysqli_fetch_assoc($result_app);
$success= "";
if(isset($_POST['status_change'])){
    $status = $_POST['status'];
    $update_status="UPDATE applications SET Status_id= '$status' WHERE application_id = {$app_id}";
    $result_update = mysqli_query($db, $update_status);
    if($result_update){
        $success= "<div class='alert alert-success text-center'>Status Updated Successfully</div>";
        header('location:applications.php');
    }
}

?>
        <?php include('../navigation.php');?>

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Student Application</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">

                                <img class='rounded-circle' src="<?php echo PRIVATEPATH . $fetch['image_path']?>" alt="Student Image">
                                </div>
                                <div class="col ml-md-n2 profile-user-info">
                                    
                                    
                                    <h6 class="user-name mb-2">Name: <?php echo $fetch['student_name'];?></h6>
                                    
                                    <h6 class="user-name mb-2">Email: <?php echo $fetch['email'];?></h6>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-12 ">
                        <?php echo $success;?>
                    <table class="table mb-5">
                        <tbody>
                            <tr>
                            <td><b>Student Name:</b></td>
                            <td><?php echo $fetch['student_name'];?></td>
                            <td><b>Student Father Name:</b></td>
                            <td><?php echo $fetch['father_name'];?></td>
                            </tr>
                            <tr>
                            <td><b>Student Email:</b></td>
                            <td><?php echo $fetch['email'];?></td>
                            <td><b>Student Gender:</b></td>
                            <td><?php echo $fetch['gender'];?></td>
                            </tr>
                            <tr>
                            <td><b>State:</b></td>
                            <td><?php echo $fetch['state'];?></td>
                            <td><b>City:</b></td>
                            <td><?php echo $fetch['city'];?></td>
                            </tr>
                            </tr>
                            <tr>
                            <td><b>Age:</b></td>
                            <td><?php echo $fetch['age'];?></td>
                            <td><b>Date Of Birth:</b></td>
                            <td><?php echo $fetch['date_of_birth'];?></td>
                            </tr>
                            <tr>
                            <td><b>National Id Card No:</b></td>
                            <td><?php echo $fetch['id_card'];?></td>
                            <td><b>Religion:</b></td>
                            <td><?php echo $fetch['religion'];?></td>
                            </tr>
                            <tr>
                            <td><b>Address:</b></td>
                            <td><?php echo $fetch['address'];?></td>
                            <td><b>Student Mobile:</b></td>
                            <td><?php echo $fetch['student_mobile'];?></td>
                            </tr>
                            <tr>
                            <td><b>Student Father Mobile:</b></td>
                            <td><?php echo $fetch['father_mobile'];?></td>
                            <td><b>Matric Marks:</b></td>
                            <td><?php echo $fetch['matric_mark'];?></td>
                            </tr>
                            <tr>
                            <td><b>Application Submit Date:</b></td>
                            <td><?php echo $fetch['submit_date'];?></td>
                            <td><b>Selected Program:</b></td>
                            <td><?php echo $fetch['program_name'];?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                    <form action="" method="POST">
                        <div class="form-group">
                        <label><b>Change Application Status </b></label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="" hidden><?php echo $fetch["status"]; ?></option>
                                <?php while($row_status = mysqli_fetch_assoc($result_status)) :?>
                                <option value="<?php echo $row_status["status_id"];?>">
                                    <?php echo $row_status["status"]; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <input type="submit" name="status_change" class="btn btn-primary" id="submit" value="Update">
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
            

        
            <!-- <footer style="position: absolute;bottom: 0px;width: 100%;">
                <p>Copyright © 2021 KaiZev.</p>
            </footer> -->

        

    


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