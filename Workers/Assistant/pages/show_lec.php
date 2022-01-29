<?php 
    include_once('../server.php');
    $username = "";
    $id_doc = "";
    $username = $_SESSION['username'];
    $query  = "SELECT * FROM assistant WHERE email = '$username'";
    $result = mysqli_query($db, $query); 
    while($row = mysqli_fetch_array($result)  )
    {
        $username =  $row['name_ass'];
        $id_ass   =  $row['id_ass'];
    }
    echo "<br>";
    echo "<h1 style='text-align:center;'> schedules page  <br> wlcome ". $username  . " </h1> <hr>  <br><br>";
?>


    <?php 

        $query  = "SELECT *
        FROM assistant 
        
        JOIN sec ON sec.id = assistant.id_sec_ass
        
        JOIN mission ON mission.id_ass_miss = assistant.id_ass
        
        JOIN lecture ON lecture.id_lec = mission.id_lec_miss
        
        WHERE assistant.id_ass = '$id_ass'";
        $ersult_doc = mysqli_query($db, $query);


    ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <table class="table table-bordered">
        <tr style="background:deepskyblue; color:white;">
            <td>Day</td>
            <td>Name Lectuer</td>
            <td>Time Lectuer</td>
            <td>Room Lectuer</td>
            <td>Number section</td>
        </tr>

        <?php 
            while($row = mysqli_fetch_array($ersult_doc)){
        ?>  
            <tr>
                <td> <?php echo $row['day'];?> </td>
                <td> <?php echo $row['name_sec'];?> </td>
                <td> <?php echo $row['time_sec'];?> </td>
                <td> <?php echo $row['name_room'];?> </td>
                <td> <?php echo $row['id_sec_ass']?> </td>
            </tr>

        <?php }?>  

    </table>

    <link rel="stylesheet" href="../layout/css/style.css">
<form action="" method="post">
    <button  style="width:100%; height:50px; background:deepskyblue; color:white;" name="Gohome">Home</button><br>
    <button  style="width:100%; height:50px; background:deepskyblue; color:white;" name="logout_pro">Logout</button><br>
</form>



<?php

    if(isset($_POST['Gohome']))     { header("location: ../home.php"); }
    if(isset($_POST['logout_pro'])) { header("location: ../index.php"); }


?>

