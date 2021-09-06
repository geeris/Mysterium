<?php
    function previewAndUnsetSession($sessionName){

            if(isset($_SESSION[$sessionName])) 
            {
                echo $_SESSION[$sessionName]; 
                unset($_SESSION[$sessionName]);
            }
            
        }
    function previewAndUnsetSessionArrayWithContent($sessionName){
    
            if(isset($_SESSION[$sessionName])) 
            {
                echo "<i class='fas fa-exclamation-circle mr-2'></i>" . $_SESSION[$sessionName];
                unset($_SESSION[$sessionName]);
            }
            //else return "nema";
    }
