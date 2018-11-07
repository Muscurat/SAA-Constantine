<?php

$password = $_POST['password'];
$passwordOld = $_POST['passwordOld'];

  try {
        
        $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch (Exception $e) {

        die ('Erreur : ' . $e->getMessage());

  }

$data = $conn->query('SELECT id_user FROM user WHERE password="'.$passwordOld.'"');
$data = $data->fetch();

if($data){
    
    $conn->query('UPDATE user SET password="'.$password.'" WHERE password="'.$passwordOld.'"');
    
    echo "ok";
    
}else{
    echo "not";
    
}

?>