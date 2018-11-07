<?php

$id_accident = $_POST['id_accident'];
$devis_rem = $_POST['devis_rem'];

if (isset($id_accident) AND !empty($devis_rem) ){
    include('../connexion.php');
    
    $reponse = $conn->prepare('UPDATE accident SET devis_rem = :devis_rem , etat =1 WHERE id_accident = :id_accident');
    $reponse->execute(array(
    'devis_rem' => $devis_rem,
    'id_accident' => $id_accident
    ));
    
    echo "ok";
} else {
    echo "no";
}

?>