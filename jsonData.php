<?php
    // Connecting to database 
    require ('config/database.php');

    $sql = "SELECT * from dht11 ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($data);