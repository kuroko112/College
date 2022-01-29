<?php


    $host = "localhost";
    $user = "root";
    $pass = "789456123258";
    $dbname = "mis";

    $db = mysqli_connect($host, $user, $pass, $dbname);

    if(!$db)
    {
        die('Could not Connect My Sql:' .mysql_error());
    }