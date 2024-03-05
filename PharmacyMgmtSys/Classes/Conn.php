<?php

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "imgdb";

    
    $mysqli = new mysqli("localhost","root","","imgdb");

    //$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

    //check connection
    if($mysqli -> connect_errno){
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }