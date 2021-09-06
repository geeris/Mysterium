<?php
    session_start();
    require_once "functions.php";
    require_once "views/head.php";

    if(isset($_GET['view']))
    {
        if($_GET['view'] == 'mysterium')
        {   
            if($_SESSION['loggedUser'] -> role  == 'administrator')
            {
                if(isset($_GET['content']))
                {
                    if($_GET['content'] == 'add')
                    {
                        if($_SESSION['loggedUser'] -> role == 'administrator')
                        {
                            include_once("views/menuUser.php");
                            include_once("views/adminAdd.php");
                            include_once("views/footer.php");
                        }
                        else
                        {
                            header("Location: index.php");
                        }
                    }
                    else if($_GET['content'] == 'edit')
                    {
                        if($_SESSION['loggedUser'] -> role == 'administrator')
                        {
                            include_once("views/menuUser.php");
                            include_once("views/adminEdit.php");
                            include_once("views/footer.php");
                        }
                        else
                        {
                            header("Location: index.php");
                        }
                    }
                    else
                    {
                        if($_SESSION['loggedUser'] -> role == 'administrator')
                        {
                            include_once("views/menuUser.php");
                            include_once("views/adminDelete.php");
                            include_once("views/footer.php");
                        }
                        else
                        {
                            header("Location: index.php");
                        }
                    }
                }
                else{
                    include_once("views/menuUser.php");
                    include_once("views/adminData.php");
                    include_once("views/footer.php");
                }
            }
            else if($_SESSION['loggedUser'] -> role  == 'user')
            {
                if(isset($_GET['content']))
                {
                    if($_GET['content'] == 'category' || isset($_GET['page']))
                    {
                        if($_SESSION['loggedUser'] -> role == 'user')
                        {
                            include_once("views/menuUser.php");
                            include_once("views/categoriesContent.php");
                            include_once("views/footer.php");
                        }
                        else
                        {
                            header("Location: index.php");
                        }
                    }
                    if(isset($_GET['mystery']))
                    {
                        if($_SESSION['loggedUser'] -> role == 'user')
                        {
                            include_once("views/menuUser.php");
                            include_once("views/mysteryPreview.php");
                            include_once("views/footer.php");
                        }
                        else
                        {
                            header("Location: index.php");
                        }
                    }
                }
                else{
                    include_once("views/menuUser.php");
                    include_once("views/mysteriumContent.php");
                    include_once("views/footer.php");
                }
            }
            else {
                header("Location: index.php");
            }
        }
        if($_GET['view'] == 'register')
        { 
            require_once "views/menuLogReg.php";
            require_once "views/formRegister.php";
            require_once "views/content.php";
            require_once "views/footer.php";
        }
    }
    else
    {
        if(!isset($_SESSION['loggedUser']))
        {
        require_once "views/menuLogReg.php";
        require_once "views/formLogin.php";
        require_once "views/content.php";
        require_once "views/footer.php";
        }
        else        
        {
            header("Location: index.php?view=mysterium");
        }
    }

?>