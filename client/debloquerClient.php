<?php

include('../connexion.php');

$id_client = $_POST['id_client'];

$reponse = $conn->prepare('SELECT user.etat FROM user INNER JOIN client 
ON user.id_user = client.id_user WHERE client.id_client = :id_client');
$reponse->execute(array('id_client' => $id_client));
$donnees = $reponse->fetch();
if ($donnees['etat'] == 2){
    echo 'debloquer';
} else {
    
    $reponse = $conn->prepare('UPDATE user INNER JOIN client ON user.id_user = client.id_user
    set user.etat = 2 WHERE client.id_client = :id_client');
    $reponse->execute(array('id_client' => $id_client));
    
    echo 'ok';
}

?>