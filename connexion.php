<?php

try {
    
    $conn = new PDO ('mysql:host=localhost;dbname=agence_assurance','root','');
    
} catch (Exception $e) {
    
    die('Erreur : ' . $e->getMessage());
    
}

?>