<?php
    $host = "localhost";
    $dbUser = "root";
    $dpPassword = "";
    $dbName = "user-management-system";

    $connect = mysqli_connect($host, $dbUser, $dpPassword, $dbName);

    // check if connection is successfull
    if($connect){
        // echo "Connected Successfully!";
    }
?>