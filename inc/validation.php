<?php
  include ('functions.php');

$error_nf = "";
$error_tf = "";
$error_em = "";

  if(isset($_POST["submit"])){
    // foreach ($name as input_data($name) && $name as check_empty($name) && $name as text_field_validation($name)){
    //     echo $name;
    // }
            // Value store variables
    $rn = input_data($_POST['rollnumber']);
    $name= input_data($_POST['name']);
    $fname= input_data($_POST['fname']);
    $ad= input_data($_POST['address']);    
    $city= input_data($_POST['city']);
    $cn= input_data($_POST['contactnumber']);
    $em= input_data($_POST['email']);
    

    // Check empty variables
    
    $rn_check = check_empty($rn);
    $name_check = check_empty($name);
    $fname_check = check_empty($fname);
    $ad_check = check_empty($ad);
    $city_check = check_empty($city);
    $cn_check = check_empty($cn);
    $em_check = check_empty($em);
    



        
        if($rn_check == false){
            $error_nf= $error_lables['rollnumber']['empty'];
        }elseif($rn_check == true){
            $rn_check = number_field_validation($rn);
            if($rn_check == false){
            $error_nf= $error_lables['rollnumber']['syntax-error'];
        }

        }
    
        
        if($name_check == false){
            $error_tf= $error_lables['name']['empty'];
        }elseif($name_check == true){
            
            $name_check = text_field_validation($name);
            if($name_check == true){
            $error_tf= $error_lables['name']['syntax-error'];
            }
        }
    
        if($fname_check == false){
            $error_tf= $error_lables['fname']['empty'];
        }elseif($fname_check == true){
            $fname_check = text_field_validation($fname);
            if($fname_check == true){
            $error_tf= $error_lables['fname']['syntax-error'];
        }
        }

        if($ad_check == false){
            $error_tf= $error_lables['address']['empty'];
        }elseif($name_check == true){
            $ad_check = text_field_validation($ad);
            if($ad_check){
            $error_tf= $error_lables['address']['syntax-error'];
        }
        }

        if($city_check == false){
            $error_tf= $error_lables['city']['empty'];
        }elseif($city_check == true){
            $city_check = text_field_validation($city);
            if($city_check == true){
            $error_tf= $error_lables['city']['syntax-error'];
        }
        }

        if($cn_check == false){
            $error_nf= $error_lables['contactnumber']['empty'];
        }elseif($cn_check == true){
            $cn_check = number_field_validation($cn);
            if($cn_check == false){
            $error_nf= $error_lables['contactnumber']['syntax-error'];
        }

        }
        
        if($em_check == false){
            $error_em= $error_lables['email']['empty'];
        }elseif($em_check == true){
            $em = email_field_validation($em);
            if($em == true){
            $error_em= $error_lables['email']['syntax-error'];
        }
        }

        
        

}

