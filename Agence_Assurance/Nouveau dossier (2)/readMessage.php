<?php

$id_message = $_POST['id_message'];

if (isset($id_message)) {

include('connexion.php');

$reponse = $conn->prepare('UPDATE message SET etat = 1 WHERE id_message = :id_message');
$reponse->execute(array('id_message' => $id_message));
    echo "ok";

}

?>