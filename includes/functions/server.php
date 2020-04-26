<?php
// initializing variables
$firstname = "";
$lastname = "";
$email    = "";
$signup_errors = array(); 
$login_errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'authentication') or die ('I cannot connect to the database.');

mysqli_select_db ($db, "db_name");
session_start();





// REGISTER USER
if (isset($_POST['register_btn'])) {
// receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
 if (empty($firstname)) { array_push($signup_errors, "*Firstname is required."); }
 if (empty($lastname)) { array_push($signup_errors, "*Lastname is required."); }
 if (empty($email)) { array_push($signup_errors, "*Email is required."); }
 if (empty($password)) { array_push($signup_errors, "*Password is required."); }
 if ($password != $password_2) { array_push($signup_errors, "*The two passwords do not match.");}

  // first check the database to make sure 
  // a user does not already exist with the same email
 $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
 $result = mysqli_query($db, $user_check_query);
 $user = mysqli_fetch_assoc($result);
 
 if ($user) { // if user exists
   if ($user['email'] === $email) {
     array_push($signup_errors, "*Email already exists.");
   }
 }

  // Finally, register user if there are no errors in the form
    if (count($signup_errors) == 0) {
      $password = md5($password);//encrypt the password before saving in the database

      $query = "INSERT INTO users (firstname, lastname, email, password) 
           VALUES('$firstname','$lastname', '$email', '$password')";
      mysqli_query($db, $query);
      $_SESSION['username'] = $firstname;
      $_SESSION['password'] = $password;
      header('location: index.php');
  }
}




/*---------------------- LOGIN USER ------------------------*/
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($login_errors, "Email is required");
  }
  if (empty($password)) {
    array_push($login_errors, "Password is required");
  }

  if (count($login_errors) == 0) {
    $password = md5($password);
    $query = " SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query) or die(mysql_error());

    if (mysqli_num_rows($results) == 1) {
    
      header('location: index.php');
    }else{
      array_push($login_errors, "Wrong username/password combination");
    }
  }
}
?> 
