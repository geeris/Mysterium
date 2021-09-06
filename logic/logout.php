<?php
    session_start();

    unset($_SESSION['loggedUser']);

    if(isset($_SESSION['loggedUser'])){
        
    }
    else{
        session_destroy();
        header("Location:../index.php");
    }
?>