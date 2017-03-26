    <?php
		session_start();
        require_once('../php/connexion.php');

        if(!isset($_SESSION['user'])){   //Si utilisateur pas connecte
            header('Location: ' . $url);
        }else{ // On check les grades
            if($_SESSION['grade'] != 2){
                header('Location: ' . $url . 'utilisateur/panel.php');
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

    <?php require_once("header.php"); ?>

            <div class="container">

            <h5 style="margin-top:50px;">Historique</h5>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche par nom..">
                <table id="tableHistorique" class="striped centered">
                <thead>
                  <tr>
                      <th data-field="nom">NOM</th>
                      <th data-field="prenom">PRENOM</th>
                      <th data-field="mac">ADRESSE MAC</th>
                      <th data-field="date">DATE</th>
                      <th data-field="libelle">LIBELLE</th>
                  </tr>
                </thead>

                <tbody id="historique">
                </tbody>
                </table>
        </div>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
           <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>-->
            <script src="../js/materialize.js"></script>
            <script src="../js/historique.js"></script>
            <script src="../js/actionAdministrateur.js"></script>

        </body>
    </html>