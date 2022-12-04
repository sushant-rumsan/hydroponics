<?php 
    // Connecting to database 
    require ('config/database.php');
    session_start();
    ini_set('max_execution_time', 120);
    while(1){
        $flowrate = rand(0,10);
        $ph = rand(6.7,6.9);
        $ph2 = $ph/10;
        $temperature = rand(25,26);

        $sql = "INSERT INTO dht11 (Flowrate, Ph, Temperature)
        VALUES ('$flowrate', '$ph2', '$temperature');";
        mysqli_query($conn, $sql);

        sleep(5);
    }