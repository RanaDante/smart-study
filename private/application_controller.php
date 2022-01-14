<?php 
// include ("../inc/db_connection.php");
include ("../inc/functions.php");

session_start();
if(!isset($_SESSION["logged"])){
    header('location:../public/login.php');
}
$errors = array();
$success = "";
if (isset($_POST['applyfor'])){
        // $name = input_data($_POST['s_name']);
        // $fname = input_data($_POST['s_fname']);
        // $email = input_data($_POST['s_email']);
        // $gender = input_data($_POST['s_gender']);
        // $state = input_data($_POST['s_state']);
        // $city = input_data($_POST['s_city']);
        // $age = input_data($_POST['s_age']);
        // $dob = input_data($_POST['s_dob']);
        // $idcard = input_data($_POST['s_nid']);
        // $religion = input_data($_POST['s_religion']);
        // $address = input_data($_POST['s_address']);
        // $sm_no = input_data($_POST['s_smn']);
        // $sfm_no = input_data($_POST['s_sfmn']);
        // $matric_marks = input_data($_POST['s_marks']);
        // $program = input_data($_POST['s_program']);
        // $submit_date = input_data($_POST['s_applydate']);
        // $img = input_data($_POST['s_img']);

        // Store values in variables and trmi data
        $name = input_data($_POST['sname']);
        $fname = input_data($_POST['sfname']);
        $email = input_data($_POST['email']);
        $gender = input_data($_POST['gender']);
        $state = input_data($_POST['state']);
        $city = input_data($_POST['city']);
        $age = input_data($_POST['age']);
        $dob = input_data($_POST['dob']);
        $idcard = input_data($_POST['idcard']);
        $religion = input_data($_POST['religion']);
        $address = input_data($_POST['address']);
        $sm_no = input_data($_POST['mobile-number']);
        $sfm_no = input_data($_POST['f-mobile-number']);
        $matric_marks = input_data($_POST['matric-marks']);
        $program = input_data($_POST['programs']);
        // $submit_date = input_data($_POST['submit-date']);
        $submit_date = date("m-d-y");
        $img = $_FILES['img'];
        $status = input_data($_POST['status']);
        $user_id = $_SESSION['userid'];
    
        // Check empty values
        $name_chk_v = check_empty($name);
        $fname_chk_v = check_empty($fname);
        $email_chk_v = check_empty($email);
        $state_chk_v = check_empty($state);
        $city_chk_v = check_empty($city);
        $age_chk_v = check_empty($age);
        $dob_chk_v = check_empty($dob);
        $idcard_chk_v = check_empty($idcard);
        $religion_chk_v = check_empty($religion);
        $address_chk_v = check_empty($address);
        $sm_no_chk_v = check_empty($sm_no);
        $sfm_no_chk_v = check_empty($sfm_no);
        $matric_marks_chk_v = check_empty($matric_marks);
        $program_chk_v = check_empty($program);
        // $submit_date_chk_v = check_empty($submit_date);
        // $img_chk_v = check_empty($img);
    
        if($name_chk_v == false){
            $errors['name']= "Name field can not be empty,\n";
        }elseif($name_chk_v == true){
                $name_chk_v = text_field_validation_alph($name);
            if($name_chk_v == false){
                $errors['name']= "Use alphabets and white space only,\n";
        }
        }
        if($fname_chk_v == false){
            $errors['fname']= "Father name field can not be empty,\n";
        }elseif($fname_chk_v == true){
                $fname_chk_v = text_field_validation_alph($fname);
            if($fname_chk_v == false){
                $errors['fname']= "Use alphabets and white space only,\n";
        }
        }
        
        if($email_chk_v == false){
            $errors['email']= "email field can not be empty,\n";
        }elseif($email_chk_v == true){
            $email_chk_v = email_field_validation($email);
            if($_SESSION['email'] != $email){
                $errors['email']= "Use same registered email,\n";
            }
        }

        if($gender != "male" && $gender != "female"){
            $errors['gender']= "Must select gender,\n";
        }

        if($state_chk_v == false){
            $errors['state']= "Enter a state name,\n";
        }elseif($state_chk_v == true){
                $state_chk_v = text_field_validation_alph($state);
            if($state_chk_v == false){
                $errors['state']= "Use alphabets and white space only,\n";
        }
        }
        if($city_chk_v == false){
            $errors['city']= "Enter a city name,\n";
        }elseif($city_chk_v == true){
                $city_chk_v = text_field_validation_alph($city);
            if($city_chk_v == false){
                $errors['city']= "Use alphabets and white space only,\n";
        }
        }
        if($age_chk_v == false){
            $errors['age']= "Enter a age,\n";
        }elseif($age_chk_v == true){
            $age_chk_v = number_field_validation($age);
            if($age < '15'){
                $errors['age']= "Age must be 15 or above,\n";
            }
        }
        if($dob_chk_v == false){
            $errors['dob']= "dob field can not be empty,\n";
        }
        if($idcard_chk_v == false){
            $errors['idcard']= "Enter a idcard,\n";
        }elseif($idcard_chk_v == true){
            $idcard_chk_v = number_field_validation($idcard);
            if(strlen($idcard) < '13'){
                $errors['idcard']= "idcard must have 13 digits,\n";
            }
        }

        if($religion_chk_v == false){
            $errors['religion']= "religion field can not be empty,\n";
        }elseif($religion_chk_v == true){
                $religion_chk_v = text_field_validation_alph($religion);
            if($religion_chk_v == false){
                $errors['religion']= "Use alphabets and white space only,\n";
        }
        }

        if($address_chk_v == false){
            $errors['address']= "Address field can not be empty,\n";
        }elseif($address_chk_v == true){
                $address_chk_v = address_field_validation($address);
            if($address_chk_v == false){
                $errors['address']= "Use alphabets and white space only and # or . sign,\n";
        }
        }
        if($sm_no_chk_v == false){
            $errors['smobile']= "Student mobile number field can not be empty,\n";
        }elseif($sm_no_chk_v == true){
                $sm_no_chk_v = number_field_validation($sm_no);
            if($sm_no_chk_v == false){
                $errors['smobile']= "Use numbers only,\n";
        }
        }
        if($sfm_no_chk_v == false){
            $errors['sfmobile']= "Student father mobile number field can not be empty,\n";
        }elseif($sfm_no_chk_v == true){
                $sfm_no_chk_v = number_field_validation($sfm_no);
            if($sfm_no_chk_v == false){
                $errors['sfmobile']= "Use numbers only,\n";
        }
        }
        if($matric_marks_chk_v == false){
            $errors['matric_marks']= "Enter a your matric marks,\n";
        }elseif($matric_marks_chk_v == true){
            $matric_marks_chk_v = number_field_validation($matric_marks);
            if($matric_marks_chk_v == false){
                $errors['matric_marks']= "Use numbers only,\n";
            }
        }
        if($program === "Select Programs"){
            $errors['program']= "Must select program,\n";
        }

        // if($submit_date_chk_v == false){
        //     $errors['submit-date']= "Submit date field can not be empty,\n";
        // }
        //Image store 
            print_r($img);
            $imgname = $img['name'];
            $imgerror = $img['error'];
            $imgtmp = $img['tmp_name'];
            $imgext = explode('.',$imgname);
            $imgchk = strtolower(end($imgext));
            $imgextstored = array('png','jpg','jpeg');
            $destinationimg = 'uploads/' . $imgname;
            
        if(in_array($imgchk,$imgextstored)){
            // $destinationimg = 'uploads/' . $imgname;
            move_uploaded_file($imgtmp,$destinationimg);
        }else{
            $errors['img']= "Must upload student image,\n";
        }
            
    
            

        // $chk = mysqli_num_rows($result_chk);
        // echo $name . "<br>";
        // echo $fname . "<br>";
        // echo $email . "<br>";
        // echo $gender . "<br>";
        // echo $state . "<br>";
        // echo $city . "<br>";
        // echo $age . "<br>";
        // echo $dob . "<br>";
        // echo $idcard . "<br>";
        // echo $religion . "<br>";
        // echo $address . "<br>";
        // echo $sm_no . "<br>";
        // echo $sfm_no . "<br>";
        // echo $matric_marks . "<br>";
        // echo $program . "<br>";
        // echo $submit_date . "<br>";
        // echo $img . "<br>"; 
        // echo $status . "<br>";
        // echo $user_id . "<br>";
    
        if(empty($errors)){
            // $enc_pass = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO applications(application_id, student_name, father_name, email, gender, state, city, age, date_of_birth, id_card, religion, address, student_mobile, father_mobile, matric_mark, submit_date, image_path, program_id, id, Status_id) VALUES (Null,'$name','$fname','$email','$gender','$state','$city','$age','$dob','$idcard','$religion','$address','$sm_no','$sfm_no','$matric_marks','$submit_date','$destinationimg','$program','$user_id','$status')";

        //    echo $sql;
            $result = mysqli_query($db, $sql);
            if($result){
                $success= "<div class='alert alert-success text-center'>Application succssfully submited</div>";
            }
        }
        
        
        
        
        
        
        
        
        
        
        
        
            
            // $result = mysqli_query($db, $sql);
            // if($result){
            //     $success = "<span style='color:green;font-size:14px;text-align:center;'> Registered Successfully</span>";
            //     header( "refresh:2;url=login.php" );
            // }
        
        
        
        
    
}

// if (!empty($errors)) {
    // $errors=  json_encode($errors);
    // echo gettype($errors);
// }

    // if(count($errors) > 0){
                                            
    //     echo "<div class='alert alert-danger text-center'>";
                                            
    //     foreach($errors as $showerror){
    //         echo $showerror;
    //     }
                                            
    //     echo  "</div>";
                                            
    // }
                                        