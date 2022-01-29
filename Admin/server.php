<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$data_update_student = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '789456123258', 'mis');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username   = mysqli_real_escape_string($db, $_POST['username']);
  $email      = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  //  Potential errors when fields are empty
  // by adding (array_push()) corresponding error into $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  } 

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

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
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
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

  // Button GO Pages

  if(isset($_POST['Add_stu'])) { header("location: pages/add_stu.php"); }

  // Add Students

  if(isset($_POST['save_stu']))
  {
    $id_stu = $name = $address = $phone = $email = "";
    
    $id_stu       =  $_POST['id_stu'];    
    $name         =  $_POST['name'];
    $address      =  $_POST['address'];
    $phone        =  $_POST['phone'];
    $email        =  $_POST['email'];
    $Ac_year      = $_POST['Ac_year'];
    $class_stu    = $_POST['class_stu'];
    $password_stu = $_POST['password_stu'];
    // echo $id_stu . $name . $address . $phone . $email;
    
    if(empty($id_stu))         { array_push($errors, "ID       is required"); }
    if(empty($name))           { array_push($errors, "name     is required"); }
    if(empty($address))        { array_push($errors, "address  is required"); }
    if(empty($phone))          { array_push($errors, "phone    is required"); }
    if(empty($email))          { array_push($errors, "email    is required"); }
    if(empty($Ac_year))        { array_push($errors, "Academic is required"); }
    if(empty($class_stu))      { array_push($errors, "Class    is required"); }
    if(empty($password_stu))   { array_push($errors, "Password is required"); }
    // --------------------------------------------------------------
    if(count($errors) == 0)
    {
      // id_stu name address email phone id_sec
      $password_stu = md5($password_stu);
      $query = "INSERT INTO students (id_stu, name, address, email, phone,	yearac,class,	password) 
            VALUES('$id_stu', '$name', '$address', '$email', '$phone', '$Ac_year', '$class_stu','$password_stu')";
      mysqli_query($db, $query);

      $query  = "SELECT * FROM students WHERE id_stu = '$id_stu'";
      $result = mysqli_query($db, $query); 
      while($row = mysqli_fetch_assoc($result))
      {
        // Save From A To H in sec - > 1
        if($row['name'][0] == chr(65) || $row['name'][0] == chr(66) || $row['name'][0] == chr(67) || $row['name'][0] == chr(68) || $row['name'][0] == chr(69) || $row['name'][0] == chr(70) || $row['name'][0] == chr(71) || $row['name'][0] == chr(72)   )
        {
          $query = "UPDATE students SET id_sec = '1',Admin_name='hatem' WHERE id_stu = '$id_stu' ";
          mysqli_query($db, $query);
        }
        // Save From I To P in sec - > 2
        if($row['name'][0] == chr(73) || $row['name'][0] == chr(74) || $row['name'][0] == chr(75) || $row['name'][0] == chr(77) || $row['name'][0] == chr(78) || $row['name'][0] == chr(79) || $row['name'][0] == chr(80) || $row['name'][0] == chr(81)   )
        {
          $query = "UPDATE students SET id_sec = '2',Admin_name='hatem' WHERE id_stu = '$id_stu' ";
          mysqli_query($db, $query);
        }
        // Save From Q To Z in Sec 3
        if($row['name'][0] == chr(81) || $row['name'][0] == chr(82) || $row['name'][0] == chr(83) || $row['name'][0] == chr(84) || $row['name'][0] == chr(85) || $row['name'][0] == chr(86) || $row['name'][0] == chr(87) || $row['name'][0] == chr(88) || $row['name'][0] == chr(89) || $row['name'][0] == chr(90)   )
        {
          $query = "UPDATE students SET id_sec = '3',Admin_name='hatem' WHERE id_stu = '$id_stu' ";
          mysqli_query($db, $query);
        }
      }

    }
  
  } 
  // --------------------------------------------------------------------------------

  if(isset($_POST['save_ass']))
  {
    
    $name_ass = 	$address_ass = 	$email_ass = 	$phone_ass	 = "";
    // name_ass	address	email	phone	
    $name_ass     = $_POST['name_ass'];
    $address_ass  = $_POST['address_ass'];
    $phone_ass    = $_POST['phone_ass'];
    $email_ass    = $_POST['email_ass'];
    $pass_ass     = $_POST['pass_ass'];

    // echo $name_ass . 	$address_ass . 	$email_ass . 	$phone_ass;

    if(empty($name_ass))    { array_push($errors, "Name    is required"); }
    if(empty($address_ass)) { array_push($errors, "Address is required"); }
    if(empty($email_ass))   { array_push($errors, "Email   is required"); }
    if(empty($phone_ass))   { array_push($errors, "phone   is required"); }
    if(empty($pass_ass))    { array_push($errors, "Pass    is required"); }
    if(count($errors) == 0)
    {
      $pass_ass = md5($pass_ass);
      
      $query = "INSERT INTO assistant (name_ass, address, email, password, phone) 
                VALUES ('$name_ass', '$address_ass', '$email_ass', '$pass_ass', '$phone_ass')";
      mysqli_query($db, $query);
      $query  = "SELECT * FROM assistant WHERE name_ass = '$name_ass'";
      $result = mysqli_query($db, $query);
      while ($row = mysqli_fetch_assoc($result))
      {
        if($row['name_ass'] == "Ahmed")
        {
          $query = "UPDATE assistant SET id_sec_ass = 1 WHERE name_ass = '$name_ass'";
          mysqli_query($db, $query);
        }

        if($row['name_ass'] == "Ibrahim")
        {
          $query = "UPDATE assistant SET id_sec_ass = 2 WHERE name_ass = '$name_ass'";
          mysqli_query($db, $query);
        }

        if($row['name_ass'] == "Safa")
        {
          $query = "UPDATE assistant SET id_sec_ass = 3 WHERE name_ass = '$name_ass'";
          mysqli_query($db, $query);
        }

        if($row['name_ass'] == "Mahmoud")
        {
          $query = "UPDATE assistant SET id_sec_ass = 3 WHERE name_ass = '$name_ass'";
          mysqli_query($db, $query);
        }

      }
    }

  }




  // Go To a Pages From Pages :)
  
  if(isset($_POST['logout']))
  {
    unset($_SESSION['username']);
    session_destroy();
    header("location: ../index.php");
  }



  if(isset($_POST['Goindex']))        { header("location: ../home.php"); }
  if(isset($_POST['show_stu']))       { header("location: pages/showstu.php"); }
  if(isset($_POST['show_data']))      { header("location: showstu.php");  }
  if(isset($_POST['sec_stu']))        { header("location: pages/stusec.php"); }
  if(isset($_POST['add_page_stu']))   { header("location: add_stu.php");  }
  if(isset($_POST['add_page_ass']))   { header("location: add_ass.php");  }
  if(isset($_POST['Add_ass']))        { header("location: pages/add_ass.php"); }
  if(isset($_POST['shw_lec']))        { header("location: pages/show_lec.php"); }
  if(isset($_POST['show_ass']))       { header("location: pages/showass.php"); }
 ?>