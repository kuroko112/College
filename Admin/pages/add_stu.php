<?php 
include "../init.php";
echo "<h1 style='text-align:center'; >" ."Welcome In Add Students Page  </h1>" ;
echo "<hr>";

?>

<link rel="stylesheet" href="../layout/css/style.css">
<form action="" method="post" style="background:lightcyan;">
    <?php include "../error.php";?>
    <label>Code</label>    <br>  <input style="width:100%;" type="text" name="id_stu"><br>
    <label>Name </label>   <br>  <input style="width:100%;" type="text" name="name"><br>
    <label>Address</label> <br>  <input style="width:100%;" type="text" name="address"><br>
    <label>Phone</label>   <br>  <input style="width:100%;" type="text" name="phone"><br>
    <label>Academic year</label> <br>  <input style="width:100%;" type="text" name="Ac_year"><br>
    <label>Class</label>   <br>  <input style="width:100%;" type="text" name="class_stu"><br>
    <label>Email</label>   <br>  <input style="width:100%;" type="text" name="email"><br>
    <label>Password </label><br>  <input style="width:100%;" type="password" name="password_stu"><br><br>
    

    <button style="width:100%; height:50px; color:white; background:deepskyblue;" name="save_stu">Save</button>
    <button style="width:100%; height:50px; color:white; background:deepskyblue;" name="Goindex">Home</button>
    <button style="width:100%;height:50px; color:white; background:deepskyblue;"  name="show_data">Show Student</button>
</form>