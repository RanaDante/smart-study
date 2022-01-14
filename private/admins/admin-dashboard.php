<?php
include ("../../inc/constants.php");
include ("../../inc/db_connection.php");
session_start();
if(!isset($_SESSION["admin_logged"])){
    header('location:../../public/admin_login.php');
}
$email = $_SESSION["email"];
$user_id = $_SESSION['userid'];

$join  = "SELECT applications.program_id, applications.status_id,applications.id,";
$join .= "programs.program_id, programs.program_name,";
$join .= "status.status_id, status.status ";
$join .= "FROM applications ";
$join .= "INNER JOIN programs ON applications.program_id = programs.program_id ";
$join .= "INNER JOIN status ON applications.status_id = status.status_id ";
// $join .= "WHERE applications.id = {$user_id}";
// $sql = "SELECT * FROM users WHERE email = $email";
// echo $join;
$result = mysqli_query($db, $join);

// $fetch = mysqli_fetch_assoc($result); 

?>
        <?php define('TITLE', 'Admin Dashboard'); include('navigation.php');?>

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome <?php echo $_SESSION['name']; ?></h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="heading">
                    <h3>Students Applications</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Applied For</th>
                        <th scope="col">Status</th>
                        <!-- <th scope="col">Action</th> -->

                        <!-- <th scope="col">Edit</th> -->
                        </tr>
                    </thead>
                    <tbody id="data">
                        <?php 
                    
                        

                        while($row = mysqli_fetch_assoc($result)):
                        ?>
                        <tr>
                            <td><?php echo $row["program_name"];?></td>
                            <td class="status"><?php echo $row["status"];?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>

            <!-- Progams Offered -->
            <div class="content container-fluid">
                <div class="heading">
                    <h3>College Programs</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Program Nmae</th>
                        <th scope="col">Duration</th>
                        <!-- <th scope="col">Action</th> -->

                        <!-- <th scope="col">Edit</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $program_sql= "SELECT * FROM programs";
                        $result_p = mysqli_query($db, $program_sql);
                        while($row_p = mysqli_fetch_assoc($result_p)):
                        ?>
                        <tr>
                            <!-- <th scope="row">1</th> -->
                            <td><?php echo $row_p["program_name"];?></td>
                            <td><?php echo $row_p["program_duration"];?></td>
                            <!-- <td><input type="submit" class="alert-success" style="border:0px;" name="approve" value="Approve"><input type="submit" class="alert-danger" style="border:0px;margin:5px;" name="reject" value="Reject"></td> -->
                            <!-- <td><a href="#">Edit</a></td> -->
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
            <!-- <footer style="position: absolute;bottom: 0px;width: 100%;">
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
    <script>
    $(document).ready(function(){
    $("#data tr").each(function () {
        var status=$(this).find(".status").text(); 
        if(status == "approved"){
            $(this).find(".status").css("color","green");
        }else if(status == "pending"){
            $(this).find(".status").css("color","blue");
        }else{
            $(this).find(".status").css("color","red");
        }
    });
    })
    </script>
</body>



</html>