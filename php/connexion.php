<?php 
        session_start();
        require_once('bd.php');
        
        if(isset($_POST['mel']) && isset($_POST['mdp'])){
            
            $req = $bd->prepare('SELECT * FROM port_etudiant WHERE mel=:mel AND mdp=:mdp');
            $req->bindParam(':mel', $_POST['mel']);
            $req->bindParam(':mdp', hash('md5', $_POST['mdp']));
            $req->execute();    

            $user = $req->fetch();
            $req->closeCursor();
            
            if($user)
            {
                // Redirection pour un utilistaur
                if(strcmp($user['valide'], 'O') == 0){
                     $_SESSION['user'] = $user;
                     $_SESSION['grade'] = 0;
                     header('Location: utilisateur/panel.php');
                }else{
                    $_SESSION['flash']['erreur'] = "Compte invalide.";
                }
               
            }else{
                // On contrôle si ce n'est pas un administrateur
                
                $req = $bd->prepare('SELECT * FROM port_professeur WHERE mel=:mel AND mdp=:mdp');
                $req->bindParam(':mel', $_POST['mel']);
                $req->bindParam(':mdp', hash('md5', $_POST['mdp']));
                $req->execute();    

                $user = $req->fetch();
                $_SESSION['user'] = $user;
                $req->closeCursor();
                
                if($user){
                    
                    if(strcmp($user['valide'], 'O') == 0){
                        $_SESSION['user'] = $user;
                        
                        if($user['niveau'] == 1){
                            $_SESSION['grade'] = 2;
                        }else{
                            $_SESSION['grade'] = 1;
                        }
                        
                        header('Location: professeur/panel.php');
                    }else{
                        $_SESSION['flash']['erreur'] = "Compte invalide.";
                    }
                    
                }else{
                    
                    // Il n'existe vraiment pas de compte
                    $_SESSION['flash']['erreur'] = "Identifiants incorrect.";
                }
            }
        }
    ?>