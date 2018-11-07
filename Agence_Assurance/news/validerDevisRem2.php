<?php 

$id_accident = $_POST['id_accident'];

if (isset($id_accident)){
    include('../connexion.php');
    $reponse = $conn->prepare('UPDATE accident SET etat = 1 WHERE id_accident = :id_accident');
    $reponse->execute(array('id_accident' => $id_accident));
    echo "ok";
} 

?>