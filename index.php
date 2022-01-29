<?php 

    echo "<h1 style='text-align:center'>Welcome To Page Collage </h1> <br>";
    
    if(isset($_POST['Goadmin']))
    {
        header("location: Admin/");
    }

    if(isset($_POST['Gostudents']))
    {
        header("location: students/");
    }

    if(isset($_POST['Goprofissor']))
    {
        header("location: Workers/Profissor");
    }

    if(isset($_POST['Goassistant']))
    {
        header("location: Workers/Assistant");
    }

?>
<link rel="stylesheet" href="Admin/layout/css/style.css">
<form action="" method="post">
    <button style="width:100%; height:100px; background:deepskyblue; color:white;" name="Goadmin">Admin</button><br>
    <button style="width:100%; height:100px; background:deepskyblue; color:white;" name="Gostudents">Students</button><br>
    <button style="width:100%; height:100px; background:deepskyblue; color:white;" name="Goassistant">Assistant</button><br>
    <button style="width:100%; height:100px; background:deepskyblue; color:white;" name="Goprofissor">Profissor</button><br>
</form>


