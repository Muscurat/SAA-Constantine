<?php

       try {
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch (Exception $e) {

			die ('Erreur : ' . $e->getMessage());

      }

/*$nom = $_POST['nom'];                            
$prenom = $_POST['prenom'];                        
$pseudo = $_POST['pseudo']= ;                               
$password = $_POST['password'];                
$sexe = $_POST['sexe'];                        
$tel = $_POST['tel'];          
$email = $_POST['email'];                               
$id_user = $_POST['id_user'];*/

$data = $conn->query('SELECT pseudo,password FROM user WHERE pseudo="'.$_POST['pseudo'].'" AND 
password="'.$_POST['password'].'" AND id_user!="'.$_POST['id_user'].'"');
$data = $data->fetch();
if($data){
    
    echo "exist";
    
}else{
    
    $conn->query('UPDATE user SET nom="'.$_POST['nom'].'",prenom="'.$_POST['prenom'].'",pseudo="'.$_POST['pseudo'].'",
    password="'.$_POST['password'].'",num_tel="'.$_POST['tel'].'",sexe="'.$_POST['sexe'].'"
    ,email="'.$_POST['email'].'" WHERE id_user="'.$_POST['id_user'].'"');
    
echo "ok";    

}



?>