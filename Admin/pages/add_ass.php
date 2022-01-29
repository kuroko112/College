<?php 
    include "../init.php";
    echo "<br>";
    echo "<h1 style='text-align:center'; >" ."Welcome In Add Assistant Page  </h1> " ;
    echo "<hr> <br>";
?>
<link rel="stylesheet" href="../layout/css/style.css">
<form action="" method="post">
    <?php include "../error.php";?>
    <label >Name</label>       <br>  <input type="text" name="name_ass"        style="width:100%; "><br>
    <label >Address</label>    <br>  <input type="text" name="address_ass"     style="width:100%; "><br>
    <label >Phone</label>      <br>  <input type="text" name="phone_ass"       style="width:100%; "><br>
    <label >Email</label>      <br>  <input type="text" name="email_ass"       style="width:100%; "><br>
    <label >Password</label>   <br>  <input type="password" name="pass_ass"     style="width:100%; "><br><br>
    <button style="width:100%; height:50px; color:white; background:#ffac00;" name="save_ass">Save</button><br>
    <button style="width:100%; height:50px; color:white; background:#ffac00;" name="hide_ass">Hide</button><br>
    <button style="width:100%; height:50px; color:white; background:#ffac00;" name="Goindex">Home</button><br>
</form>

