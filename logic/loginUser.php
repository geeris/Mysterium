<?php
    session_start();

    if(isset($_POST['btnLogin']))
    {
        if(isset($_POST['username']))
        {
            $usernameLog = $_POST['username'];
            $usernameLog = trim($usernameLog);
            $_SESSION['username'] = $usernameLog;

            $forUsername = "/^[a-z]+([_-]?[a-z0-9]){4,40}$/";

            if(!preg_match($forUsername, $usernameLog))
            {
                $_SESSION['errorUsername'] = "Username must have at least five characters and start with a letter. All characters must be non-capital letters";
            }
        }
        else{
            $_SESSION['errorUsername'] = "Username must have at least five characters and start with a letter. All characters must be non-capital letters.";
        }
        if(isset($_POST['password'])){
            $passwordLog = $_POST['password'];
            $passwordLog = trim($passwordLog);
            $_SESSION['password'] = $passwordLog;

            $forPassword = "/.{6,}/";

            if(!preg_match($forPassword, $passwordLog))
            {
                $_SESSION['errorPassword'] = "Password must have at least six characters";
            }

        }
        else{
            $_SESSION['errorPassword'] = "Password must have at least six characters.";
        }

        if(!isset($_SESSION['errorUsername']) && !isset($_SESSION['errorPassword']))
        {
            require_once("../connection.php");

            $query = "SELECT u.userID AS userID, u.username AS username, r.title AS role FROM user u INNER JOIN role r ON u.roleID = r.roleID WHERE username = :usernameLog AND password = :passwordLog";

            $queryPrepare = $connection -> prepare($query);

            $usernameLog = addslashes($usernameLog);
            $queryPrepare -> bindParam(":usernameLog", $usernameLog);

            $passwordLog = addslashes($passwordLog);
            $passwordLog = md5($passwordLog);

            $queryPrepare -> bindParam(":passwordLog", $passwordLog);
        
            try
            {
                $queryPrepare -> execute();

                if($queryPrepare -> rowCount() == 1)
                {

                    $queryObjUserData = $queryPrepare -> fetch();
                
                    $_SESSION["loggedUser"] = $queryObjUserData;
                    
                    if($queryObjUserData -> role  == "user")
                        //redirect('mysterium.php');
                        header("Location: ../index.php?view=mysterium");

                    if($queryObjUserData -> role == "administrator")
                        header("Location: ../index.php?view=mysterium");
                    
                }
                else{
                    $_SESSION['errorLogin'] = "The login details are incorrect.";
                    header("Location: ../index.php");
                } 
            }
            catch(PDOException $exception)
            {
                $_SESSION['errorLogin'] = "Problem has been occured.";
                header("Location: ../index.php");
            }
        }
        else{
            header("Location: ../index.php");
        }
    }
    else
    {
        session_destroy();
        header("Location:../index.php");
    }
?>