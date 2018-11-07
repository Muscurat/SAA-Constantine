<?php

session_start();


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$adr = $_POST['adr'];
$profession = $_POST['profession'];
$pseudo = $_POST['pseudo'];
$sexe = $_POST['sexe'];
$date_naiss = $_POST['date_naiss'];
$date_permit = $_POST['date_permit'];
    

  try {
        
        $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch (Exception $e) {

        die ('Erreur : ' . $e->getMessage());

  }

if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
            $chemin = "client/avatar/".$_SESSION['id_user'].".".$extensionUpload;
            $result = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
            if($result){
                
                $updateAvatar = $conn->prepare('UPDATE user SET avatar = :avatar WHERE id_user = :id_user');
                $updateAvatar->execute(array(
                'avatar' => $_SESSION['id_user'].".".$extensionUpload,
                'id_user' => $_SESSION['id_user']
                ));                
   
         }else{
              
              header('location:profile.php?field=true');
            }
              
    }


$conn->query('UPDATE user SET nom="'.$nom.'",prenom="'.$prenom.'",pseudo="'.$pseudo.'",email="'.$email.'",num_tel="'.$tel.'",
sexe="'.$sexe.'" WHERE id_user="'.$_SESSION["id_user"].'"');


            $date_naiss = $_POST['date_naiss'];
            $date_naiss = date("Y-m-d",strtotime($date_naiss));
            

            $date_permit = $_POST['date_permit'];
            $date_permit = date("Y-m-d",strtotime($date_permit));            
            

$conn->query('UPDATE client SET adr="'.$adr.'",prof="'.$profession.'",
date_naiss="'.$date_naiss.'",date_permit="'.$date_permit.'" WHERE id_user="'.$_SESSION["id_user"].'"');
        
header('location:client.php');
    


?>