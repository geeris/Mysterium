<?php
    session_start();

    header("Content-type: application/json");
    $code = 404;
    $data = null;

    if(isset($_POST['interestingRequest']))
    {
        if(isset($_POST['mystery']))
        {
            $mysteryID = $_POST['mystery'];
        }
        if(isset($_POST['interesting']))
        {
            $interesting = $_POST['interesting'];
        }

        $activeUserID = $_SESSION['loggedUser'] -> userID;

        require_once("../connection.php");

        $alreadyExists = "SELECT * FROM usermystery WHERE userID = $activeUserID AND mysteryID = $mysteryID";
        $isPositive = $connection -> query($alreadyExists) -> rowCount();

        if(!$isPositive)
        {
            //require_once("connection.php");

            $addInteresting = "INSERT INTO usermystery VALUES (null, :userID, :mysteryID, :isChoosen, :interesting)";
            $prepareAddInteresting = $connection -> prepare($addInteresting);

            $prepareAddInteresting -> bindParam(":userID", $activeUserID);
            $prepareAddInteresting -> bindParam(":mysteryID", $mysteryID);

            define("IS_CHOOSEN", 1);
            $isChoosen = IS_CHOOSEN;
            $prepareAddInteresting -> bindParam(":isChoosen", $isChoosen);
            $prepareAddInteresting -> bindParam(":interesting", $interesting);

            $result = $prepareAddInteresting -> execute();
            if($result)
                { 
                    $getChangedNumber = "SELECT COUNT(*) as intBor FROM usermystery WHERE mysteryID = $mysteryID AND interesting = $interesting";
                    $getNumber = $connection -> query($getChangedNumber) -> fetch();

                    $data = $getNumber -> intBor;
                    $code = 200;
                }
            else
                $code = 500;
        }
        else{
            $connection -> close();
        }
    }
    else{
        session_destroy();
        header("Location:../index.php");
    }

    echo json_encode($data);
    http_response_code($code);
?>