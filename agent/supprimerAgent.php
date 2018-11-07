<?php

$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

       try {
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch (Exception $e) {

			die ('Erreur : ' . $e->getMessage());

      }

$conn->query('DELETE FROM user WHERE pseudo="'.$pseudo.'" AND password="'.$password.'"');

echo "ok";

?>