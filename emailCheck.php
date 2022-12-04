<?php
// Connecting to database 
require ('config/database.php');

// Access database information
$sql = "SELECT * FROM dht11 ORDER BY ID DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['PH'] < 2 || $row['PH'] > 9 || $row['Temperature'] > 45 || $row['Flowrate'] == 0){
    require('includes/email. php');
}




