<?php

    echo "<h1 style='text-align:center;'>"."Welcome To Page Show All Data From Students" . "</h1> <br>";


?>

<link rel="stylesheet" href="../layout/css/style.css">
<form action="" method="post" style="background:lightcyan">
<label >Search With Code : </label><br><input type="text" style="width:100%;" name="id_stu"><br><br>
<button style="width:100%; height:50px; background:deepskyblue; color:white;" name="ser_stu">Search Here</button><br>
<button style="width:100%; height:50px; background:deepskyblue; color:white;" name="sho_stu">Show ALL Student</button>  <br>
<button style="width:100%; height:50px; background:deepskyblue; color:white;" name="hid_stu">Hide</button><br>
<button style="width:100%; height:50px; background:deepskyblue; color:white;" name="Goindex">Home</button><br>
</form><br>

<?php

    include "../init.php";

    if(isset($_POST['ser_stu']))
    {
        $id_stu = "";
        $id_stu = $_POST['id_stu'];
        
        $query = "SELECT * FROM students WHERE id_stu =  '$id_stu'";

        $result = mysqli_query($db, $query);
        
        
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <table class="table table-bordered">
            <tr style="background:deepskyblue; color:white;">
                <td>Code</td>
                <td>Name</td>
                <td>Address</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Section</td>
                <td>UPDATE</td>
            </tr>

            <?php
                while($row = mysqli_fetch_array($result)){
                    
            ?>
            <tr>
                <td><?php echo $row['id_stu'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['id_sec'];?></td>
                <td>UPDATE</td>
            </tr>

            <?php }?>
            
        </table>
    <?php
    }

    if(isset($_POST['sho_stu']))
    {
        $query  = "SELECT * FROM students";
        $result = mysqli_query($db, $query);
        $conter = 0;
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <table class="table table-bordered">
            <tr style="background:deepskyblue; color:white;">
                <td>Code</td>
                <td>Name</td>
                <td>Address</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Section</td>
                <td>Update</td>
            </tr>
            <?php 
                while($row = mysqli_fetch_array($result)){
                    $conter ++;
            ?>
               <tr>
                    <td> <?php echo $row['id_stu'];?> </td>
                    <td> <?php echo $row['name'];?> </td>
                    <td> <?php echo $row['address'];?> </td>
                    <td> <?php echo $row['email'];?> </td>
                    <td> <?php echo $row['phone'];?> </td>
                    <td> <?php echo $row['id_sec'];?> </td>
                    <td>Update</td>
               </tr> 
            <?php }?>
            <tr  style="background:deepskyblue; color:white;">
                <td colspan="7">Total In This Students :  <?php echo $conter?></td>
            </tr>
        </table> 
    <?php
    }



    if(isset($_POST['hid_stu'])) { echo ""; }
    

?>