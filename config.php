<?php
    $host = "127.0.0.1";
    $user = "root";                     
    $pass = "";                                  
    $db = "movietheatredb";
    $port = 3306;
    $con = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    header("Content-type: text/html; charset=utf-8");
    mysqli_set_charset($con, 'UTF8');
?>