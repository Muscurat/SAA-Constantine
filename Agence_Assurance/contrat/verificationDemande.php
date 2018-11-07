<?php

       try {
        
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       }catch (Exception $e) {

            die ('Erreur : ' . $e->getMessage());

       }


$id_contrat = $_POST['id_contrat'];

$data = $conn->query('SELECT ren FROM contrat WHERE id_contrat="'.$id_contrat.'" AND ren IS NOT NULL');
$data = $data->fetch();

if($data){
    echo "ren";
}else{
    echo "new";
}
?>