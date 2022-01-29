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
        $yearac = $row['yearac'];
    }
    echo "<br>";
    echo "<h1 style='text-align:center'> welcome And show All Data For You ( " . $name_students . " ) <br></h1>";
    echo "<hr>";
?>
<?php 

    $query = "SELECT day,  
    name, name_lec, name_doc,  yearac, time_lec, room_name_lec, name_sec, name_ass, time_sec, name_room, Number_sec  
    FROM students 
    JOIN  mission  ON  mission.id_sec_miss = students.id_sec 
    JOIN assistant ON assistant.id_ass = mission.id_ass_miss
    JOIN professor ON professor.id_doc = mission.id_doc_miss
    JOIN sec       ON sec.id = mission.id_sec_miss
    JOIN lecture   ON lecture.id_lec = mission.id_lec_miss
    WHERE students.id_stu = '$id_stu' AND yearac='$yearac'";
    $result = mysqli_query($db, $query);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <table class="table table-bordered">
    <tr style="background:deepskyblue; color:white;">
        <td>Day</td>
        <td>Name</td>
        <td>Year Acadmic</td>
        <td>Number section</td>
        <td>Name lectue</td>
        <td>Name Doctor</td>
        <td>Name room</td>
        <td>Time</td>
        <td style="background:black"></td>
        <td>Name sec</td>
        <td>Name Assistant</td>
        <td>Name Room</td>
        <td>Time sec</td>
    </tr>
    <?php 

        while($row = mysqli_fetch_assoc($result)){
    ?>

    <tr>
        <td><?php echo $row['day']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['yearac']; ?></td>
        <td><?php echo $row['Number_sec']; ?></td>
        <td><?php echo $row['name_lec']; ?></td>
        <td><?php echo $row['name_doc']; ?></td>
        <td><?php echo $row['room_name_lec']; ?></td>
        <td><?php echo $row['time_lec']; ?></td>
        <td style="background:black"></td>
        <td><?php echo $row['name_sec']?></td>
        <td><?php echo $row['name_ass']?></td>
        <td><?php echo $row['name_room']?></td>
        <td><?php echo $row['time_sec']?></td>
    </tr>
    <?php }?>
</table>

<link rel="stylesheet" href="../layout/css/style.css">
<form action="" method="post">
    <button  style="width:100%; height:50px; background:deepskyblue; color:white;" name="Gohome">Home</button><br>
    <button  style="width:100%; height:50px; background:deepskyblue; color:white;" name="Gosection">Section</button><br>
    <button  style="width:100%; height:50px; background:deepskyblue; color:white;" name="logout">Logout</button><br>
</form>



<?php

if(isset($_POST['Gohome'])) { header("location: ../home.php"); }
    
if(isset($_POST['Gosection'])) { header("location: section.php"); }


?>