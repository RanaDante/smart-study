<?php
function input_data($data){
    $data = trim($data);
    return $data;
}
 function check_empty($form_field){
     return !empty($form_field);
 }
 function address_field_validation($text_field){
     return preg_match('/[A-Za-z0-9\- #\\,.]+/',$text_field);
 }
 function text_field_validation_alph($text_field){
    return preg_match('/^[a-zA-Z\s]+$/',$text_field);
}function text_field_validation($text_field){
    return preg_match('/^[a-zA-Z0-9\s]+$/',$text_field);
}
 function number_field_validation($num_field){
    return preg_match('/^[0-9]*$/',$num_field);
}
function email_field_validation($email_field){
    return preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email_field);
}
function password_field_validation($num_field){
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%#*?&]{8,}$/',$num_field);
}











































// function srn($roll_num){
//  if(empty($_POST["rollnumber"])){
//      $error_rn= "Student roll number is required";
//  }else{
//      $r_n=$_POST["rollnumber"];
//      if(!preg_match('/\d+/', $r_n)){
//         $error_rn="Only numeric charachters are allow";
//      }
//  }

// return $roll_num;
// }

// function n_f($field_name){
//     if(empty($field_name)){
//         $error_field= "This filed is required";
//     }else{
//         $s_n=$_POST["name"];
//         if(!preg_match('/[a-z]/i', $s_n)){
//            $error_field="Only alphabatic charachters are allow";
//         }
//     }
   
//    return $student_name;
//    }
// function sfn($student_fname){
//     if(empty($_POST["fname"])){
//         $error_fn= "Student name is required";
//     }else{
//         $f_n=$_POST["fname"];
//         if(!preg_match('/[a-z]/i', $f_n)){
//            $error_fn="Only alphabatic charachters are allow";
//         }
//     }
   
//    return $student_fname;
//    }
// function address($student_address){
//     if(empty($_POST["address"])){
//         $error_address= "Student address is required";
//     }else{
//         $s_address=$_POST["address"];
//         if(!preg_match('/\w+/', $s_address)){
//            $error_address="Add valid address";
//         }
//     }
   
//    return $student_address;
//    }
// function scity($student_city){
//     if(empty($_POST["city"])){
//         $error_city= "City name is required";
//     }else{
//         $city=$_POST["city"];
//         if(!preg_match('/[a-z]/i', $city)){
//            $error_city="Only alphabatic charachters are allow";
//         }
//     }
   
//    return $student_city;
//    } 
// function scn($contact_num){
//     if(empty($_POST["contactnumber"])){
//         $error_cn= "Student phone number is required";
//     }else{
//         $c_n=$_POST["contactnumber"];
//         if(!preg_match('/\d+/', $r_n)){
//            $error_cn="Only numeric charachters are allow";
//         }
//     }
   
//    return $contact_num;
//    }
// function email($email){
//     if(empty($_POST["email"])){
//         $error_email= "Email is required";
//     }else{
//         $s_email=$_POST["email"];
//         if(!filter_var($s_email, FILTER_VALIDATE_EMAIL)){
//            $error_email="Invalid email formate";
//         }
//     }
   
//    return $email;
//    }    
// function classes($s_class){
//     $class= $_POST["class-s"];
//     if(!empty($class) && $class != "C1" && $class != "C2" && $class != "C3" && $class != "C4"){
//         $error_rn= "Select class";
//     }
//    return $s_class;    
//     }
   
?>














