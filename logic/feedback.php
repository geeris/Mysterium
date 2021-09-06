<?php
    session_start();
    $previous = getEnv("http_referer");

    header("Content-type: application/json");
    $code = 404;
    $data = null;

    if(isset($_POST['btnFeedback']))
    {
        if(isset($_POST['title']))
        {
            $title = $_POST['title'];
            $title = trim($title);

            $_SESSION['userTitle'] = $title;

            if(!preg_match("/.{2,100}/", $title))
            {
                // $_SESSION['title'] = "Title must start with capital.";
                $errorTitle = "Enter title";
            }
        }
        else{
            $_SESSION["title"] = "Enter title";
            $errorTitle = "Title must start with capital";

        }

        if(isset($_POST['textarea2']))
        {
            $message = $_POST['textarea2'];
            $message = trim($message);

            $_SESSION['userMessage'] = $message;

            if($message == '')
            {
                $_SESSION['message'] = "Enter your message.";
                $errorMessage = "Enter your message";
            }
        }
        else{
            $_SESSION['message'] = "Enter your message.";
            $errorMessage = "Enter your message";
        }

        if(!isset($_SESSION['title']) && !isset($_SESSION['message']) || !isset($errorTitle) && !isset($errorMessage))
        {
            require_once("../connection.php");

            $insertFeedback = "INSERT INTO feedback VALUES (null, :userID, :sentTimestamp, :title, :messageText)";
            $prepareInsertFeedback = $connection -> prepare($insertFeedback);
            
            $userID = $_SESSION['loggedUser'] -> userID;
            $prepareInsertFeedback -> bindParam(":userID", $userID);

            $sentTimestamp = time();
            $prepareInsertFeedback -> bindParam(":sentTimestamp", $sentTimestamp);

            $title = addslashes($title);
            $prepareInsertFeedback -> bindParam(":title", $title);

            $message = addslashes($message);
            $prepareInsertFeedback -> bindParam(":messageText", $message);

            try{
                $code = $prepareInsertFeedback -> execute() ? 201 : 500;
                if($prepareInsertFeedback){
                    //$_SESSION['sentMessage'] = "Your message has been sent successfully.";
                    unset($_SESSION['userTitle']);
                    unset($_SESSION['userMessage']);
                    header("Location: $previous");
                 }
            }
            catch(pdoexception $ex)
            {
                $code = 409;
                $_SESSION['sentMessage'] = "Problem has been occured.";
                header("Location: $previous");
            }
        }
        else{
            $code = 422;
        }
    }
    else{
        session_destroy();
        header("Location:../index.php");
    }
        echo json_encode($data);
        http_response_code($code);
?>