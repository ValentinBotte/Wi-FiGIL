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

            <nav>
                <div class="nav-wrapper">
                  <a href="panel.php" class="brand-logo"><img src="../images/ico.png" height="64px"></a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> 
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="panel.php">Utilisateurs</a></li>
                    <li class="active"><a href="">Périphériques</a></li>
                    <li><a href="../php/dump.php">Sauvegarde</a></li>
                    <li><a href="../php/deconnexion.php"><i class="material-icons">power_settings_new</i></a></li>
                  </ul>
                  <ul class="side-nav" id="mobile-demo">
                    <li><a href="panel.php">Utilisateurs</a></li>
                    <li class="active"><a href="">Périphériques</a></li>
                    <li><a href="../php/dump.php">Sauvegarde</a></li>
                    <li><a href="../php/deconnexion.php">Se déconnecter</a></li>
                  </ul>
                </div>
              </nav>

            <div class="container">

            <h5 style="margin-top:50px;">Peripheriques en attente</h5>
                <table class="striped centered">
                <thead>
                  <tr>
                      <th data-field="nom">NOM</th>
                      <th data-field="prenom">PRENOM</th>
                      <th data-field="libelle">LIBELLE</th>
                      <th data-field="mac">MAC</th>
                      <th data-field="date_ajout">DATE AJOUT</th>
                      <th data-field="delete">SUPPRIMER</th>
                      <th data-field="valider">VALIDER</th>
                      <th data-field="commandes">COMMANDES</th>
                  </tr>
                </thead>

                <tbody id="peri">
                </tbody>
                </table>

                <h5 style="margin-top:50px;">Peripheriques validé</h5>
                <table class="striped centered">
                    <thead>
                    <tr>
                        <th data-field="nom">NOM</th>
                        <th data-field="prenom">PRENOM</th>
                        <th data-field="libelle">LIBELLE</th>
                        <th data-field="mac">MAC</th>
                        <th data-field="date_ajout">DATE AJOUT</th>
                        <th data-field="delete">SUPPRIMER</th>
                    </tr>
                    </thead>

                    <tbody id="periValide">

                    </tbody>
                </table>

        </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
            <script src="../js/index.js"></script>
            <script src="../js/actionAdministrateur.js"></script>

        </body>
    </html>