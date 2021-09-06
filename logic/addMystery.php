<?php
    session_start();
    $previous = getEnv("http_referer");
    
    if(isset($_POST['btnAddMystery']))
    {
        if(isset($_POST['mysteryName']) && !empty($_POST['mysteryName']))
        {   
            $mysteryName = $_POST['mysteryName'];
            $mysteryName = trim($mysteryName);
            $_SESSION['mysNa'] = $mysteryName;

            include_once("../connection.php");
            $checkName = "SELECT * FROM mystery WHERE title = :mys";
            $prepareQuery = $connection -> prepare($checkName);

            $mysteryName = addslashes($mysteryName);
            $prepareQuery -> bindParam(":mys", $mysteryName);
            
            $prepareQuery  -> execute();

            if($prepareQuery -> rowCount() == 1)
            {
                $_SESSION['mystery'] = "This mystery already exists";
            }
            else{}
        }
        else{
            $_SESSION['mystery'] = "Enter mystery name";
        }

        $category = $_POST['selectCategory'];

        if($category == 0)
        {
            $_SESSION['cat'] = "Choose category";
        }
        else{
            $_SESSION['chCat'] = $category;
        }

        if(isset($_POST['textarea']) && !empty($_POST['textarea']))
        {
            $mystery = $_POST['textarea'];
            $mystery = trim($mystery);
        }
        else{
            $_SESSION['texta'] = "Enter mystery";
        }

        if(!empty($_FILES['fileMys']['name']))
        {
            $name = $_FILES['fileMys']['name'];

            $tmpFileLocation = $_FILES['fileMys']['tmp_name'];
            $ext = explode(".", $name);
                
            if($ext[1] != "jpeg" && $ext[1] != "jpg")
            {
                $_SESSION['fileMys'] = "File must be jpg or jpeg";
                header("Location:$previous");
            }
            else
            {
            $folder = '../assets/images/lockedDoors/';
            
            $name = time() . "." . $ext[1];
            $newFileLocation = $folder . $name;

            $uploaded = move_uploaded_file($tmpFileLocation, $newFileLocation);
            }
        }
        else
        {
            $_SESSION['fileMys'] = "Insert image";
        }
        
        if(!isset($_SESSION['fileMys']) && !isset($_SESSION['messageMystery']) && !isset($_SESSION['category']) && !isset($_SESSION['cat']))
        {
            if($uploaded)
            {
                include_once("../connection.php");
                
                $add = "INSERT INTO mystery VALUES (NULL, :mysteryName, :content, :categoryFile, :addTime, :category)";

                $mysteryName = addslashes($mysteryName);
                $prepareAdd = $connection -> prepare($add);
                $prepareAdd -> bindParam(":mysteryName", $mysteryName);

                $mystery = addslashes($mystery);
                $prepareAdd -> bindParam(":content", $mystery);

                $prepareAdd -> bindParam(":categoryFile", $name);

                $time = time();
                $prepareAdd -> bindParam(":addTime", $time);

                $prepareAdd -> bindParam(":category", $category);

                $resultAdd = $prepareAdd -> execute();

                if($resultAdd)
                {
                    $_SESSION['successMys'] = "New mystery is added successfully";
                    unset($_SESSION['chCat']);
                    unset($_SESSION['mysNa']);
                    unset($_SESSION['texta']);

                    header("Location:$previous");
                }
                else
                {
                    $_SESSION['messageMystery'] = "Error inserting mystery";
                    header("Location:$previous");
                }
            }
            else{
                $_SESSION['fileMys'] = "Error inserting image";
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