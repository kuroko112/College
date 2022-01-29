<?php 
    include_once('../server.php');
    echo "<br><h1 style='text-align:center'> Student Scoring Registration Page <hr> </h1> <br>";
?>
<link rel="stylesheet" href="../layout/css/style.css">
<form  method="post">
    <label >Code Students</label><br><input type="text" name="id_stu" style="width:100%; height:30px;"><br><br>
    <label >Degree</label><br><input type="text" name="degree" style="width:100%; height:30px;"><br><br>    
    <button  style="width:100%; height:50px; " name="save_data">Save</button>
    <button  style="width:100%; height:50px; " name="Goindex">Home</button>
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
        $degree = $_POST['degree'];
        
        $query  = "SELECT * FROm students where id_stu = '$id_stu'";

        $result = mysqli_query($db, $query);
        
        while($row = mysqli_fetch_array($result))
        {
            if($row['id_sec'] == $id_ass_sec)
            {
                $query = "INSERT into  degreeass (id_student, num_degree)
                       VALUES ('$id_stu','$degree')";
                mysqli_query($db, $query);
            } 
            
            else {
                exit("NOT OK");
            }


        }
        



    }    
    
    
    

?>