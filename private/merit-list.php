<?php
define("TITLE" , "Merit List");

include ("../inc/constants.php");
include ("../inc/db_connection.php");


session_start();

if(!isset($_SESSION["logged"])){
    header('location:../public/login.php');
}

$query_programs = "SELECT * FROM programs";
$result_programs = mysqli_query($db, $query_programs);

$email = $_SESSION["email"]; 
$user_id = $_SESSION['userid'];

// $join  = "SELECT applications.program_id, applications.status_id,applications.id,";
// $join .= "programs.program_id, programs.program_name,";
// $join .= "status.status_id, status.status ";
// $join .= "FROM applications ";
// $join .= "INNER JOIN programs ON applications.program_id = programs.program_id ";
// $join .= "INNER JOIN status ON applications.status_id = status.status_id ";
// $join .= "WHERE applications.id = {$user_id}";

// $sql = "SELECT * FROM users WHERE email = $email";
// echo $join;

// $result = mysqli_query($db, $join);

// $fetch = mysqli_fetch_assoc($result); 
$sql_app = "SELECT * FROM applications";
$result_app = mysqli_query($db, $sql_app);
$fetch_app = mysqli_fetch_assoc($result_app);
$date= $fetch_app['submit_date'];
echo $date;

?>
        <?php include('navigation.php');?>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <form action="">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Apply For</label>
                                
                                <select class="form-control" id="programs" name="programs" onchange="FetchData(this.value)">
                                    <option hidden>Select Programs</option>
                                        <?php while($row = mysqli_fetch_assoc($result_programs)) :?>
                                            <option value="<?php echo $row["program_id"]; ?>">
                                            <?php echo $row["program_name"]; ?>
                                            </option>
                                        <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="page-header">
                </div>
                <div class="heading">
                    <h3>Merit List</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <!-- <th scope="col">#</th> -->

                        <th scope="col">S No.</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">MArks</th>
                        <th scope="col">Percentage</th>
                        <!-- <th scope="col">Merit</th> -->
                        <!-- <th scope="col">Edit</th> -->
                        </tr>
                    </thead>
                    <tbody id='data'>

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

<script>
    function FetchData(id){
        $.ajax({
            type: 'post',
            url:'showmeritlist.php',
            data:{program_id:id},
            success:function(data){
                // console.log(data);
                $("#data").html(data);
            }
        })
    }
</script>
</html>