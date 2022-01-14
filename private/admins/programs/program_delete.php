<?php
include ("../../../inc/db_connection.php");

$id = $_GET['prog_id'];

$program_sql= "DELETE FROM programs WHERE program_id ={$id}";
$result = mysqli_query($db, $program_sql);

if ($result) {
    header('location:programs.php');
}

?>