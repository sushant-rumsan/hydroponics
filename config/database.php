<?php
$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "temphumidnew";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

    if(!$conn){
       die("Connection failed!"); 
    }
