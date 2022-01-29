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
    
    if(isset($_POST['ser_stu']))
    {
        $yearac = "";
        $yearac = $_POST['yearac'];
        $query = "SELECT *
        FROM students 
        JOIN degrees ON degrees.id_stu_degree = students.id_stu
        WHERE students.yearac = '$yearac'
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
                <td>Degree</td>
            </tr>

            <?php 
                while($row = mysqli_fetch_array($result)){
            
                    $id_stu  = $row['id_stu'];
                    $total = 0;
                    
                    $query_day = "SELECT * FROM hodor  
                    JOIN students ON students.id_stu = hodor.id_stu_hodor 
                    WHERE id_stu_hodor = '$id_stu' AND  yearac = '$yearac'";
                    $reuslt_day = mysqli_query($db,$query_day);
                    
                    while($row_day = mysqli_fetch_array($reuslt_day))
                    {
                        if($row_day['yes_no'] == 'y')
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
                        <td> <?php echo $row['number_degrees'] ?> </td>
                        
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
    JOIN degrees ON degrees.id_stu_degree = students.id_stu
    WHERE students.id_stu = '$id_stu'
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
            <td>Degree</td>
        </tr>

        <?php 
            while($row = mysqli_fetch_array($result)){
        
                $id_stu  = $row['id_stu'];
                $total = 0;
                
                $query_day = "SELECT * FROM hodor  
                JOIN students ON students.id_stu = hodor.id_stu_hodor 
                WHERE id_stu_hodor = '$id_stu'";
                $reuslt_day = mysqli_query($db,$query_day);
                
                while($row_day = mysqli_fetch_array($reuslt_day))
                {
                    if($row_day['yes_no'] == 'y')
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
                    <td> <?php echo $row['number_degrees'] ?> </td>
                    
                </tr>

                <?php
            }
        ?>
    </table>
<?php
}

?>
        
        




    
    