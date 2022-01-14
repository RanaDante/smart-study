<?php 
// include ("../inc/db_connection.php");
// echo date("F j, Y, g:i a");
// echo date("m.d.y"); 
$db = mysqli_connect("localhost" , "root", "" , "test4");
if(isset($_POST['submit'])){
    //Image store 
    $img = $_FILES['img'];
    $imgname = $img['name'];
    $imgerror = $img['error'];
    $imgtmp = $img['tmp_name'];
    $imgext = explode('.',$imgname);
    $imgchk = strtolower(end($imgext));
    $imgextstored = array('png','jpg','jpeg');
    print_r($img);
    // $errors['img']= "Must upload student image,\n";
if(in_array($imgchk,$imgextstored)){
    $destinationimg = 'uploads/' . $imgname;
    move_uploaded_file($imgtmp,$destinationimg);
    $sql = "INSERT INTO img (`id`, `img`) VALUES (NULL,'$destinationimg')";
    $result= mysqli_query($db,$sql);
}
}



?>
<form action="" method="POST" enctype='multipart/form-data'>
<input type="file" name="img" id="">
<input type="submit" name="submit" value="Submit">
</form>