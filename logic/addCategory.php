<?php
    session_start();
    $previous = getEnv("http_referer");
    
    if(isset($_POST['btnAddCategory']))
    {
        if(isset($_POST['categoryName']) && !empty($_POST['categoryName']))
        {   
            $categoryName = $_POST['categoryName'];
            $categoryName = trim($categoryName);
            $_SESSION['catNa'] = $categoryName;

            include_once("../connection.php");
            $checkName = "SELECT * FROM category WHERE title = :cat";
            $prepareQuery = $connection -> prepare($checkName);

            $categoryName = addslashes($categoryName);
            $prepareQuery -> bindParam(":cat", $categoryName);
            
            $prepareQuery  -> execute();

            if($prepareQuery -> rowCount() == 1)
            {
                $_SESSION['category'] = "This category name already exists";
            }
            else{}
        }
        else{
            $_SESSION['category'] = "Enter category name";
        }

        if(!empty($_FILES['file']['name']))
        {
            $name = $_FILES['file']['name'];

            $tmpFileLocation = $_FILES['file']['tmp_name'];
            // $size = $_FILES['categoryFile']['size'];
            $ext = explode(".", $name);
                
            if($ext[1] != "jpeg" && $ext[1] != "jpg" && $ext[1] != "png")
            {
                $_SESSION['file'] = "File must be jpg, jpeg or png";
                header("Location:$previous");
            }
            else
            {
            $folder = '../assets/images/icons/';
            $name = time() . "." . $ext[1];
            $newFileLocation = $folder . $name;

            $uploaded = move_uploaded_file($tmpFileLocation, $newFileLocation);
            }
        }
        else
        {
            $_SESSION['file'] = "Insert image";
        }
        
        if(!isset($_SESSION['file']) && !isset($_SESSION['message']) && !isset($_SESSION['category']))
        {
            if($uploaded)
            {
                include_once("../connection.php");
                
                $addCategory = "INSERT INTO category VALUES (NULL, :categoryName, :categoryFile)";

                $categoryName = addslashes($categoryName);
                $prepareAdd = $connection -> prepare($addCategory);
                $prepareAdd -> bindParam(":categoryName", $categoryName);

                $name = time() . $ext[1];

                $prepareAdd -> bindParam(":categoryFile", $name);
                $resultAdd = $prepareAdd -> execute();

                if($resultAdd)
                {
                    $_SESSION['success'] = "New category is added successfully";
                    header("Location:$previous");
                }
                else
                {
                    $_SESSION['message'] = "Error inserting category";
                    header("Location:$previous");
                }
            }
            else{
                $_SESSION['file'] = "Error inserting image";
                header("Location:$previous");
            }
        }
        else{
            header("Location:$previous");
        }
    }
    else{
        session_destroy();
        header("Location:../index.php");
    }
?>