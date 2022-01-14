<?php
define("TITLE" , "Time Table");
include ("../inc/constants.php");
include ("../inc/db_connection.php");
session_start();
if(!isset($_SESSION["logged"])){
    header('location:../public/login.php');
}
$email = $_SESSION["email"]; 
$user_id = $_SESSION['userid'];

// $join  = "SELECT applications.program_id, applications.status_id,applications.id,";
// $join .= "programs.program_id, programs.program_name,";
// $join .= "status.status_id, status.status ";
// $join .= "FROM applications ";
// $join .= "INNER JOIN programs ON applications.program_id = programs.program_id ";
// $join .= "INNER JOIN status ON applications.status_id = status.status_id ";
// $join .= "WHERE applications.id = {$user_id}";
// $result = mysqli_query($db, $join);
?>
        <?php include('navigation.php');?>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="heading">
                    <h3>Time Table</h3>
                </div>
                <table class="table table-striped">
                   
                    <tbody id="data">
                    <tr>
                        <td align="center"  
                            width="100">
                            <b>Day/Period</b>
                        </td>
                        <td align="center"  
                            width="100">
                            <b>I 9:30-10:20</b>
                        </td>
                        <td align="center"  
                            width="100">
                            <b>II 10:20-11:10</b>
                        </td>
                        <td align="center"  
                            width="100">
                            <b>III 11:10-12:00</b>
                        </td>
                        <td align="center"  
                            width="100">
                            <b>12:00-12:40</b>
                        </td>
                        <td align="center"  
                            width="100">
                            <b>IV 12:40-1:30</b>
                        </td>
                        <td align="center"  
                            width="100">
                            <b>V 1:30-2:20</b>
                        </td>
                        <td align="center"  
                            width="100">
                            <b>VI 2:20-3:10</b>
                        </td>
                        <td align="center"  
                            width="100">
                            <b>VII 3:10-4:00</b>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" >
                            <b>Monday</b></td>
                        <td align="center" >Eng</td>
                        <td align="center" >Mat</td>
                        <td align="center" >Che</td>
                        <td rowspan="6" align="center" >
                            <h2>LUNCH</h2>
                        </td>
                        <td colspan="3" align="center" 
                            >LAB</td>
                        <td align="center" >Phy</td>
                    </tr>
                    <tr>
                        <td align="center" >
                            <b>Tuesday</b>
                        </td>
                        <td colspan="3" align="center" 
                            >LAB
                        </td>
                        <td align="center" >Eng</td>
                        <td align="center" >Che</td>
                        <td align="center" >Mat</td>
                        <td align="center" >SPORTS</td>
                    </tr>
                    <tr>
                        <td align="center" >
                            <b>Wednesday</b>
                        </td>
                        <td align="center" >Mat</td>
                        <td align="center" >phy</td>
                        <td align="center" >Eng</td>
                        <td align="center" >Che</td>
                        <td colspan="3" align="center" 
                            >LIBRARY
                        </td>
                    </tr>
                    <tr>
                        <td align="center" >
                            <b>Thursday</b>
                        </td>
                        <td align="center" >Phy</td>
                        <td align="center" >Eng</td>
                        <td align="center" >Che</td>
                        <td colspan="3" align="center" 
                            >LAB
                        </td>
                        <td align="center" >Mat</td>
                    </tr>
                    <tr>
                        <td align="center" >
                            <b>Friday</b>
                        </td>
                        <td colspan="3" align="center" 
                            >LAB
                        </td>
                        <td align="center" >Mat</td>
                        <td align="center" >Che</td>
                        <td align="center" >Eng</td>
                        <td align="center" >Phy</td>
                    </tr>
                    <tr>
                        <td align="center" >
                            <b>Saturday</b>
                        </td>
                        <td align="center" >Eng</td>
                        <td align="center" >Che</td>
                        <td align="center" >Mat</td>
                        <td colspan="3" align="center" 
                            >SEMINAR
                        </td>
                        <td align="center" >SPORTS</td>
                    </tr>
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
    <script src="<?php echo PUBLICPATH?>assets/scripts/script.js"></script>
</body>



</html>