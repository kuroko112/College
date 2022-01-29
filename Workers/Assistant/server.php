<?php

session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$data_update_student = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '789456123258', 'mis');



// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM assistant WHERE email='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        // To Cheek IF The username Has Taken
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: home.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }


  if(isset($_POST['logout']))
  {
    
    header("location: ../../index.php");
  }

  // Button Go To Pages
  if(isset($_POST['show_stu'])) { header("location: pages/showstu.php"); }
  if(isset($_POST['sec_stu'])) {  header("location: pages/section.php"); }
  if(isset($_POST['shw_lec'])) {  header("location: pages/show_lec.php"); }
  if(isset($_POST['Goindex'])) {  header("location: ../home.php"); }
  if(isset($_POST['add_pres'])){  header("location: pages/pre.php"); }
  if(isset($_POST['add_sco'])){   header("location: pages/sco.php"); }
  //add_sco

?>