<?php 
    // Connecting to database 
    require ('../config/database.php');

    // Check if user clicked submit to access this page or not
    if(isset($_POST['submit'])){
    
    // Access entered detail 
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Calculating hash
    $password2 = password_hash($password, PASSWORD_DEFAULT);

    // Check if fields are empty 
    if(empty($name) || empty($email) || empty($password) || empty($phone) || empty($address)){
        header("Location: ../adminDashboard.php?error=emptyfields");
        exit();
    }

    // Check if database contains entered username 
    else{

    // Access database information
    $sql2 = "SELECT username FROM user where `username` = '$name';";
    $result = mysqli_query($conn, $sql2);
    $resultCheck = mysqli_num_rows($result);
    
        if($resultCheck > 0){
        header("Location: ../adminDashboard.php?user=already");
        exit();
        }
        else {
            // Insert into database 
            $sql = "INSERT INTO user (username, `email`, phone, `address`, `password`)
            VALUES ('$name', '$email', '$phone', '$address', '$password2');";
            mysqli_query($conn, $sql);

            header("Location: ../adminDashboard.php");
            exit();
        }

    }

    
    }
?>