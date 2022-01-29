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

$email_ass =  $_SESSION['username'];
$query  = "SELECT * FROM assistant WHERE email = '$email_ass'";
$result = mysqli_query($db,$query);
$id_ass = "";
while($row = mysqli_fetch_array($result))
{
    $id_ass_sec =  $row['id_sec_ass'];
}

if(isset($_POST['id_stu']))
{
    $id_sec_stu = "";
    $id_stu = $_POST['id_stu'];
    $day_name = $_POST['day_name'];
    $yes_no   = $_POST['yes_no']; 
    
    $query  = "SELECT * FROM students where id_stu = '$id_stu'";

    $result = mysqli_query($db, $query);
    
    while($row = mysqli_fetch_array($result))
    {
        if($row['id_sec'] == $id_ass_sec)
        {
            $query = "INSERT into  hodor_ass (id_hodor_stu_ass, day_name_ass, yes_no_ass)
                   VALUES ('$id_stu','$day_name', '$yes_no')";
            mysqli_query($db, $query);
        } 
        
        else {
            exit("NOT OK");
        }


    }
    



}

?>