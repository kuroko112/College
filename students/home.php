<?php
    include "server.php";
    $name = $_SESSION['username'];
    $query = "SELECT * FROM students WHERE email = '$name'";
    $result = mysqli_query($db, $query);
    $name_students = "";
    while($row = mysqli_fetch_assoc($result))
    {
        $name_students = $row['name'];
    }
    $_SESSION['namestu'] = $name_students;
    echo "<h1 style='text-align:center'; >"."This IS HOME Page <br> Welcome $name_students  </h1>";
    echo "<hr> ";
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<form  method="post">
    <table class="table table-bordered">
    <tr>
        <td><button style="background:deepskyblue; height:50px; color:white;width:100% " name="show_stu" >Show a Student</button></td>
        <td><button style="background:deepskyblue; height:50px; color:white;width:100% " name="sec_stu" >Show setion </button></td>
        <td><button style="background:deepskyblue; height:50px; color:white;width:100% " name="shw_lec" >Show Lecture </button></td>
        <td><button style="background:deepskyblue; height:50px; color:white;width:100%; " name="logout">LOGOUT</button></td>
    </tr>
    </table>
    <hr>
</form>
<?php include "include/footer.php";?>