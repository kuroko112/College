<?php 
    echo "<br>";
    include "../init.php";
    echo "<h1 style='text-align:center'; >" ."Welcome In Show lecture Page  </h1> <br>" ;
    echo "<hr>";
?>

<link rel="stylesheet" href="../layout/css/style.css">
<form action="" method="post">
    <label >Day : </label><br><input      style="width:100%;" type="text" name="day_name"><br>
    <label >Code studen</label><br><input style="width:100%;" type="text" name="id_stu"><br><br>
    <button style="width:100%; height:50px; color:white; background:deepskyblue;" name="ser_day">GO</button>
    <button style="width:100%; height:50px; color:white; background:deepskyblue;" name="Goindex">Home</button>
    <button style="width:100%;height:50px; color:white; background:deepskyblue;"  name="hide" >Hide</button>
</form><br><br><br>


<?php


    if(isset($_POST['ser_day']))
    {
        $day_name = $_POST['day_name'];
        $id_stu   = $_POST['id_stu'];
        // echo $id_stu . $day_name;
        $query_day = "SELECT * FROM lecture WHERE day = '$day_name'";
        $query_stu = "SELECT day,  
        name, name_lec, name_doc,  time_lec, room_name_lec, name_sec, name_ass, time_sec, name_room, Number_sec  
        FROM students 
        JOIN  mission  ON  mission.id_sec_miss = students.id_sec 
        JOIN assistant ON  assistant.id_ass = mission.id_ass_miss
        JOIN professor ON  professor.id_doc = mission.id_doc_miss
        JOIN sec       ON  sec.id = mission.id_sec_miss
        JOIN lecture   ON  lecture.id_lec = mission.id_lec_miss
        WHERE students.id_stu = '$id_stu'";

        $resule_day = mysqli_query($db, $query_day);
        $resule_stu = mysqli_query($db, $query_stu);

        while ($row = mysqli_fetch_assoc($resule_day))
        {
            $day_name = $row['day'];
        }

        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <table class="table table-bordered">
            <tr style="background:deepskyblue; color:white;">
                <td>Day</td>
                <td>Name</td>
                <td>Number section</td>
                <td>Name lectuer</td>
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

                while($row = mysqli_fetch_array($resule_stu)){
            ?>

            <tr>
                <td><?php echo $row['day'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['Number_sec'];?></td>
                <td><?php echo $row['name_lec'];?></td>
                <td><?php echo $row['name_doc'];?></td>
                <td><?php echo $row['room_name_lec'];?></td>
                <td><?php echo $row['time_lec'];?></td>
                <td style="background:black"></td>
                <td><?php echo $row['name_sec'];?></td>
                <td><?php echo $row['name_ass'];?></td>
                <td><?php echo $row['name_room'];?></td>
                <td><?php echo $row['time_sec'];?></td>
            </tr>
        <?php }?>
        </table>



    <?php
    }

    if(isset($_POST['hide'])){ echo ""; }


?>