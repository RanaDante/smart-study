<?php
include ("../../../inc/db_connection.php");

$id = $_GET['admin_id'];

$admin_sql= "DELETE FROM admins WHERE admin_id ={$id}";
$result = mysqli_query($db, $admin_sql);

if ($result) {
    header('location:admins.php');
}

?>