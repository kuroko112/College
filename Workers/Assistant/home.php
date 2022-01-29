<?php 
    include_once('server.php');
    $username = "";
    $username = $_SESSION['username'];
    $query  = "SELECT name_ass FROM assistant WHERE email = '$username'";
    $result = mysqli_query($db, $query); 
    while($row = mysqli_fetch_array($result)  )
    {
        $username =  $row['name_ass'];
    }
    
    echo "<h1 style='text-align:center;'> home page Assistant <br> wlcome ". $username  . " </h1> <br><br><br><br>";
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<form  method="post">
    <table class="table table-bordered">
    <tr>
        <td><button style="background:deepskyblue; height:50px; color:white;width:100% "  name="show_stu" >Show a Students</button></td>
        <td><button style="background:deepskyblue; height:50px; color:white;width:100% "  name="add_pres" >Record Presence Students</button></td>
            
        <td><button style="background:deepskyblue; height:50px; color:white;width:100% "  name="shw_lec" >Show Lecture Table</button></td>
        <td><button style="background:deepskyblue; height:50px; color:white;width:100%; " name="logout">LOGOUT</button></td>
    
    </tr>
    </table>
    <hr>
</form>
<?php @include "include/footer.php";?>

