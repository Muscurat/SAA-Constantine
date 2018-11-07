<?php

session_start();

if ( $_SESSION['inscrire'])
    $_SESSION['inscrire'] = false;

       
       try {
        
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       }catch (Exception $e) {

            die ('Erreur : ' . $e->getMessage());

       }

        $result = $conn->query('select pseudo from user WHERE pseudo="'.$_POST['pseudo'].'" and
        password="'.$_POST['password'].'"');
        $data = $result->fetch();

        $result = $conn->query('SELECT num_permit from client where num_permit="'.$_POST['num_permit'].'"');
        $exist = $result->fetch();

       $result = $conn->query('SELECT num_tel from user where num_tel="'.$_POST['tel'].'"');
        $existTel = $result->fetch();

        if($data || $exist ||$existTel){
            
            //header ('location:../js/inscrire.php');
            echo "client exist";
            
        }else{

                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $pseudo = $_POST['pseudo'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $date_nai = $_POST['date_nai'];
                $mois_nai = $_POST['mois_nai'];
                $annee_nai = $_POST['annee_nai'];
                $sexe = $_POST['sexe'];
                $adr = $_POST['adr'];
                $profession = $_POST['profession'];
                $num_permit = $_POST['num_permit'];
                $date_permit = $_POST['date_permit'];
                $mois_permit = $_POST['mois_permit'];
                $annee_permit = $_POST['annee_permit'];


                        $_SESSION['nom'] = $nom;
                        $_SESSION['prenom'] = $prenom;
                        $_SESSION['pseudo'] = $pseudo;
                        $_SESSION['password'] = $password;
                        $_SESSION['password2'] = $password2;
                        $_SESSION['email'] = $email;
                        $_SESSION['tel'] = $tel;
                        $_SESSION['date_nai'] = $date_nai;
                        $_SESSION['mois_nai'] = $mois_nai;
                        $_SESSION['annee_nai'] = $annee_nai;
                        $_SESSION['sexe'] = $sexe;
                        $_SESSION['adr'] = $adr;
                        $_SESSION['profession'] = $profession;
                        $_SESSION['num_permit'] = $num_permit;
                        $_SESSION['date_permit'] = $date_permit;
                        $_SESSION['mois_permit'] = $mois_permit;
                        $_SESSION['annee_permit'] = $annee_permit;
                        $_SESSION['inscrire'] = true;

       // header ('location:../demanderContrat.php');
        echo "ok";    
        

    }

?>