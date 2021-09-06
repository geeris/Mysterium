<?php
    header("Content-type: application/json");
    $code = 404;
    $data = null;

    if(isset($_POST['mysteryRequest']))
    {
        $mysteryID = $_POST['mystery'];

        include_once("../connection.php");
        
        $deleteMystery = "DELETE FROM mystery WHERE mysteryID = :mysteryID";
        $prepareDelete = $connection -> prepare($deleteMystery);
        $prepareDelete -> bindParam(":mysteryID", $mysteryID);
        $resultDelete = $prepareDelete -> execute();

        if($resultDelete)
        {
            $code = 201;
        }
        else{
            $code = 500;
        }
    }
    else{
        session_destroy();
        header("Location:../index.php");
    }

    echo json_encode($data);
    http_response_code($code);
?>