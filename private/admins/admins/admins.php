<?php
define("TITLE" , "Admin Data");
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
                        <a href="<?php echo PRIVATEPATH;?>admins/admins/add-admins.php" class="btn btn-primary">ADD NEW Admin</a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Admin Name</th>
                        <th scope="col">Admin Email</th>
                        <th scope="col">Action</th>

                        <!-- <th scope="col">Edit</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $admin_sql= "SELECT * FROM admins";
                            $result_admin = mysqli_query($db, $admin_sql);
                            while($row_admin = mysqli_fetch_assoc($result_admin)):
                        ?>
                        <tr>
                            <!-- <th scope="row">1</th> -->
                            <td><?php echo $row_admin["admin_name"];?></td>
                            <td><?php echo $row_admin["admin_email"];?></td>
                            <td>
                                <a target="_blank" href="edit_admin.php?admin_id=<?php echo $row_admin["admin_id"]; ?>" class="btn btn-primary">Edit</a>
                                <a href="admin_delete.php?admin_id=<?php echo $row_admin["admin_id"]; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
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