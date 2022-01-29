<?php 
    
    echo "<h1 style='text-align:center'; >" ."Welcome In Section Page  </h1> <br>" ;
    echo "<hr>";
?>
<link rel="stylesheet" href="../layout/css/style.css">
<form action="" method="post">
    
    <label >Search Section :</label><br><input type="text" style="width:100%;" name="id_sec"><br><br>
    <button style="width:100%; height:30px; background:deepskyblue; color:white;" name="show_sec_stu">GO</button><br>
    <button style="width:100%; height:30px; background:deepskyblue; color:white;" name="hide_stu">Hide</button><br>
    <button style="width:100%; height:30px; background:deepskyblue; color:white;" name="add_page_ass">Add Assistant</button><br>
    <button style="width:100%; height:30px; background:deepskyblue; color:white;" name="add_page_stu">Add student</button><br>
    <button style="width:100%; height:30px; background:deepskyblue; color:white;" name="Goindex">Home</button><br>
</form>

<?php
    include "../init.php";
    if(isset($_POST['show_sec_stu']))
    {   $id_sec = "";
        $id_sec = $_POST['id_sec'];
        if(empty($id_sec)) { exit(); }
        $query  = "SELECT * FROM students JOIN sec ON sec.id = students.id_sec JOIN  assistant ON sec.id = assistant.id_ass WHERE sec.id = $id_sec";
        $result = mysqli_query($db, $query);
        $conter = 0;
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
                    $conter ++;
            
            ?>
            <tr>
                <td><?php echo $row['id_stu']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['name_ass']; ?></td>
                <td><?php echo $row['name_room']; ?></td>
                <td><?php echo $row['id_sec']; ?></td>
            </tr>

            <?php }?>
            <tr  style="background:deepskyblue; color:white;">
                <td colspan="6">Total In This Section :  <?php echo $conter?></td>
            </tr>
        
        </table>


    <?php
    }

?>