<?php
    header("Content-type: application/json");
    $code = 404;
    $data = null;

    if(isset($_POST['categoryRequest']))
    {
        $categoryID = $_POST['category'];

        include_once("../connection.php");
        
        $deleteCategory = "DELETE FROM category WHERE categoryID = :categoryID";
        $prepareDelete = $connection -> prepare($deleteCategory);
        $prepareDelete -> bindParam(":categoryID", $categoryID);
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