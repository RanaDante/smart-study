<?php
define("TITLE" , "Program");
include ("../../../inc/constants.php");
include ("../../../inc/db_connection.php");
session_start();
if(!isset($_SESSION["admin_logged"])){
    header('location:../../../public/admin_login.php');
}
$email = $_SESSION["email"];
$user_id = $_SESSION['userid'];

 

?>
        <?php include('../navigation.php');?>

        <div class="page-wrapper">
            <!-- Progams Offered -->
            <div class="content container-fluid">
                <div class="row mb-3">
                    <div class="heading col-lg-9">
                        <h3>College Programs</h3>
                    </div>
                    <div class="col-lg-3">
                        <a href="<?php echo PRIVATEPATH;?>admins/programs/add-programs.php" class="btn btn-primary">ADD NEW PROGRAM</a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Program Nmae</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Action</th>

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
                            <td>
                                <a target="_blank" href="edit_program.php?prog_id=<?php echo $row_p["program_id"]; ?>" class="btn btn-primary">Edit</a>
                                <a href="program_delete.php?prog_id=<?php echo $row_p["program_id"]; ?>" class="btn btn-danger">Delete</a>
                            </td>
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
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Nov 2021 10:18:32 GMT -->

</html>