<?php 
    // Connecting to database 
    require ('../config/database.php');

    // Check if user clicked submit to access this page or not
    if(isset($_POST['submit'])){
        
        // Access entered detail 
        $name = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Access database information
        $sql = "SELECT username FROM user where `username` = '$name';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        // If no user with the username 
        if ($resultCheck === 0){
            header("Location: ../index.php?user=none");
            exit();
        }

        //If user is found
        else{
            $sql2 = "SELECT  * from `user` where `username` = '$name';";
                $userResult = mysqli_query($conn, $sql2);
                $userResult = mysqli_fetch_assoc($userResult);
                
                // Get user password
                $userPassword = $userResult['password'];
                $passwordVerify = password_verify($password, $userPassword);

                //If password is incorrect
                if($passwordVerify == false){
                header("Location: ../index.php?user=password");
                exit();
                }

                //If password is correct
                else{

                // Start session and assign session username
                session_start();
                $_SESSION['username'] = $name;

                header("Location: ../dashboard.php");
                exit();
                }                
        }
    }
    ?>