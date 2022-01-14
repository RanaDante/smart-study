<?php 
include ("../inc/constants.php");
include ("../inc/db_connection.php");
// $sql_app = "SELECT * FROM applications WHERE program_id={$id}";
// $result_app = mysqli_query($db, $sql_app);
// $fetch_app = maysqli_fetch_assoc($result_app);
// $date= $fetch_app['submit_date'];
// echo $date;
$id = $_POST['program_id'];

$sql = "SELECT * FROM applications WHERE program_id={$id} AND submit_date < '12-10-21' ORDER BY matric_mark DESC LIMIT 5";
$result = mysqli_query($db, $sql);
$i= 1;
while($row = mysqli_fetch_assoc($result)) :
    $percentage = ($row["matric_mark"]/1100)*100;
    $percentage_format = number_format($percentage, 2,".", "");
    echo "<tr>";
    echo "<td>". $i ."</td>";
    echo "<td>". $row['student_name'] ."</td>";
    echo "<td>". $row["matric_mark"] ."</td>";
    echo "<td>". $percentage_format ."</td>";
    echo "</tr>";
    
    // echo $i ." ". $row['student_name'] . " " . $row["matric_mark"] . " " . $percentage_format;
endwhile; 
?>