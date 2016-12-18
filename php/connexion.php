<?php 
        session_start();
        require_once('bd.php');
        
        if(isset($_POST['mel']) && isset($_POST['mdp'])){
            
            $req = $bd->prepare('SELECT * FROM port_etudiant WHERE mel=:mel AND mdp=:mdp');
            $req->bindParam(':mel', $_POST['mel']);
            $req->bindParam(':mdp', $_POST['mdp']);
            $req->execute();    

            $user = $req->fetch();
            
            if($user)
            {
                // Redirection pour un utilistaur
                $_SESSION['user'] = $user;
                header('Location: utilisateur/panel.php');
            }else{
                // On contrôle si ce n'est pas un administrateur
                
                $req = $bd->prepare('SELECT * FROM port_professeur WHERE mel=:mel AND mdp=:mdp');
                $req->bindParam(':mel', $_POST['mel']);
                $req->bindParam(':mdp', $_POST['mdp']);
                $req->execute();    

                $user = $req->fetch();
                $_SESSION['user'] = $user;
                
                if($user){
                    $_SESSION['user'] = $user;
                    header('Location: administrateur/panel.php');
                }else{
                    
                    // Il n'existe vraiment pas de compte
                    $_SESSION['flash']['erreur'] = "Identifiants incorrect.";
                }
            }
        }
    ?>