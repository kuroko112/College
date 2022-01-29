<?php
    include_once "../server.php";
    $name  = $_SESSION['username'];
    $query = "SELECT * FROM students WHERE email = '$name'";
    $result = mysqli_query($db, $query);
    $name_students = "";
    $id_stu = "";
    while($row = mysqli_fetch_assoc($result))
    {
        $name_students = $row['name'];
        $id_stu = $row['id_stu'];
    }
    echo "<br>";
    echo "<h1 style='text-align:center'> welcome And show All Data For You ( " . $name_students . " ) <br></h1>";
    echo "<hr>";
?>

<?php 
    $query  = "SELECT * FROM students JOIN sec ON sec.id = students.id_sec JOIN  assistant ON sec.id = assistant.id_ass WHERE students.id_stu = $id_stu";
    $result = mysqli_query($db, $query);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<table class="table table-bordered">
    <tr style="background:deepskyblue; color:white;">
        <td>Code Students</td>
        <td>Name students</td>
        <td>Name Assistant</td>
        <td>Name Room</td>
        <td>Number section</td>
    </tr>

    <?php
         while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['id_stu']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['name_ass']; ?></td>
                <td><?php echo $row['name_room']; ?></td>
                <td><?php echo $row['id_sec']; ?></td>
            </tr>

            <?php }?>
</table>

<link rel="stylesheet" href="../layout/css/style.css">
<form action="" method="post">
    <button  style="width:100%; height:50px; background:deepskyblue; color:white;" name="Gohome">Home</button><br>
    <button  style="width:100%; height:50px; background:deepskyblue; color:white;" name="Gosection">Show data</button><br>
    <button  style="width:100%; height:50px; background:deepskyblue; color:white;" name="logout">Logout</button><br>
</form>



<?php

if(isset($_POST['Gohome'])) { header("location: ../home.php"); }
    
if(isset($_POST['Gosection'])) { header("location: showstu.php"); }



?>