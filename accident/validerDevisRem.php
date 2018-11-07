<?php

$id_accident = $_POST['id_accident'];
$devis_rem = $_POST['devis_rem'];
$id_client = $_POST['id_client'];
$imat = $_POST['imat'];

ob_start();
?>

Chez client, concernant la déclaration d'accident de votre véhicule identifié par l'immatricule :   <?php echo $imat; ?> , Nous vous informons que le devis de remboursement est prés à rendre !

<?php
$message = ob_get_clean();

if (isset ($devis_rem) and isset ($id_client) and isset ($id_accident) and isset ($imat)){
    include('../connexion.php');
    
    $reponse = $conn->prepare('UPDATE accident SET devis_rem = :devis_rem , etat =1 WHERE id_accident = :id_accident');
    $reponse->execute(array(
    'devis_rem' => $devis_rem,
    'id_accident' => $id_accident
    ));
    
    $object = "Devis de remboursement de ".$imat;
    $reponse = $conn->prepare('INSERT INTO message (id_client, object, message, etat) VALUES (:id_client, :object ,:message, 0)');
    $reponse->execute(array('id_client' => $id_client,
                            'object' => $object,
                            'message' => $message));
    
    echo "ok";
} else {
    echo "no";
}

?>