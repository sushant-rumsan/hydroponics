<?php

    // If logout button is not pressed 
    if(!isset($_POST['submitLogout'])){
        header("Location: ..dashboard.php");
        exit();
    }

    // If logout button was pressed 
    else{
    session_start();
    session_unset();
    session_destroy();

    header("Location: ../index.php");
    }

    ?>
