<?php
    include "init.php";
    $title = "Home Page";
    echo "<h1 style='text-align:center'; >"."This IS HOME Page <br> Welcome " . $_SESSION['username'] ."</h1>" ;
    echo "<hr>";
?>
<?php include "include/footer.php";?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<form  method="post">
    <table class="table table-bordered">
    <tr>
        <td><button style="background:deepskyblue; height:50px; color:white; " name="Add_ass">Add  Assistant</button></td>
        <td><button style="background:deepskyblue; height:50px; color:white; " name="show_ass" >Show  Assistant</button></td>
        <td><button style="background:deepskyblue; height:50px; color:white; " name="Add_stu">Add a Student</button></td>

        <td><button style="background:deepskyblue; height:50px; color:white; " name="show_stu" >Show a Student</button></td>

        <td><button style="background:blue;         height:50px; color:white; " name="Add_doc">Add a Profissor</button></td> 
        <td><button style="background:blue;         height:50px; color:white; " name="show_doc">Show a Profissor</button></td>
        <td><button style="background:deepskyblue; height:50px; color:white; " name="sec_stu" >Show setion </button></td>
        <td><button style="background:deepskyblue; height:50px; color:white; " name="shw_lec" >Show Lecture </button></td>
        <td><button style="background:deepskyblue; height:50px; color:white; " name="del_ass">Delete Assistant</button></td>
        <td><button style="background:blue;        height:50px; color:white; " name="del_doc">Delete Profissor</button></td>
        <td><button style="background:deepskyblue; height:50px; color:white; " name="del_stu">Delete Student</button></td>
        <td><button style="background:deepskyblue; height:50px; color:white; " name="upd_stu">UPDATE Student</button></td>
        <td><button style="background:deepskyblue; height:50px; color:white; " name="upd_stu">UPDATE Assistant</button></td>
        <td><button style="background:blue;        height:50px; color:white; " name="upd_doc">UPDATE Profissor</button></td>
        <td><button style="background:deepskyblue; height:50px; color:white; height:50px" name="logout">LOGOUT</button></td>

    </tr>
    </table>
    
    <hr>
</form>
<?php include "include/footer.php";?>