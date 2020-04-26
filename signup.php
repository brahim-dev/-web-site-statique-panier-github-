<?php //include('includes/functions/server.php') ?>
<?php 
session_start();
include('includes/functions/db.php'); ?>
<?php

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

try{
  $dbClass=new database();
  $dbh=$dbClass->getDb();
}catch(PDOException $e)
{
  $e->getMessage();
}
$message="";
$signup_errors=array();
$error="";
$fnameErr = $lnameErr = $emailErr = $passErr = $phoneErr = "";

$bdname  = $bdemail = $bdphone = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //verification du form register
  if(isset($_POST['register_btn'])){
    $firstname = test_input($_POST["firstname"]);
    $lastname = test_input($_POST["lastname"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $password = test_input($_POST["password"]);
    //firstname validation
    if (empty($firstname)) {
      $fnameErr = "required";
      array_push($signup_errors, "*Firstname is required.");
    } else {
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
        array_push($signup_errors, "*Only letters and white space allowed.");
        $fnameErr = "Only letters and white space allowed";
      }else{
        $bdname.=$firstname;
      }
          //lastname validation
    if (empty($lastname)) {
      array_push($signup_errors, "*Lastname is required.");
      $lnameErr = "required";
    } else {
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
        array_push($signup_errors, "*Only letters and white space allowed.");
        $lnameErr = "Only letters and white space allowed";
      }else{
        $bdname.=" ";
        $bdname.=$lastname;
      }
       //email validation
    if (empty($email)) {
      array_push($signup_errors, "*Email is required.");
      $emailErr = "required";
    } else {
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($signup_errors, "*Invalid email format.");
        $emailErr = "Invalid email format";
      }else {
        //check if email exists
        $query = $dbh->prepare( "SELECT `client_email` FROM `client` WHERE `client_email` = ?" );
        $query->bindValue( 1, $email );
        $query->execute();

        if( $query->rowCount() > 0 ) { # If rows are found for query
          array_push($signup_errors, "*Email already exists.");
          $emailErr = "Email already exists";
        }
      }
      //phone validation
      if (empty($phone)) {
        array_push($signup_errors, "*phone is required.");
        $phoneErr = "required";
      } else {
        // check if phone is well-formed
        if (!preg_match("/^[0-9]*$/", $phone)||strlen($phone) != 10) {
          array_push($signup_errors, "*Invalid phone format.");
          $phoneErr = "Invalid phone format";
        }else{
          $bdphone=$phone;
        }
        //password validation
          
          if(empty($_POST["password"])){
            array_push($signup_errors, "*Password is required.");
            $passErr = "required";
          }else{
            $password=test_input($_POST["password"]);
          }

      }
    }
    }
    }
    foreach($signup_errors as $errors){
      $error.="-";
      $error.=$errors;
      $error.="<br>";
    }
    echo "<script>alert('$error')</script>";

    if (count($signup_errors) == 0) {
    try{

      $sql = "INSERT INTO `client`(`client_name`, `client_email`, `client_pass`, `phone`) VALUES (?,?,?,?)";
      $reqst= $dbh->prepare($sql);
      $reqst->execute([$bdname,$email,$password,$bdphone]);
    }catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
  }

  echo"<script type='text/javascript'>
  userForms = document.getElementById('user_options-forms');
      userForms.classList.remove('bounceRight');
      userForms.classList.add('bounceLeft');
  );
  TweenMax.to('.screen', 2, {
    y: -400,
    opacity: 0,
    ease: Power2.easeInOut,
    delay: 3
});

TweenMax.from('.overlay', 2, {
    ease: Power2.easeInOut
});

TweenMax.to('.overlay', 2, {
    delay: 3.6,
    top: '-110%',
    ease: Expo.easeInOut
});

TweenMax.to('.overlay-2', 2, {
    delay: 4,
    top: '-110%',
    ease: Expo.easeInOut
});

TweenMax.from('.contentt', 2, {
    delay: 4.2,
    opacity: 0,
    ease: Power2.easeInOut
});

TweenMax.to('.contentt', 2, {
    opacity: 1,
    y: -300,
    delay: 4.2,
    ease: Power2.easeInOut
});</script>"
  ;
}
else if(isset($_POST['login_user'])){

  if(empty($_POST["email"]) || empty($_POST["password"]))  
  {  
       $message = '<label>All fields are required</label>';  
  }  
  else  
  {  
       $query = "SELECT * FROM client WHERE client_email = :username AND client_pass = :password";  
       $statement = $dbh->prepare($query);  
       $statement->execute(  
            array(  
                 'username'     =>     $_POST["email"],  
                 'password'     =>     $_POST["password"]  
            )  
       );  
       $data = $statement->fetch();
       $count = $statement->rowCount();  
       if($count > 0)  
       {  
            $_SESSION['client_id']=$data["client_id"];
            $_SESSION['client_email']=$data["client_email"];
            $_SESSION['phone']=$data["phone"];
            $_SESSION['username'] = $data["client_name"];  
            header("location:index.php");  
       }  
       else  
       {  
            $message = '<label>Wrong Data</label>';  
       }  
  }  
}    

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>BAGA - Signup</title>
  <link rel="stylesheet" type="text/css" href="layout/css/sign_up.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/layout/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- Fav icon -->
  <link rel="shortcut icon" type="image/x-icon" href="layout/img/favicon.ico" />

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
 
</head>
<body>
  <!-- <div class="overlay">
        <div class="wrapperr">
      <?xml version="1.0" encoding="utf-8"?>
  
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      viewBox="0 0 1196 302" style="enable-background:new 0 0 1196 302;" xml:space="preserve">

      <g>
      <path class="st0" d="M17.02,12.3h143.41c10.37,0,20.18,1.54,29.41,4.62c9.24,3.08,17.42,7.62,24.55,13.61
      c7.13,6,12.8,13.45,17.02,22.36c4.21,8.92,6.32,19.37,6.32,31.36c0,12.32-2.92,23.18-8.75,32.57c-5.83,9.4-13.78,16.37-23.82,20.9
    c13.93,4.54,25.36,12.24,34.27,23.09c8.91,10.86,13.37,25.04,13.37,42.54c0,11.99-2.11,22.77-6.32,32.33
    c-4.22,9.56-9.97,17.75-17.26,24.55c-7.29,6.81-16.04,11.99-26.25,15.56c-10.21,3.57-21.15,5.35-32.81,5.35H17.02V12.3z
     M66.6,119.74h88.48c10.69,0,18.88-2.99,24.55-8.99c5.67-5.99,8.51-13.04,8.51-21.15c0-8.1-2.84-15.15-8.51-21.15
    c-5.67-5.99-13.86-8.99-24.55-8.99H66.6V119.74z M66.6,233.98h98.2c11.34,0,20.58-3.16,27.71-9.48c7.13-6.32,10.7-14.17,10.7-23.58
    c0-9.72-3.57-17.82-10.7-24.31c-7.13-6.48-16.37-9.72-27.71-9.72H66.6V233.98z"/>
  <path class="st0" d="M607.19,146.96c0-19.76,3.72-38.16,11.18-55.18c7.45-17.02,17.66-31.84,30.63-44.48
    c12.96-12.64,28.27-22.52,45.94-29.65c17.66-7.13,36.54-10.7,56.64-10.7c21.39,0,42.05,4.46,61.98,13.37
    c19.93,8.92,37.35,22.77,52.26,41.57L824.98,93c-8.43-12.31-18.96-21.88-31.6-28.68s-26.58-10.21-41.81-10.21
    c-11.99,0-23.58,2.35-34.76,7.05c-11.18,4.7-21.07,11.27-29.65,19.69c-8.59,8.43-15.4,18.23-20.42,29.41
    c-5.03,11.18-7.54,23.42-7.54,36.7c0,12.97,2.51,25.12,7.54,36.46c5.02,11.35,11.83,21.15,20.42,29.41
    c8.58,8.26,18.47,14.83,29.65,19.69c11.18,4.86,22.77,7.29,34.76,7.29c22.36,0,41.72-6.4,58.09-19.2
    c16.36-12.8,27.3-30.7,32.81-53.72h-91.4v-47.16h144.39v35.49c0,11.02-2.6,24.06-7.78,39.13c-5.19,15.07-13.54,29.41-25.04,43.02
    c-11.51,13.61-26.42,25.2-44.73,34.76c-18.31,9.56-40.43,14.34-66.36,14.34c-20.1,0-38.98-3.57-56.64-10.7
    c-17.67-7.13-32.98-16.93-45.94-29.41c-12.97-12.47-23.17-27.22-30.63-44.24C610.91,185.13,607.19,166.74,607.19,146.96z"/>
  <path class="st00" d="M1046.66,12.3h30.14l113.76,268.84h-53.48l-20.9-50.56h-113.76L982,281.14h-52.99L1046.66,12.3z
     M1098.67,186.34l-38.89-96.26l-39.38,96.26H1098.67z"/>
</g>
<path class="st00" d="M402.77,13.78c0.55,0,1.1,0,1.64,0c0.8,0.65,1.6,1.3,2.36,1.92c0.55-0.2,0.96-0.35,1.42-0.51
  c0.5,1.53-1.06,2.45-0.95,3.85c0.22,0.23,0.46,0.5,0.72,0.75c1.52,1.5,1.57,2.48,0.19,4.12c-0.29,0.35-0.63,0.66-0.94,1
  c-0.57,0.64-1.13,1.28-1.69,1.93c0.69,1.14,1.47,1.87,2.72,2.06c0.42,0.06,0.87,0.29,1.18,0.58c1.63,1.5,3.64,2.1,5.75,2.28
  c2.23,0.19,4.37,0.42,6.47,1.44c1.23,0.6,2.23,1.23,2.79,2.41c0.8,1.72,2.16,2.48,3.94,2.78c2.54,0.43,4.96,1.15,7.08,2.74
  c1.18,0.89,2.45,0.79,3.71,0c1.23-0.77,1.49-1.79,1.21-3.17c-0.36-1.78,0.12-3.37,1.68-4.47c1.58-1.11,3.39-1.68,5.29-1.56
  c1.09,0.07,2.38,0.37,3.16,1.05c1.54,1.36,3.28,1.84,5.21,2.13c0.77,0.11,1.5,0.57,2.23,0.89c0.73,0.32,1.41,0.89,2.16,0.99
  c3.66,0.48,7.34,0.82,10.8,2.26c1.19,0.49,2.31,0.11,3.43-0.39c1.2-0.54,2.41-1.15,3.68-1.44c1.55-0.36,3.16-0.49,4.52,0.78
  c0.32,0.3,0.92,0.4,1.39,0.43c0.91,0.06,1.83,0.01,2.74,0.01c1.27,0,2.53,0,3.8,0c2.45,3.91,2.42,9.83-0.23,12.7
  c-0.52-0.46-1.15-0.85-1.54-1.41c-0.97-1.38-1.83-2.83-2.75-4.25c-0.37-0.58-0.78-1.13-1.18-1.69c-0.37,0.38-0.55,0.66-0.48,0.86
  c0.35,0.98,0.7,1.96,1.17,2.88c0.9,1.74,1.91,3.42,2.81,5.16c1.82,3.52,3.59,7.07,5.4,10.6c0.71,1.38,1.5,2.7,1.68,4.3
  c0.14,1.22,0.71,2.28,1.81,2.93c1.59,0.94,2.59,2.35,2.98,4.09c0.48,2.13,0.9,4.29,1.08,6.45c0.2,2.47,0.7,4.56,3.36,5.49
  c1.15,0.4,1.76,1.42,2.11,2.55c0.4,1.31,0.69,2.65,1.15,3.94c0.56,1.58,1.23,3.13,1.87,4.68c0.04,0.11,0.2,0.18,0.33,0.29
  c0.33-0.11,0.65-0.22,0.95-0.32c0.54,0.4,0.97,0.84,1.49,1.09c2.45,1.19,4.28,3.12,5.95,5.16c0.94,1.15,1.92,2.15,3.14,2.98
  c0.71,0.48,1.43,1,1.58,2.21c-0.57,0.54-1.23,1.16-1.71,1.6c1.14,1.09,2.29,2.11,3.35,3.21c0.85,0.89,1.71,1.38,3.02,1.06
  c1.14-0.28,2.35-0.25,3.53-0.42c1.17-0.17,2.48-0.16,3.45-0.7c2.06-1.15,4.27-1.28,6.49-1.4c2.23-0.13,4.36-0.45,6.18-1.86
  c0.18-0.14,0.39-0.24,0.6-0.32c1.16-0.43,1.97-0.02,1.96,1.23c-0.01,1.3-0.29,2.6-0.51,3.89c-0.1,0.58-0.48,1.13-0.49,1.69
  c-0.05,1.92-0.94,3.49-1.84,5.09c-1.34,2.38-2.87,4.69-3.93,7.2c-1.01,2.41-2.42,4.48-3.97,6.51c-3.41,4.44-7.21,8.45-11.83,11.7
  c-3.59,2.53-6.7,5.67-9.39,9.15c-1.26,1.63-2.44,3.24-4.21,4.37c-1.43,0.91-2.11,2.44-2.84,3.93c-1.03,2.12-2.25,4.15-3.24,6.29
  c-0.93,2-1.32,4.01,0.75,5.71c0.39,0.32,0.72,1.1,0.61,1.55c-0.51,2.2-0.08,4.36,0.11,6.53c0.14,1.61,0.84,2.94,2.12,4
  c0.68,0.56,1.18,1.34,1.48,1.69c-0.13,2.09-0.39,3.73-0.29,5.35c0.15,2.59,0.43,5.18,0.83,7.74c0.31,2.02-0.21,3.77-1.28,5.4
  c-1.6,2.46-3.94,4.02-6.57,5.19c-2.52,1.13-4.77,2.67-6.83,4.51c-1.77,1.58-3.55,3.15-5.37,4.68c-1.12,0.95-1.56,1.76-0.79,2.93
  c0.9,1.36,1.06,2.76,1.1,4.27c0.01,0.53,0.2,1.07,0.31,1.61c0.43,0.23,0.82,0.45,1.37,0.75c-0.19,2-0.44,4.03-0.55,6.07
  c-0.08,1.46-0.84,2.38-2.04,3c-1.01,0.52-2.1,0.9-3.11,1.42c-1.17,0.6-2.37,1.19-3.43,1.97c-1.17,0.86-1.24,1.46-0.74,2.84
  c0.91,2.52,0.33,5.34-0.98,6.52c-0.71,1.5-0.97,2.74-1.72,3.47c-2.17,2.13-3.85,4.63-5.69,7.01c-3.09,3.98-6.5,7.66-10.61,10.63
  c-1.23,0.89-2.54,1.57-4.13,1.67c-0.61,0.04-1.18,0.44-1.79,0.62c-1.41,0.41-2.82,0.8-4.24,1.16c-0.24,0.06-0.53-0.12-0.79-0.17
  c-2.98-0.61-5.87-0.46-8.68,0.82c-0.67,0.31-1.53,0.56-2.21,0.41c-1.78-0.38-3.12,0.21-4.3,1.45c-0.37,0-0.73,0-1.1,0
  c-1.2-1.22-2.59-2.14-4.11-2.51c-0.64-1.81-1.23-3.46-1.83-5.17c1.12-0.93,1.13-2.12,0.72-3.36c-0.4-1.21-0.81-2.41-1.32-3.58
  c-0.66-1.5-1.52-2.92-2.12-4.44c-1.11-2.84-2.68-5.37-4.6-7.73c-2.3-2.82-3.1-6.23-3.57-9.75c-0.18-1.39-0.35-2.78-0.57-4.17
  c-0.24-1.52-0.63-3.03-0.76-4.57c-0.17-2.17-0.51-4.24-1.87-6.04c-0.57-0.76-0.97-1.65-1.43-2.49c-1.69-3.03-3.4-6.05-5.06-9.09
  c-0.39-0.71-0.84-1.51-0.87-2.28c-0.08-2.27-0.18-4.58,0.12-6.82c0.31-2.33,1.14-4.59,1.64-6.9c0.43-1.99,1.33-3.69,2.87-5.01
  c1.15-0.99,1.68-2.25,1.85-3.7c0.28-2.27,0.08-4.46-1.18-6.46c-0.8-1.28-1.06-2.61-0.18-3.99c0.47-0.73,0.33-1.52-0.06-2.22
  c-1.26-2.22-1.57-4.86-3.12-6.96c-0.38-0.52-0.55-1.28-0.58-1.95c-0.08-1.76-0.91-3.14-2.02-4.38c-1.03-1.16-2.17-2.22-3.23-3.36
  c-1.37-1.47-2.73-2.95-4.04-4.47c-0.4-0.47-0.64-1.09-0.94-1.64c-0.34-0.63-0.63-1.28-1-1.88c-0.23-0.37-0.56-0.67-0.74-0.89
  c0.97-1.67,1.86-3.19,2.74-4.71c-0.67-1.42-0.56-2.83,0.01-4.16c0.58-1.35,0.73-2.72,0.63-4.15c-0.08-1.14-0.19-2.27-0.29-3.41
  c-0.06-0.71-0.41-1.22-1.06-1.46c-0.86-0.32-1.43-0.89-1.9-1.67c-0.55-0.91-1.3-1.02-2.23-0.53c-0.47,0.25-0.97,0.58-1.48,0.64
  c-1.58,0.18-3.18,0.23-4.77,0.38c-1.47,0.14-3.73-1.5-3.94-3.18c-0.23-1.9-3.25-4.36-5.19-4.5c-0.18-0.01-0.36,0.01-0.54,0.03
  c-1.85,0.26-3.7,0.5-5.54,0.81c-1.42,0.24-2.91,0.3-4.05,1.42c-0.26,0.26-0.74,0.32-1.13,0.44c-0.87,0.25-1.78,0.41-2.62,0.73
  c-1.83,0.69-3.64,1.47-5.45,2.21c-1.02,0.42-1.98,0.45-3.01-0.14c-0.77-0.44-1.69-0.67-2.57-0.85c-3.12-0.64-6.2-0.17-9.18,0.73
  c-2.04,0.61-4,1.51-6.21,2.36c-1.14-0.63-2.52-1.26-3.75-2.1c-4.97-3.4-10.05-6.66-14.55-10.68c-0.5-0.45-0.95-1.19-1.03-1.84
  c-0.32-2.7-1.79-4.6-3.8-6.25c-0.78-0.64-1.42-1.46-2.47-2.56c-1.29-0.36-1.81-1.69-1.52-3.48c-1.69-0.29-3.35-0.4-4.35-1.91
  c-1.02-1.53-0.72-3.13-0.19-4.87c-0.84-1.32-1.71-2.7-2.6-4.11c0.27-0.37,0.49-0.72,0.76-1.02c1.2-1.32,1.91-2.87,2.26-4.61
  c0.23-1.16,0.56-2.3,0.81-3.46c0.49-2.26,0.67-4.49-0.15-6.74c-0.25-0.7-0.36-1.56-0.21-2.28c0.31-1.45-0.08-2.55-1.07-3.61
  c-1.67-1.8-1.67-3.12-0.34-5.17c0.94-1.45,1.81-2.95,2.65-4.47c0.82-1.48,1.58-2.96,2.9-4.11c0.5-0.44,0.74-1.23,0.99-1.9
  c0.33-0.9,0.5-1.85,0.82-2.75c0.43-1.17,1.15-2.13,2.13-2.96c0.85-0.71,1.78-1.56,2.17-2.55c0.89-2.25,2.31-3.47,4.74-3.94
  c2.7-0.53,4.51-2.62,6.41-4.49c1.54-1.52,2.14-3.18,1.62-5.31c-0.37-1.52-0.08-2.97,0.86-4.3c0.41-0.58,0.62-1.31,0.95-1.96
  c0.45-0.87,0.8-1.84,1.43-2.57c1.3-1.51,3.02-2.5,4.84-3.27c1.46-0.62,2.48-1.63,3.15-3.07c0.67-1.45,1.41-2.87,2.16-4.28
  c0.24-0.46,0.63-0.84,1.1-1.46c0.78,0.62,1.49,1.09,2.1,1.67c1.19,1.14,2.55,1.53,4.14,1.19c0.54-0.11,1.06-0.26,1.6-0.35
  c0.96-0.17,1.88-0.2,2.76,0.39c1.22,0.83,2.34,0.55,3.52-0.29c1.36-0.98,2.79-1.91,4.3-2.61c3.66-1.7,7.56-2.63,11.53-3.33
  c2.35-0.41,4.67-0.77,7.06-0.27c1.52,0.32,3,0.19,4.32-0.75c0.18-0.13,0.48-0.3,0.63-0.23c1.61,0.75,3.35-0.32,4.88,0.25
  c1.66,0.62,3.01,0.32,4.39-0.56C401.82,14.31,402.3,14.05,402.77,13.78z"/>
</svg>


    </div>
    <div class="intro"></div>
    </div>
    <div class="overlay-2"></div>
  </div>
 -->

<!--   <nav>
    <a href="baga.html"><img src="layout/img/nav_logo.png"></a>
  </nav> -->
  <section class="user">
    <div class="user_options-container">
      <div class="user_options-text">
        <div class="user_options-unregistered">
          <h2 class="user_unregistered-title">SIGN UP ?</h2>
          <span class="border"></span>
          <h5>Sign up and discover all the categories.</h5><br>
          <button class="user_unregistered-signup" id="signup-button">SIGN UP <i class="fas fa-arrow-right"></i></button>
        </div>

        <div class="user_options-registered">
          <h2 class="user_registered-title">SIGN IN ?</h2>
          <span class="border"></span>
          <h5 class="user_registered-text">Have an account? Sign in.</h5><br><br>
          <button class="user_registered-login" id="login-button"><i class="fas fa-arrow-left"></i>   SIGN IN</button><br><br>
        </div>
      </div>
      
      <div class="user_options-forms" id="user_options-forms">
        <div class="user_forms-login">
          <form method="post" action="signup.php">
              <?php //include('includes/functions/login_errors.php'); ?>
              <?php  echo $message;?>
              <div class="form-group">
                <input type="email" name="email" id="email" placeholder="  EMAIL "/>
              </div>

              <div class="form-group">
                <input type="password" name="password" id="password" placeholder="  PASSWORD  "/>
              </div>

              <button class="btn btn-warning" type="submit" name="login_user"><span>SUBMIT</span></button><br>
              <div class="forgot" ><a href="">Forgot your password?</a></div>        
          </form>
          <div class="social">
                <a href=""><i class="fab fa-google"></i></a>
                <a href=""><i class="fab fa-facebook-f"></i></a>
          </div>
        </div>

        <div class="user_forms-signup">
          <form class="forms_form" method="post" action="signup.php">
              <?php //include('includes/functions/signup_errors.php'); ?>
              <div class="form-group">
                <input type="name" name="firstname" id="firstname" placeholder=" First Name " value=""/>
                <span class="error"><?php echo $fnameErr;?></span>
              </div>

              <div class="form-group">
                <input type="name" name="lastname" id="lastname" placeholder=" Last Name " value=""/>
                <span class="error"><?php echo $lnameErr;?></span>
              </div>

              <div class="form-group">
                <input type="text" name="email" id="email" placeholder=" Email " value=""/>
                <span class="error"><?php echo $emailErr;?></span>
              </div>

              <div class="form-group">
                <input type="phone" name="phone" id="phone" placeholder=" phone " value=""/>
                <span class="error"><?php echo $phoneErr;?></span>
                </div>  
                <div class="form-group">
                <input class="ness" type="password" name="password" id="password" placeholder=" password"/>
                <span class="error"><?php echo $passErr;?></span>
                </div>

              
              <button class="btn btn-warning" type="submit" name="register_btn"><span>Submit</span></button><br>
              <div class="conditions">By creating an account, you agree to BAGA<a href=""> Terms and Conditions</a> and
              <a href="">Privacy Policies.</a></div>
              
              
          </form>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript">
    
    const signupButton = document.getElementById("signup-button"),
    loginButton = document.getElementById("login-button"),
    userForms = document.getElementById("user_options-forms");

  /**
   * Add event listener to the "Sign Up" button
   */
  signupButton.addEventListener(
    "click",
    ()=>{
      userForms.classList.remove("bounceRight");
      userForms.classList.add("bounceLeft");
    },
    false
  );

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceLeft");
    userForms.classList.add("bounceRight");
  },
  false
);



     TweenMax.to(".screen", 2, {
          y: -400,
          opacity: 0,
          ease: Power2.easeInOut,
          delay: 3
     });

     TweenMax.from(".overlay", 2, {
          ease: Power2.easeInOut
     });

     TweenMax.to(".overlay", 2, {
          delay: 3.6,
          top: "-110%",
          ease: Expo.easeInOut
     });

     TweenMax.to(".overlay-2", 2, {
          delay: 4,
          top: "-110%",
          ease: Expo.easeInOut
     });

     TweenMax.from(".contentt", 2, {
          delay: 4.2,
          opacity: 0,
          ease: Power2.easeInOut
     });

     TweenMax.to(".contentt", 2, {
          opacity: 1,
          y: -300,
          delay: 4.2,
          ease: Power2.easeInOut
     });


</script>
</body>

</html>
