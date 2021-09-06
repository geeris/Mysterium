<?php
    session_start(); 
    
    if(isset($_POST['btnRegister']))
    {
        if(isset($_POST['password']))
        {
            $passwordReg = $_POST['password'];
            $passwordReg = trim($passwordReg);
            $_SESSION['password'] = $passwordReg;

            $forPassword = "/.{6,}/";

            if(!preg_match($forPassword, $passwordReg))
            {
                $_SESSION['errorReg'] = "Password must have at least six characters";
            }

            else{
                $confirmPassword = $_POST['confirm'];
                $confirmPassword = trim($confirmPassword);
                $_SESSION['confirm'] = $confirmPassword;

                if($passwordReg != $confirmPassword)
                {
                    $_SESSION['errorReg'] = "Passwords are not matched.";
                }
            }
        }
        else{
            $_SESSION['errorReg'] = "Password must have at least six characters";
        }

        if(isset($_POST['email']))
        {
            $emailReg = $_POST['email'];
            $emailReg = trim($emailReg);
            $_SESSION['email'] = $emailReg;

            $forEmail = "/^[a-z]+[a-z0-9\?\+\_\.\-]*@[a-z]{2,10}(\.[a-z]{2,4})+$/";

            if(!preg_match($forEmail, $emailReg))
            {
                $_SESSION['errorReg'] = "Enter valid e-mail address";
            }
        }
        else{
            $_SESSION['errorReg'] = "Enter valid e-mail address";
        }

        if(isset($_POST['username']))
        {
            $usernameReg = $_POST['username'];
            $usernameReg = trim($usernameReg);
            $_SESSION['username'] = $usernameReg;

            $forUsername = "/[a-z]+([_-]?[a-z0-9]){4,40}$/";

            if(!preg_match($forUsername, $usernameReg))
            {
                $_SESSION['errorReg'] = "Username must have at least five characters and start with a letter. All characters must be non-capital letters";
            }

        }
        else{
            $_SESSION['errorReg'] = "Username must have at least five characters and start with a letter. All characters must be non-capital letters";
        }

        if(!isset($_SESSION['errorReg']))
        {  
            require_once "../connection.php";

            $query = "INSERT INTO user
                      VALUES (null, :usernameReg, :passwordReg, :registerDate, :email, :roleID)";

            $prepareQuery = $connection -> prepare($query);

            $usernameReg = addslashes($usernameReg);
            $prepareQuery -> bindParam(":usernameReg", $usernameReg);
            
            $emailReg = addslashes($emailReg);
            $prepareQuery -> bindParam(":email", $emailReg);

            $passwordReg = addslashes($passwordReg);
            $passwordReg = md5($passwordReg);
            $prepareQuery -> bindParam(":passwordReg", $passwordReg);

            $registerDate = time();
            //var_dump($registerDate);
            $prepareQuery -> bindParam(":registerDate", $registerDate);

            define("USER_ROLE", 1);
            $roleID = USER_ROLE;
            $prepareQuery -> bindParam(":roleID", $roleID);

            try{
                $prepareQuery->execute();
                if($prepareQuery)
                {   
                    $_SESSION['successRegister'] = "Your account is made successfully";
                    unset($_SESSION['username']);
                    unset($_SESSION['email']);
                    unset($_SESSION['confirm']);
                    unset($_SESSION['password']);
                    header("Location: ../index.php?view=register");
                }
                }
                catch(PDOException $e){

                $query = "SELECT * FROM user WHERE username = :username";
                
                $prepareQuery = $connection -> prepare($query);
                $prepareQuery -> bindParam(":username", $usernameReg);
                
                $prepareQuery  -> execute();
                //var_dump($prepareQuery);
                if($prepareQuery -> rowCount() == 1)
                {
                    $_SESSION['errorReg'] = "This username already exists";
                    header("Location: ../index.php?view=register");
                }
                
                $query = "SELECT * FROM user WHERE email = :email";
                $prepareQuery = $connection -> prepare($query);
                $prepareQuery -> bindParam(":email", $emailReg);

                $prepareQuery -> execute();

                if($prepareQuery -> rowCount() == 1)
                {
                    $_SESSION['errorReg'] = "This e-mail already exists";
                    header("Location: ../index.php?view=register");
                }
                    $_SESSION['errorReg'] = "Problem has been occured";
                    header("Location: ../index.php?view=register");
            } 
        }
        else
        {
            header("Location: ../index.php?view=register");
        }
    }
    else{
        session_destroy();
        header("Location:../index.php");
    }
?>