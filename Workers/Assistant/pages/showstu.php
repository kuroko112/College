<?php 
    include_once('../server.php');
    echo "<br><h1 style='text-align:center'> Show All The student under your care <hr> </h1> <br>";
?>


<link rel="stylesheet" href="../layout/css/style.css">
<form  method="post">


<label >Search for the academic year</label><br><br><input type="text" name="yearac"  style="width:100%;height:30px;"><br><br>
<label >Search id student </label><br><input type="text" name="id_stu" style="width:80%;height:30px;"><button name="ser_id_stu" style="width:20%; height:25px; color:blue; background:yellow;">GO</button><br><br>
    <button style="width:100%; height:70px; color:white; background:deepskyblue;" name="ser_stu">Show All students</button><br>
    <button style="width:100%; height:70px; color:white; background:deepskyblue;" name="Goindex">Home</button><br>
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

    if(isset($_POST['ser_stu']))
    {
        $yearac = "";
        $yearac = $_POST['yearac'];
        $query = "SELECT *
        FROM students 
        JOIN assistant ON assistant.id_sec_ass = students.id_sec
        WHERE students.yearac = '$yearac' AND assistant.id_ass = '$id_ass_sec'
        ORDER BY name ";
        $result = mysqli_query($db, $query);
        ?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <table class="table table-bordered">
            <tr style="background:deepskyblue; color:white;">
                <td>Code</td>
                <td>Name</td>
                <td>Year Academy</td>
                <td>Day's</td>
            </tr>

            <?php 
                while($row = mysqli_fetch_array($result)){
            
                    $id_stu  = $row['id_stu'];
                    $total = 0;
                    
                    $query_day = "SELECT * FROM hodor_ass  
                    JOIN students  ON students.id_stu = hodor_ass.id_hodor_stu_ass
                    JOIN assistant ON assistant.id_sec_ass = students.id_sec 
                    WHERE id_hodor_stu_ass = '$id_stu' AND  assistant.id_ass = $id_ass_sec";
                    $reuslt_day = mysqli_query($db,$query_day);
                    
                    while($row_day = mysqli_fetch_array($reuslt_day))
                    {
                        if($row_day['yes_no_ass'] == 'y')
                        {
                            $total ++;
                        }
                    }
                    ?>

                    <tr>
                        <td> <?php echo $row['id_stu'];?> </td>
                        <td> <?php echo $row['name'];?> </td>
                        <td> <?php echo $row['yearac'];?> </td>
                        <td> <?php echo $total; ?> </td>  
                    </tr>

                    <?php
                }
            ?>
        </table>
    <?php
    }

    ?>
<!---- --------------------------------------->    

<?php 
    
if(isset($_POST['ser_id_stu']))
{
    $id_stu = "";
    $id_stu = $_POST['id_stu'];
    $query = "SELECT *
    FROM students
    JOIN assistant ON assistant.id_sec_ass = students.id_sec 
    WHERE students.id_stu = '$id_stu' AND assistant.id_ass = '$id_ass_sec'
    ORDER BY name ";
    $result = mysqli_query($db, $query);
    ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <table class="table table-bordered">
        <tr style="background:deepskyblue; color:white;">
            <td>Code</td>
            <td>Name</td>
            <td>Year Academy</td>
            <td>Day's</td>
        </tr>

        <?php 
            while($row = mysqli_fetch_array($result)){
        
                $id_stu  = $row['id_stu'];
                $total = 0;
                
                $query_day = "SELECT * FROM hodor_ass  
                JOIN students  ON students.id_stu = hodor_ass.id_hodor_stu_ass
                JOIN assistant ON assistant.id_sec_ass = students.id_sec 
                WHERE id_hodor_stu_ass = '$id_stu' AND  assistant.id_ass = $id_ass_sec";
                $reuslt_day = mysqli_query($db,$query_day);
                
                while($row_day = mysqli_fetch_array($reuslt_day))
                {
                    if($row_day['yes_no_ass'] == 'y')
                    {
                        $total ++;
                    }
                }
                ?>

                <tr>
                    <td> <?php echo $row['id_stu'];?> </td>
                    <td> <?php echo $row['name'];?> </td>
                    <td> <?php echo $row['yearac'];?> </td>
                    <td> <?php echo $total; ?> </td>
                    
                </tr>

                <?php
            }
        ?>
    </table>
<?php
}

?>
        
        




    
    