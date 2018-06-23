<?php 
ob_start();
session_start();

$user_name_sign_upError = ""; 
$first_name_sign_upError = "";
$last_name_sign_upError = "";
$email_sign_upError = "";
$pass_sign_upError = "";
$error = false;
if(isset($_POST['signup-submit'])) {
  $user_name_sign_up = trim($_POST['user_name_sign_up']);
  $user_name_sign_up = strip_tags($user_name_sign_up);
  $user_name_sign_up = htmlspecialchars($user_name_sign_up);

  $first_name_sign_up = trim($_POST['first_name_sign_up']);
  $first_name_sign_up = strip_tags($first_name_sign_up);
  $first_name_sign_up = htmlspecialchars($first_name_sign_up);

  $last_name_sign_up = trim($_POST['last_name_sign_up']);
  $last_name_sign_up = strip_tags($last_name_sign_up);
  $last_name_sign_up = htmlspecialchars($last_name_sign_up);
  
  $email_sign_up = trim($_POST['email_sign_up']);
  $email_sign_up = strip_tags($email_sign_up);
  $email_sign_up = htmlspecialchars($email_sign_up);

  $pass_sign_up = trim($_POST['pass_sign_up']);
  $pass_sign_up = strip_tags($pass_sign_up);
  $pass_sign_up = htmlspecialchars($pass_sign_up);


  if (empty($user_name_sign_up)) {
    $error = true;
    $user_name_sign_upError = "Please enter your full User name.";
   } else if (strlen($user_name_sign_up) < 3) {
    $error = true;
    $user_name_sign_upError = "User name must have at least 3 characters.";
   } else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,32}$/',$user_name_sign_up)) {
    $error = true;
    $user_name_sign_upError = "Name must contain at least 1 number and 1 letter and be between 6-32 characters long.";
   } else {
    // check whether the email exist or not
    $query = "SELECT user_name FROM users WHERE user_name='$user_name_sign_up'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if($count!=0){
     $error = true;
     $email_sign_upError = "Provided user name is already in use.";
    }
   }


  if ( !filter_var($email_sign_up,FILTER_VALIDATE_EMAIL) ) {
    $error = true;
    $email_sign_upError = "Please enter valid email address.";
   } else {
    // check whether the email exist or not
    $query = "SELECT email FROM users WHERE email='$email_sign_up'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if($count!=0){
     $error = true;
     $email_sign_upError = "Provided Email is already in use.";
    }
   }
   // password validation
   if (empty($pass_sign_up)){
    $error = true;
    $pass_sign_upError = "Please enter password.";
   } else if(strlen($pass_sign_up) < 6) {
    $error = true;
    $pass_sign_upError = "Password must have atleast 6 characters.";
   }

   if (empty($first_name_sign_up)) {
    $error = true;
    $first_name_sign_upError = "Please enter your Name";
   } 
   
   if(empty($last_name_sign_up)) {
    $error = true;
    $last_name_sign_upError = "Please enter your Last Name";
   }
   
   $password = hash('sha256', $pass_sign_up);

   if( !$error ) {
    $sql = "INSERT INTO users(`user_name`,email,pwd,first_name,last_name)
            VALUES ('$user_name_sign_up', '$email_sign_up', '$password', '$first_name_sign_up', '$last_name_sign_up')";      
    $res = mysqli_query($conn, $sql);
  
    if ($res) {
      $errTyp = "success";
      $errMSG = "Successfully registered, you may login now";
      $alert = true;
      unset($user_name_sign_up);
      unset($email_sign_up);
      unset($pass_sign_up);
      unset($first_name_sign_up);
      unset($last_name_sign_up);
    } else {
      $errTyp = "danger";
      $errMSG = "Something went wrong";
      
    }
   } else {
        $alert2 = true;
   }
}

ob_end_flush();
?>