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
    if(isset($_POST['save_data']))
    {
        $id_stu = "";
        $degree = "";
        $id_stu = $_POST['id_stu'];
        $degree = $_POST['degree'];

        $query = "INSERT INTO degrees ( id_stu_degree, number_degrees ) 
                        VALUES ( '$id_stu', '$degree')";
            mysqli_query($db, $query);
        
    }
    

?>