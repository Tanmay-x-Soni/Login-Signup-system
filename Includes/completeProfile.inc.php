<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){


//user must login first
session_start();
require_once __DIR__ . '/MVC_profile/profile_contr.inc.php';

if (!isset($_SESSION["id"])) {
    header("Location: ../logIn.php");
    exit();
}
$userId = $_SESSION["id"];
//userid form login page


$fullName = $_POST["full_name"];
$phoneNumber = $_POST["phone_number"];
$gender = normalize_gender($_POST["gender"] ?? '');
$DOB = $_POST["date_of_birth"];
$country = normalize_country($_POST["country"] ?? '');
$bio = $_POST["bio"];

try{
    require 'dbh.inc.php';
     require_once __DIR__ . '/MVC_profile/profile_model.inc.php';

     $profile_errors = [];


      $fullName_error = get_fullname_error($fullName);
      if($fullName_error){
        $profile_errors['fullName_error'] = $fullName_error;
      }

      $phoneNumber_error = get_phone_error($phoneNumber);
      if($phoneNumber_error){
        $profile_errors['phoneNumber_error'] = $phoneNumber_error;
      }
    
      $gender_error = get_gender_error($gender);
      if($gender_error){
        $profile_errors['gender_error'] = $gender_error;
      }

      $dob_error = get_dob_error($DOB);
      if($dob_error){
        $profile_errors['dob_error'] = $dob_error;
      }

      $country_error = get_country_error($country);
      if($country_error){
        $profile_errors['country_error'] = $country_error;
      }

      $bio_error = get_bio_error($bio);
      if($bio_error){
        $profile_errors['bio_error'] = $bio_error;
      }

      require_once '../Includes/config_sessions.inc.php';

      if($profile_errors){
        $_SESSION["profile_errors"] = $profile_errors;

        $profileData =[
            "full_name" => $fullName ,
            "phone_number" => $phoneNumber , 
            "gender" => $gender , 
            "date_of_birth" => $DOB  , 
            "country" =>  $country, 
            "bio" => $bio 
        ];

        $_SESSION["profile_data"] = $profileData;
        header("Location: ../completeProfile.php");
        die();
      }

      unset($_SESSION["profile_errors"]);
      unset($_SESSION["profile_data"]);
      set_user($pdo , $fullName , $phoneNumber , $gender , $DOB , $country , $bio , $userId);

     header("Location: ../dashboard.php");
        $statement = null;
        $pdo = null;
        die();





} catch (PDOException $e){
    die("Querry failed!" . $e->getMessage());
}



} else {
    header("Location:../completeProfile.php");
    die();
}





?>