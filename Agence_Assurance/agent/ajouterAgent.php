<?php

       try {
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch (Exception $e) {

			die ('Erreur : ' . $e->getMessage());

      }


$data = $conn->query('SELECT pseudo,password FROM user WHERE pseudo="'.$_POST['pseudo'].'" AND 
password="'.$_POST['password'].'"');
$data = $data->fetch();
if($data){
    
    echo "exist";
    
}else{
    
    $role = 1;
    $etat = 2;
    $conn->query('INSERT INTO user(pseudo,password,email,nom,prenom,num_tel,sexe,role,etat,avatar) 
     VALUES("'.$_POST['pseudo'].'","'.$_POST['password'].'","'.$_POST['email'].'","'.$_POST['nom'].'",
     "'.$_POST['prenom'].'","'.$_POST['tel'].'","'.$_POST['sexe'].'","'.$role.'","'.$etat.'","default-avatar.gif")');
    
    echo "ok";    

}


?>