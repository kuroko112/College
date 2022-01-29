<?php

    echo "<h1 style='text-align:center;'>"."Welcome To Page Show All Data From Assistant" . "</h1> <br>";


?>

<link rel="stylesheet" href="../layout/css/style.css">
<form action="" method="post" style="background:lightcyan">
<label >Search With Code : </label><br><input type="text" style="width:100%;" name="id_ass"><br><br>
<button style="width:100%; height:50px; background:deepskyblue; color:white;" name="ser_ass">Search Here</button><br>
<button style="width:100%; height:50px; background:deepskyblue; color:white;" name="sho_ass">Show ALL Assistant</button>  <br>
<button style="width:100%; height:50px; background:deepskyblue; color:white;" name="hid_ass">Hide</button><br>
<button style="width:100%; height:50px; background:deepskyblue; color:white;" name="Goindex">Home</button><br>
</form><br>

<?php

    include "../init.php";

    if(isset($_POST['ser_ass']))
    {
        $id_ass = "";
        $id_ass = $_POST['id_ass'];
        
        $query = "SELECT * FROM assistant WHERE id_ass =  '$id_ass'";

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
                <td><?php echo $row['id_ass'];?></td>
                <td><?php echo $row['name_ass'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['id_sec_ass'];?></td>
                <td>UPDATE</td>
            </tr>

            <?php }?>
            
        </table>
    <?php
    }

    if(isset($_POST['sho_ass']))
    {
        $query  = "SELECT * FROM assistant";
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
                    <td> <?php echo $row['id_ass'];?> </td>
                    <td> <?php echo $row['name_ass'];?> </td>
                    <td> <?php echo $row['address'];?> </td>
                    <td> <?php echo $row['email'];?> </td>
                    <td> <?php echo $row['phone'];?> </td>
                    <td> <?php echo $row['id_sec_ass'];?> </td>
                    <td>Update</td>
               </tr> 
            <?php }?>
            <tr  style="background:deepskyblue; color:white;">
                <td colspan="7">Total In This Assistant :  <?php echo $conter?></td>
            </tr>
        </table> 
    <?php
    }



    if(isset($_POST['hid_ass'])) { echo ""; }
    

?>