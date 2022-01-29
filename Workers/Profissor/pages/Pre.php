<?php 
    include_once('../server.php');
    echo "<br><h1 style='text-align:center'> Student Attendance Registration Page <hr> </h1> <br>";
?>

<link rel="stylesheet" href="../layout/css/style.css">
<form  method="post">
<?php include('../error.php'); ?>
<label >Code Student</label><br><input style="width:100%; " type="text" name="id_stu"><br><br>
<label >Day</label><br><input style="width:100%; " type="text" name="day_name"><br><br>
<label >Attendance (y - n)</label><br><input style="width:100%; " type="text" name="yes_no"><br><br>
<button style="width:100%; height:50px; color:white; background:deepskyblue;" name="save_data">Save</button><br>
<button style="width:100%; height:50px; color:white; background:deepskyblue;" name="Goindex">Home</button><br>
</form>

<?php 

    if(isset($_POST['save_data']))
    {
        $id_stu   = $_POST['id_stu'];
        $day_name = $_POST['day_name'];
        $yes_no   = $_POST['yes_no'];
        // echo $id_stu . $day_name . $yes_no;
        if(empty($id_stu))   { array_push($errors, "id   required"); }
        if(empty($day_name)) { array_push($errors, "day  required"); }
        if(empty($yes_no))   { array_push($errors, "fild required"); }
        
        if(count($errors)  == 0)
        {
            $query = "INSERT INTO hodor ( id_stu_hodor, day_hodor, yes_no) 
                        VALUES ( '$id_stu', '$day_name', '$yes_no')";
            mysqli_query($db, $query);
        }
    }

?>