<?php
    session_start();
    $previous = getEnv("http_referer");
    
    if(isset($_POST['btnEditm']))
    {
        if(isset($_POST['editm']))
        {
            $id = $_POST['editm'];

            if(isset($_POST['mysteryName']) && !empty($_POST['mysteryName']))
            {   
                $mysteryName = $_POST['mysteryName'];
                $mysteryName = trim($mysteryName);

                include_once("../connection.php");
                $edit = "UPDATE mystery SET title = :name WHERE mysteryID = :id";
                $prepareQuery = $connection -> prepare($edit);

                $mysteryName = addslashes($mysteryName);
                $prepareQuery -> bindParam(":name", $mysteryName);
                $prepareQuery -> bindParam(":id", $id);

                try{
                    $result = $prepareQuery  -> execute();

                    if($result)
                    {
                    $_SESSION['mystery'] = "Mystery name has been edited";
                    }
                    else{
                    $_SESSION['mysterye'] = "Problem has been occured";
                    }
                }
                catch(PDOException $ex)
                {
                    $_SESSION['mysterye'] = "Problem has been occured";
                } 
            }

            if($_POST['mysSelect'] != 0)
            {
                $newc = $_POST['mysSelect'];

                include_once("../connection.php");
                $edit = "UPDATE mystery SET categoryID = :name WHERE mysteryID = :id";
                $prepareQuery = $connection -> prepare($edit);

                $prepareQuery -> bindParam(":name", $newc);
                $prepareQuery -> bindParam(":id", $id);

                try{
                    $result = $prepareQuery  -> execute();

                    if($result)
                    {
                    $_SESSION['newc'] = "Category of selected mystery has been edited";
                    }
                    else{
                    $_SESSION['newce'] = "Problem has been occured";
                    }
                }
                catch(PDOException $ex)
                {
                    $_SESSION['newce'] = "Problem has been occured";
                } 
            }

            if(!empty($_FILES['file']['name']))
            {
                $name = $_FILES['file']['name'];

                $tmpFileLocation = $_FILES['file']['tmp_name'];
                $ext = explode(".", $name);
                    
                if($ext[1] != "jpeg" && $ext[1] != "jpg" && $ext[1] != "png")
                {
                    $_SESSION['filece'] = "File must be jpg, jpeg or png";
                }
                else
                {
                $folder = '../assets/images/icons/';
                $name = time() . "." . $ext[1];
                $newFileLocation = $folder . $name;

                $uploaded = move_uploaded_file($tmpFileLocation, $newFileLocation);

                    if($uploaded)
                    {
                        include_once("../connection.php");
                        $edit = "UPDATE category SET icon = :name WHERE categoryID = :id";
                        $prepareQuery = $connection -> prepare($edit);

                        $prepareQuery -> bindParam(":name", $name);
                        $prepareQuery -> bindParam(":id", $id);

                        try{
                            $result = $prepareQuery  -> execute();

                            if($result)
                            {
                                $_SESSION['filec'] = "Image has been edited";
                            }
                            else{
                                $_SESSION['filece'] = "Problem has been occured";
                            }
                        }
                        catch(PDOException $ex)
                        {
                            $_SESSION['filece'] = "Problem has been occured";
                        } 
                    }
                    else{
                        $_SESSION['filece'] = "Error uploading file";
                    }
                }
            }
            else{
                echo 1;
            }

            if(isset($_POST['textam']) && !empty($_POST['textam']))
            {
                $mysteryContent = $_POST['textam'];
                $mysteryContent = trim($mysteryContent);

                include_once("../connection.php");
                $edit = "UPDATE mystery SET content = :name WHERE mysteryID = :id";
                $prepareQuery = $connection -> prepare($edit);

                $mysteryContent = addslashes($mysteryContent);
                $prepareQuery -> bindParam(":name", $mysteryContent);
                $prepareQuery -> bindParam(":id", $id);

                try{
                    $result = $prepareQuery  -> execute();

                    if($result)
                    {
                    $_SESSION['textam'] = "Mystery has been edited";
                    }
                    else{
                    $_SESSION['textame'] = "Problem has been occured";
                    }
                }
                catch(PDOException $ex)
                {
                    $_SESSION['textame'] = "Problem has been occured";
                } 
            }
        }
        header("Location: $previous");
    }
    else{
        session_destroy();
        header("Location:../index.php");
    }
?>