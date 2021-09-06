<?php
    session_start();
    $previous = getEnv("http_referer");
    
    if(isset($_POST['btnEditc']))
    {
        if(isset($_POST['editc']))
        {
            $id = $_POST['editc'];

            if(isset($_POST['categoryName']) && !empty($_POST['categoryName']))
            {   
                $categoryName = $_POST['categoryName'];
                $categoryName = trim($categoryName);

                include_once("../connection.php");
                $edit = "UPDATE category SET title = :name WHERE categoryID = :id";
                $prepareQuery = $connection -> prepare($edit);

                $categoryName = addslashes($categoryName);
                $prepareQuery -> bindParam(":name", $categoryName);
                $prepareQuery -> bindParam(":id", $id);

                try{
                    $result = $prepareQuery  -> execute();

                    if($result)
                {
                    $_SESSION['category'] = "Category name has been edited successfully";
                }
                else{
                    $_SESSION['categorye'] = "Problem has been occured";
                }
                }
                catch(PDOException $ex)
                {
                    $_SESSION['categorye'] = "Problem has been occured";
                } 
            }
            if(!empty($_FILES['fileEdit']['name']))
            {
                $name = $_FILES['fileEdit']['name'];

                $tmpFileLocation = $_FILES['fileEdit']['tmp_name'];
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
        }
        header("Location: $previous");
    }
    else{
        session_destroy();
        header("Location:../index.php");
    }
?>