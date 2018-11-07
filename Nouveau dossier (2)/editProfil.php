<?php

session_start();

// Just à tester ......
$_SESSION['id_user'] = 24;
// Just à tester ......

if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
   
    $taillMax = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'png', 'gif');
    
    if ($_FILES['avatar']['size'] < $taillMax) {
        
        $extensionUpload  = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
        if(in_array($extensionUpload, $extensionsValides)) {
            
            $chemin = "client/avatar/".$_SESSION['id_user'].".".$extensionUpload;
            $result = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
            if($result){
                
                include('connexion.php');
                $updateAvatar = $bdd->prepare('UPDATE user SET avatar = :avatar WHERE id_user = :id_user');
                $updateAvatar->execute(array(
                'avatar' => $_SESSION['id_user'].".".$extensionUpload,
                'id_user' => $_SESSION['id_user']
                ));
                
                header('location:client.php');
                
            }   else {
                $msg = "Erreur durant l'importation du photo";
            }
            
        }   else {
            $msg = "Votre photo de profil doit ètre au format : jpg, jpeg, png ou gif";
        }
        
    } else {
        $msg = "Votre photo de profil ne doit dépasser 2Mo ";
    }
    
}   else {
    $msg = "Aucun photo !";
}

if (isset($msg)) {
    header('location:profile.php');
    
}

?>