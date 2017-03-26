<?php 
    session_start();
    require_once('../php/connexion.php'); 

    if(!isset($_SESSION['user'])){   //Si utilisateur pas connecte
        header('Location: ' . $url);
    }else{ // On check les grades
        if($_SESSION['grade'] == 2){
            header('Location: ' . $url . 'administrateur/panel.php');
        }
    }

?>

<!DOCTYPE html>

<html>

<head>
  <title>Panel</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="../css/materialize.css">
  <link rel="stylesheet" href="../css/panel.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
   
        <nav>
            <div class="nav-wrapper">
              <a href="#" class="brand-logo"><img src="../images/ico.png" height="64px"></a>
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li class="active"><a href="">Périphériques</a></li>
                <li><a href="../php/deconnexion.php"><i class="material-icons">power_settings_new</i></a></li>
              </ul>
              <ul class="side-nav" id="mobile-demo">
                <li><a href="">Périphériques</a></li>
                <li><a href="../php/deconnexion.php">Se déconnecter</a></li>
              </ul>
            </div>
          </nav>
    
        <div class="container">
            <table class="striped centered">
            <thead>
              <tr>
                  <th data-field="libelle">LIBELLE</th>
                  <th data-field="mac">ADRESSE MAC</th>
                  <th data-field="date_ajout">AJOUTE LE</th>
                  <th data-field="etat">ETAT</th>
                  <th data-field="supprimer">ACTION</th>
              </tr>
            </thead>

            <tbody>
              
            </tbody>
          </table>
            
                    
         <div class="row"  style="margin-top:150px">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input id="libelle" type="text" class="validate" placeholder="IPHONE 6S" name="libelle" maxlength="128">
                  <label for="libelle">Libelle</label>
                </div>
                <div class="input-field col s6">
                  <input id="mac" type="text" class="validate" placeholder="00:00:00:00:00:00" name="mac" pattern="^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$" maxlength="17">
                  <label for="mac" data-error="Invalide" data-success="Valide">Adresse mac</label>
                </div>
              </div>


            </form>
          </div>
            
          <div class="right-align">
            <a id="bt_ajout" class="waves-effect waves-light btn-large"><i class="material-icons right">add</i>AJOUTER</a>       
          </div> 
           
    </div>
        
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script src="../js/action.js"></script>

    </body>
</html>