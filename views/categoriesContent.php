<?php
    require_once "connection.php";

if(isset($_GET['mystery']))
{
    require "mysteryPreview.php";
}

else{
    require "categoriesPreview.php";
}
?>