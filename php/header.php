<?php
    
    if(isset($_SESSION['user'])){   //Si utilisateur toujours connecte
        if(strcmp("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", $url) == 0){
            switch ($_SESSION['grade']) {
                case 0:
                    header('Location: ' . $url . 'utilisateur/panel.php');
                    break;
                case 1:
                    header('Location: ' . $url . 'professeur/panel.php');
                    break;
                case 2:
                    header('Location: ' . $url . 'professeur/panel.php');
                    break;
            }
        }
    }else{ // Utilisateur pas connecte
         if(strcmp("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", $url) != 0){
             header('Location: ' . $url);
         }
    }
        

?>