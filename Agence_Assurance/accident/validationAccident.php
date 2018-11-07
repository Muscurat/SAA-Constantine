<?php

$lieu = $_POST['lieu'];
$date_accid = $_POST['date_accid'];
$source = $_POST['source'];
$dest = $_POST['dest'];
$nom_cond = $_POST['nom_cond'];
$prenom_cond = $_POST['prenom_cond'];
$adr_cond = $_POST['adr_cond'];
$num_permit = $_POST['num_permit'];
$imat_b = $_POST['imat_b'];            
$imat_a = $_POST['immat_a'];
  try {
    
      $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch (Exception $e) {

      die ('Erreur : ' . $e->getMessage());

  }
    $res = $conn->query('SELECT id_vehicule FROM vehicule WHERE imat="'.$imat_a.'"');
    $res = $res->fetch();
    $id_vehicule = $res['id_vehicule'];
                
                 
    $res = $conn->query('SELECT date_fin,id_contrat FROM contrat WHERE id_vehicule="'.$id_vehicule.'"');
    $res = $res->fetch();
    $date_fin = $res['date_fin'];
    $id_contrat = $res['id_contrat'];             
    
    if($date_fin==null){
        
        echo "nvalide";
        
    }else{
        
        $date = new DateTime();
        $date_aujour = date_format($date,"Y-m-d");

        $res = $conn->query('SELECT id_accident FROM accident WHERE id_contrat="'.$id_contrat.'" AND 
          etat=0');             
        $res = $res->fetch();

        if($res){

            echo "exist";

        }else{

             if($date_aujour > $date_fin){

                echo "end";

             }else{
                 
                    $date_accid = $_POST['date_accid'];
                    $date_accid = date("Y-m-d",strtotime($date_accid));
                 
                 //$date_accid = date_format($date_accid,"Y-m-d"); 
                 $conn->query('INSERT INTO accident(id_contrat,source,dest,lieu,date_accid,nom_cond,prenom_cond,
                   adr_cond,num_permit,imat_b) VALUES("'.$id_contrat.'","'.$source.'","'.$dest.'","'.$lieu.'",
                     "'.$date_accid.'","'.$nom_cond.'","'.$prenom_cond.'",
                        "'.$adr_cond.'","'.$num_permit.'","'.$imat_b.'")'); 
                 
                 echo "ok";
             }                

       }          
        
   }           
                 
                    
?>