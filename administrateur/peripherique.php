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
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body>

            <nav>
                <div class="nav-wrapper">
                  <a href="panel.php" class="brand-logo"><img src="../images/ico.png" height="64px"></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="panel.php">Utilisateurs</a></li>
                    <li class="active"><a href="">Périphériques</a></li>
                    <li><a href="../php/ajax/administrateur/sauvegardeSql.php">Sauvegarde</a></li>
                    <li><a href="../php/deconnexion.php"><i class="material-icons">power_settings_new</i></a></li>
                  </ul>
                </div>
              </nav>

            <div class="container">

            <h5 style="margin-top:50px;">Peripherique en attente</h5>
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

                <h5 style="margin-top:50px;">Peripherique validé</h5>
                <table class="striped centered">
                    <thead>
                    <tr>
                        <th data-field="nom">NOM</th>
                        <th data-field="prenom">PRENOM</th>
                        <th data-field="libelle">LIBELLE</th>
                        <th data-field="mac">MAC</th>
                        <th data-field="date_ajout">DATE AJOUT</th>
                        <th data-field="delete">DELETE</th>
                    </tr>
                    </thead>

                    <tbody id="periValide">

                    </tbody>
                </table>

        </div>

            <!-- Modal Structure -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4>Commandes :</h4>
                    <p>Add-DhcpServerv4Reservation -ScopeId 10.10.0.0 -IPAddress 10.10.130.<?php $ip ?>  -ClientId <?php $mac ?> </p>

                    <p>-Description "<?php $prenom ?> <?php $nom ?>-<?php $numGroupe ?>" -Name "<?php $prenom ?> <?php $nom ?>-<?php $numGroupe ?>" </p>
                    
                    <p>Remove-DhcpServerv4Reservation -ComputerName "cd1.sio.lan" -ScopeId 10.10.0.0 -ClientId <?php $mac ?></p>

                    <p>nvram set wlan0_ssid0_acl_list=<?php $mac ?>,unknown,1\;</p>

                    <p>nvram set wlan0_ssid0_acl_list=,unknown,1\;</p>

                    <p>ssh 10.10.0.<?php $ip ?> –l admin</p>

                    <p>nvram set wlan0_ssid0_acl_list=<?php $mac ?>,unknown,1\;</p>

                    <p>nvram commit</p>

                    <p>reboot</p>

                    <p>ssh 10.10.0.<?php $ip ?> –l admin</p>

                    <p>listMac=`nvram show | grep wlan0_ssid0_acl_list | cut -d"=" -f2`</p>

                    <p>nvram set wlan0_ssid0_acl_list=${listMac}<?php $mac ?>,unknown,1\;</p>

                    <p>nvram commit</p>

                    <p>reboot</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
                </div>
            </div>
            <a class='waves-effect waves-light btn modal-trigger' href="#modal1">Modal</a> <!-- LA CA MARCHE -->

            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>
            <script src="../js/index.js"></script>
            <script src="../js/actionAdministrateur.js"></script>

        </body>
    </html>