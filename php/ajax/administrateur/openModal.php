<?php
    session_start();

    require_once('../../bd.php');
    header('Content-type: application/json');


    try{
        $ip = $_POST['ip'];
        $mac = $_POST['mac'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $groupe = $_POST['groupe'];
        $mactiret = substr($mac,0,2)."-".substr($mac,2,2)."-".substr($mac,4,2)."-".substr($mac,6,2)."-".substr($mac,8,2)."-".substr($mac,10,2);
        $macpoint = substr($mac,0,2).":".substr($mac,2,2).":".substr($mac,4,2).":".substr($mac,6,2).":".substr($mac,8,2).":".substr($mac,10,2);
        $response_array['response'] = "Commandes : <br/>
                    Add-DhcpServerv4Reservation -ScopeId 10.10.0.0 -IPAddress 10.10.130.$ip  -ClientId $mactiret <br/>

                    -Description \" $nom $prenom-$groupe \" -Name \" $nom $prenom-$groupe \"  <br/>

                    Remove-DhcpServerv4Reservation -ComputerName \"cd1.sio.lan\" -ScopeId 10.10.0.0 -ClientId $mactiret <br/>

                    nvram set wlan0_ssid0_acl_list=$macpoint,unknown,1\;<br/>

                    nvram set wlan0_ssid0_acl_list=,unknown,1\;<br/>

                    ssh 10.10.0.$ip –l admin<br/>

                    nvram set wlan0_ssid0_acl_list=$macpoint,unknown,1\;<br/>

                    nvram commit<br/>

                    reboot<br/>

                    ssh 10.10.0.$ip –l admin<br/>

                    listMac=`nvram show | grep wlan0_ssid0_acl_list | cut -d\"=\" -f2`<br/>

                    nvram set wlan0_ssid0_acl_list=\${listMac}$macpoint,unknown,1\;<br/>

                    nvram commit<br/>

                    reboot";   // Si ok
        $response_array['status'] = 'success';
        
    }catch(PDOException $e){
        $response_array['response'] = "Une erreur est survenu.";   // Si erreur
        $response_array['status'] = 'error';
    }
    
    echo json_encode($response_array);

?>