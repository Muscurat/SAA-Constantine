<?php



if(!empty(($_POST['pseudo']) && ($_POST['password']))){

      $pseudo= $_POST['pseudo'];
      $password= $_POST['password'];
 
       try {
        
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       }catch (Exception $e) {

            die ('Erreur : ' . $e->getMessage());

       }
   
        $result = $conn->query('select role,etat from user WHERE pseudo="'.$pseudo.'" and password="'.$password.'"');
        $data = $result->fetch();
            
        if($data){
            
           session_start();
           $result2 = $conn->query('select nom,prenom,id_user from user WHERE pseudo="'.$pseudo.'" and 
                password="'.$password.'"');
           $data2 = $result2->fetch();
           $_SESSION['nomUser'] = $data2['nom'];   
           $_SESSION['prenomUser'] = $data2['prenom'];
           $_SESSION['id_user'] = $data2['id_user'];
           $_SESSION['pseudoUser'] = $pseudo;
           $_SESSION['passwordUser'] = $password;
            

             if($data["role"]==0){
                 
                 if($data["etat"]==0){
                     
                       $_SESSION['clientbloque'] = true;
                       $result2 = $conn->query('SELECT id_client FROM client WHERE id_user="'.$data2['id_user'].'"');
                       $result2 = $result2->fetch();
                       $id_client = $result2['id_client'];
                       $result2 = $conn->query('SELECT id_vehicule FROM vehicule WHERE id_client="'.$id_client.'"');
                       $result2 = $result2->fetch();
                       $id_vehicule = $result2['id_vehicule'];
                       $result2 = $conn->query('SELECT id_contrat,date_dem FROM contrat WHERE 
                          id_vehicule="'.$id_vehicule.'"');
                       $result2 = $result2->fetch();
                       $id_contrat = $result2['id_contrat'];
                       $date_demande = new DateTime($result2['date_dem']);  

                        $aujourdhui = new DateTime();
                        $aujourdhui = date_format($aujourdhui,"y-m-d");
    
                        $lancement = new DateInterval('P10D');
                     
                        if(($date_demande->add($lancement)) >= $aujourdhui){
                            
                            echo 'clientB1';
                            
                        }else{
                            
                            $conn->query('DELETE FROM devis WHERE id_contrat="'.$id_contrat.'"');
                            $conn->query('DELETE FROM contrat WHERE id_contrat="'.$id_contrat.'"');
                            $conn->query('DELETE FROM vehicule WHERE id_client="'.$id_client.'"');
                            $conn->query('DELETE FROM client WHERE id_client="'.$id_client.'"');
                            $conn->query('DELETE FROM user WHERE id_user="'.$_SESSION['id_user'].'"');
                            echo 'suppression';
                            
                        }
                        
                  }else if($data["etat"]==1){
                     
                        $_SESSION['comptebloque'] = true;
                        echo 'clientB2';
                     
                  }else if($data["etat"]==2){
                       $_SESSION['client'] = true;
                       echo 'client';         
                  }
                 
             }else if($data["role"]==1){
                     $_SESSION['agent'] = true;
                     echo 'agent';
                 
             }else if($data["role"]==2){
                      $_SESSION['admin'] = true;
                     echo 'admin';
             }

            
        } else{
            
            echo "wrong informations";
        }
	 
          
 
 }else{
    
    echo "not found";
    
 }

	

?>