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

    $query_sel = "SELECT * FROM students join aca on students.yearac = aca.id where students.id_stu = '$id_stu'";

    $result = mysqli_query($db, $query_sel);

    ?>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <table class="table table-bordered">
            <tr style="background:deepskyblue; color:white;">
                <td>Code</td>
                <td>Name</td>
                <td>Academic year</td>
                <td>Class</td>
                <td>Section</td>
                <td>S1</td>
                <td>S2</td>
                <td>S3</td>
                <td>S4</td>
                <td>S5</td>
                <td>S6</td>
                <td style="background:black; color:white;">Tearm 2 </td>
                <td>S1</td>
                <td>S2</td>
                <td>S3</td>
                <td>S4</td>
                <td>S5</td>
                <td>S6</td>
            </tr>

            <?php
                while($row = mysqli_fetch_array($result)){       
            ?>
                <td><?php echo $row['id_stu'];?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['yearac']?></td>
                <td><?php echo $row['class']?></td>
                <td><?php echo $row['id_sec']?></td>
                <td><?php echo $row['s1']?></td>
                <td><?php echo $row['s2']?></td>
                <td><?php echo $row['s3']?></td>
                <td><?php echo $row['s4']?></td>
                <td><?php echo $row['s5']?></td>
                <td><?php echo $row['s6']?></td>
                <td style="background:black; color:white;"></td>
                <td><?php echo $row['s7']?></td>
                <td><?php echo $row['s8']?></td>
                <td><?php echo $row['s9']?></td>
                <td><?php echo $row['s10']?></td>
                <td><?php echo $row['s11']?></td>
                <td><?php echo $row['s12']?></td>
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