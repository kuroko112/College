<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Student</title>
  <link rel="stylesheet" type="text/css" href="layout/css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Login Student</h2>
  </div>
	 
  <form method="post" action="index.php">
  	<?php include('error.php'); ?>
  	<div class="input-group">
  		<label>Email</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
		  <button  class="btn" name="logout">Home</button>
  	</div>
  	
  </form>
</body>
</html>