<?php
define("TITLE" , "Application Form");
include ("../inc/constants.php");
include ("../inc/db_connection.php");
include("application_controller.php");
// session_start();
if(!isset($_SESSION["logged"])){
    header('location:../public/login.php');
}

$query_programs = "SELECT * FROM programs";
$result_programs = mysqli_query($db, $query_programs);

$query_status = "SELECT * FROM status";
$result_status = mysqli_query($db, $query_status);
 

?>
        <?php include('navigation.php');?>

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Apply For Addmission</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" enctype='multipart/form-data'>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Student Information</span></h5>
                                            
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
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Student Name</label>
                                                <input type="text" name="sname" id="sname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Student Father Name</label>
                                                <input type="text" name="sfname" id="sfname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Student Email</label>
                                                <input type="email" name="email" id="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option hidden>Select Gender</option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                    <!-- <option>Others</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" name="state" id="state" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" id="city" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="number" name="age" id="age" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <div>
                                                    <input type="date" name="dob" id="dob" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>National Id</label>
                                                <input type="text" name="idcard" id="nid" class="form-control" min="13">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <input type="text" name="religion" id="religion" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" id="address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Student Mobile Number</label>
                                                <input type="text" name="mobile-number" id="smn" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Father Mobile Number</label>
                                                <input type="text" name="f-mobile-number" id="sfmn" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Matric Obtained Marks</label>
                                                <input type="text" name="matric-marks" id="obtained-m" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Apply For</label>
                                                
                                                <select class="form-control" id="programs" name="programs">
                                                    <option hidden>Select Programs</option>
                                                        <?php while($row = mysqli_fetch_assoc($result_programs)) :?>
                                                            <option value="<?php echo $row["program_id"]; ?>">
                                                            <?php echo $row["program_name"]; ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Joining Date</label>
                                                <div>
                                                    <input type="date" name="submit-date" id="submit-date" class="form-control">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Student Image</label>
                                                <input type="file" name="img" id="img" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <select class="form-control" id="status" name="status" hidden>
                                                    <!-- <option hidden>Status</option> -->
                                                        <?php while($row_status = mysqli_fetch_assoc($result_status)) :?>
                                                            <option value="<?php echo $row_status["status_id"]; ?>">
                                                            <?php echo $row_status["status"]; ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" name="applyfor" class="btn btn-primary" id="submit" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

    <!-- <script>
        $("#submit").on("click", function(e){
            e.preventDefault();
            var name = $("#sname").val();
            var fname = $("#sfname").val();
            var email = $("#email").val();
            var gender = $("#gender").val();
            var state = $("#state").val();
            var city = $("#city").val();
            var age = $("#age").val();
            var dob = $("#dob").val();
            // var dob = $("#dob").val();
            var nid = $("#nid").val();
            var religion = $("#religion").val();
            var address = $("#address").val();
            var smn = $("#smn").val();
            var sfmn = $("#sfmn").val();
            var marks = $("#obtained-m").val();
            var program = $("#programs").val();
            var apply_date = $("#submit-date").val();
            var img = $("#img").val();
            $.ajax({
                url : "application_controller.php",
                type : "POST",
                dataType: 'json',
                data : {
                    s_name:name,
                    s_fname:fname,
                    s_email:email,
                    s_gender:gender,
                    s_state:state,
                    s_city:city,
                    s_age:age,
                    s_dob:dob,
                    s_nid:nid,
                    s_religion:religion,
                    s_address:address,
                    s_smn:smn,
                    s_sfmn:sfmn,
                    s_marks:marks,
                    s_program:program,
                    s_applydate:apply_date,
                    s_img:img
                },
                success: function(data){
                    console.log(data.error);
                    if(data.errors){
                        $(".alert-danger").html(data.errors);
                    }
                    // if(data == 1){
                    //     // loadtable();
                    //     $("#form").trigger("reset");
                    //     // $("#form-div").append("<h2 class='submited'>Form has been successfully submited and data added</h2>")
                    //     $("#success-message").html("Data Inserted").slideDown();
                    //     $("#error-message").slideUp();
                        

                    // }else{
                    //     // alert("data not added");
                    //     // $("#form-div").append("<h2 class='error'>Form not submited correctly</h2>")
                    //     $("#error-message").html("Data Not Inserted").slideDown();
                    //     $("#success-message").slideUp();
                    // }
                } 

            });
        })
        
    </script> -->
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Nov 2021 10:18:32 GMT -->

</html>