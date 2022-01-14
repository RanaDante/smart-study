<?php
define("TITLE" , "Dashboard");
include ("../inc/constants.php");
include ("../inc/db_connection.php");
session_start();
if(!isset($_SESSION["logged"])){
    header('location:../public/login.php');
}
$email = $_SESSION["email"]; 
$user_id = $_SESSION['userid'];

$join  = "SELECT applications.program_id, applications.status_id,applications.id,";
$join .= "programs.program_id, programs.program_name,";
$join .= "status.status_id, status.status ";
$join .= "FROM applications ";
$join .= "INNER JOIN programs ON applications.program_id = programs.program_id ";
$join .= "INNER JOIN status ON applications.status_id = status.status_id ";
$join .= "WHERE applications.id = {$user_id}";
$result = mysqli_query($db, $join);
?>
        <?php include('navigation.php');?>

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome <?php echo $_SESSION['user'];?></h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="heading">
                    <h3>Applications</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Applied For</th>
                        <th scope="col">Status</th>
                        <!-- <th scope="col">Edit</th> -->
                        </tr>
                    </thead>
                    <tbody id="data">
                        <?php while($row = mysqli_fetch_assoc($result)):?>
                        <tr id="st-app">
                            <!-- <th scope="row">1</th> -->
                            <td><?php echo $row["program_name"];?></td>
                            <td class="status"><?php echo $row["status"];?></td>

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