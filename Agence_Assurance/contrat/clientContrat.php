<?php

session_start();

$nom_veh = $_POST['nom_veh'];
$marque = $_POST['marque'];
$num_chass = $_POST['num_chass'];
$immat = $_POST['immat'];
$usage = $_POST['usage'];
$genre = $_POST['genre'];
$zone = $_POST['zone'];
$puissance = $_POST['puissance'];
$energie = $_POST['energie'];
$nbr_place = $_POST['nbr_place'];
$valeur_veh = $_POST['valeur_veh'];
$dure = $_POST['dure'];

       try {
        
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            
       }catch (Exception $e) {

            die ('Erreur : ' . $e->getMessage());

       }

                $result = $conn->query('SELECT num_chass FROM vehicule where num_chass="'.$num_chass.'"');
                $exist = $result->fetch();
                
                $result = $conn->query('SELECT imat FROM vehicule where imat="'.$immat.'"');
                $exist2 = $result->fetch();
                
                if($exist || $exist2){
                    
                    echo "exist";
                    
                }else{
                    
                  $result = $conn->query('SELECT id_client FROM client where 
                  id_user="'.$_SESSION['id_user'].'"');
                  $result= $result->fetch();
                  $id_client=$result["id_client"];
                    
                  $conn->query('INSERT INTO                    
                    vehicule(id_client,num_chass,imat,nom,marque,genre,usag,zone,energie,puiss,nbr_place,valeur)
                     values("'.$id_client.'",           
                     "'.$num_chass.'","'.$immat.'","'.$nom_veh.'","'.$marque.'","'.$genre.'","'.$usage.'",
                                  "'.$zone.'","'.$energie.'","'.$puissance.'",
                                     "'.$nbr_place.'","'.$valeur_veh.'")');
                    
                    $date_dem = date('Y').'-'.date('m').'-'.date('d');
//                    $result = $conn->query('SELECT id_vehicule FROM vehicule where id_client="'.$id_client.'"');
//                    $result = $result->fetch();
//                    $id_vehicule = $result["id_vehicule"];
                    
                    $conn->query('INSERT INTO contrat(id_vehicule,date_dem,dure)
                    values(LAST_INSERT_ID(),"'.$date_dem.'","'.$dure.'")');   
//                    
//             $result = $conn->query('SELECT id_contrat FROM contrat WHERE id_vehicule="'.$id_vehicule.'"');
//             $result = $result->fetch();
//             $id_contrat = $result['id_contrat'];
                    
             $conn->query('INSERT INTO devis(id_contrat) VALUES(LAST_INSERT_ID())');                     
            $data = $conn->query('SELECT id_contrat FROM contrat ORDER BY id_contrat DESC LIMIT 1');   
            $data = $data->fetch();
            $id_contrat = $data["id_contrat"];        
             
function calculerRc ($usage,$puissance,$conn,$id_contrat) {
    
        switch ($usage) {
                
            case "tourisme": if ( $puissance <= 6){ 
                                  
                                  $val_rc = 300;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" 
                                  WHERE id_contrat="'.$id_contrat.'"');
                                return 300;
                
                             }elseif ( $puissance <= 10){
                
                                  $val_rc = 400;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 400;
                
                             }elseif ( $puissance <= 17){
                
                                  $val_rc = 600;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 600;
                
                             }elseif ( $puissance <= 21){
                
                                  $val_rc = 1000;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 1000;
                
                             }else{
                
                                  $val_rc = 1500;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 1500;
                
                             }
                break;
                
            case "utilitaire": if ( $puissance <= 6){ 
                
                                  $val_rc = 3600;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 3600;
                
                               }elseif ( $puissance <= 10){
                
                                  $val_rc = 4000;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 4000;
                
                               }elseif ( $puissance <= 17){
                
                                  $val_rc = 6000;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 6000;
                
                               }elseif ( $puissance <= 21){
                
                                  $val_rc = 8000;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 8000;
                
                               }elseif ( $puissance <= 31){
                
                                  $val_rc = 10000;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 10000;
                
                               }else{
                
                                  $val_rc = 15000;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 15000;
                
                               }
                break;
                
            case "transport": if ( $puissance <= 6 ){
                
                                  $val_rc = 2000;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 2000;
                
                              }elseif ( $puissance <= 10){
                
                                  $val_rc = 3000;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 3000;
                
                              }elseif ( $puissance<= 17){
                
                                  $val_rc = 4000;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 4000;
                
                              }else{
                
                                  $val_rc = 6000;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');                
                                return 6000;
                
                              }
                break;
                
        }
        
    }
    
    
//    $gar_rc = calculerRc($usage,$puissance);
              
                    
function calculerDasc ($valeur_veh,$usage,$genre,$conn,$id_contrat) {
    
    if ( !empty($_POST['dasc']) ) {
        
        $data = $conn->query('SELECT val1 FROM garantie WHERE id_gar=1');
        $data = $data->fetch();
        $val_dasc = $data['val1'];
        $devis_dasc = ($valeur_veh * $val_dasc)/100;
        $conn->query('UPDATE devis SET tous_risques="'.$devis_dasc.'" WHERE id_contrat="'.$id_contrat.'"');
        
        return ($valeur_veh * $val_dasc)/100 ;
        
    }  elseif ( !empty($_POST['dr']) ) {
        
        $data = $conn->query('SELECT val1,val2 FROM garantie WHERE id_gar=3');
        $data = $data->fetch();
        $val1 = $data['val1'];
        $val2 = $data['val2'];
        
        switch ($usage) {
            case "tourisme": 
                       $val_dr = $val1;
                       $conn->query('UPDATE devis SET defence_et_recours="'.$val_dr.'" WHERE
                       id_contrat="'.$id_contrat.'"');
                       return $val1;
                break;
            default: 
                       $val_dr = $val2;
                       $conn->query('UPDATE devis SET defence_et_recours="'.$val_dr.'" WHERE
                       id_contrat="'.$id_contrat.'"');              
                       return $val2;
        }
        
    } elseif ( !empty($_POST['bdg']) ) {
        
        $data = $conn->query('SELECT val1,val2,val3,val4,val5 FROM garantie WHERE id_gar=2');
        $data = $data->fetch();
        $val1 = $data['val1'];
        $val2 = $data['val2'];        
        $val3 = $data['val3'];        
        $val4 = $data['val4'];        
        $val5 = $data['val5'];        
        
        switch($usage) {
            case "tourisme": switch($genre) {
                case "tourisme": 
                      
                         $val_bdg = $val1;
                         $conn->query('UPDATE devis SET bris_de_glaces="'.$val_bdg.'" WHERE
                         id_contrat="'.$id_contrat.'"');  
                        return $val1;
                    break;
                case "gamme": 
                                          
                         $val_bdg = $val2;
                          $conn->query('UPDATE devis SET bris_de_glaces="'.$val_bdg.'" WHERE
                          id_contrat="'.$id_contrat.'"'); 
                        return $val2;
                    break;
            }
            case "utilitaire": switch($genre){
                case "leger": 
                                          
                         $val_bdg = $val3;
                          $conn->query('UPDATE devis SET bris_de_glaces="'.$val_bdg.'" WHERE
                          id_contrat="'.$id_contrat.'"');                   
                        return $val3;
                    break;
                case "lourd": 
                                          
                         $val_bdg = $val4;
                          $conn->query('UPDATE devis SET bris_de_glaces="'.$val_bdg.'" WHERE
                          id_contrat="'.$id_contrat.'"');                       
                        return $val4;
                    break;
            }
            case "transport": 
                                          
                          $val_bdg = $val5;
                          $conn->query('UPDATE devis SET bris_de_glaces="'.$val_bdg.'" WHERE
                          id_contrat="'.$id_contrat.'"');                 
                        return $val5;
                break;
        }
        
    } else {
        return 0;
    }
    
}
    

    
function calculerViv ($valeur_veh,$conn,$id_contrat) {
    
    if ( !empty($_POST['viv']) ){
        
        $data = $conn->query('SELECT val1 FROM garantie WHERE id_gar=4');
        $data = $data->fetch();
        $val1 = $data['val1']; 
        $devis_viv = ($valeur_veh * $val1)/100;
        $val_viv = $val1;
        $conn->query('UPDATE devis SET vol_et_incendie="'.$devis_viv.'" WHERE id_contrat="'.$id_contrat.'"'); 
        
        return ($valeur_veh * $val1)/100 ;
    
    }else return 0;
    
}
    
//    $gar_rc = calculerViv($valeur_veh);
//    echo $gar_rc;
    
function calculerDc ($usage,$puissance,$conn,$id_contrat) {
    
        $data = $conn->query('SELECT val1,val2,val3 FROM garantie WHERE id_gar=5');
        $data = $data->fetch();
        $val1 = $data['val1'];     
        $val2 = $data['val2'];     
        $val3 = $data['val3'];     
    
    if ( !empty($_POST['valeur']) && !empty($_POST['dc']) ) {
        
       $valeur = $_POST['valeur'];
        if ($valeur == 10000) {
           $dc_verif = 10000;
           $devis_dc = ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val1) / 100;
           $val_dc = $val1;
           $conn->query('UPDATE devis SET demmage_collision="'.$devis_dc.'",dc_verif="'.$dc_verif.'" 
           WHERE id_contrat="'.$id_contrat.'"');     
           return ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val1) / 100 ;
            
        } elseif ($valeur == 20000) {
            $dc_verif = 20000;
            $devis_dc = ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val2 ) / 100 ;
           $val_dc = $val2;
           $conn->query('UPDATE devis SET demmage_collision="'.$devis_dc.'",dc_verif="'.$dc_verif.'"  
           WHERE id_contrat="'.$id_contrat.'"');               
           return ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val2 ) / 100 ;
            
        } elseif ($valeur == 30000) {
            $dc_verif = 30000;
            $devis_dc = ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val3 ) / 100 ;
           $val_dc = $val3;
           $conn->query('UPDATE devis SET demmage_collision="'.$devis_dc.'",dc_verif="'.$dc_verif.'"  
           WHERE id_contrat="'.$id_contrat.'"');                
           return ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val3 ) / 100 ;
            
        }
        
    } else 
         return 0 ;
    
}
    
//    $gar_dc = calculerDc($usage,$puissance);
//    echo $gar_dc;
    
function calZone () {
    
    if (!empty($_POST['zone'])) {
       
        $zone = $_POST['zone'];
        if ($zone == "sud")
            return 500;
        else 
            return 0;
        
    }else 
            return 0;
    
} 
    
    $devis = calculerRc ($usage,$puissance,$conn,$id_contrat) + calculerDasc ($valeur_veh,$usage,$genre,$conn,$id_contrat) + 
        calculerViv ($valeur_veh,$conn,$id_contrat) + calculerDc ($usage,$puissance,$conn,$id_contrat) + calZone ();
    
  /* requette pour entrer le devis dans la table devis */                        

    if($dure=="6mois"){
    
       $data = $conn->query('SELECT val1 FROM garantie WHERE id_gar=8');
       $data = $data->fetch();
       $val1 = $data['val1'];         
        
        $devis = $devis * ($val1 / 100);
    }else if($dure=="3mois"){
        
       $data = $conn->query('SELECT val1 FROM garantie WHERE id_gar=9');
       $data = $data->fetch();
       $val1 = $data['val1'];
                            
        $devis = $devis * ($val1 / 100);
    }
                    
  $data = $conn->query('SELECT val1 FROM garantie WHERE id_gar=7');
  $data = $data->fetch();
  $val1 = $data['val1'];                    
                    
  $data = $conn->query('SELECT val1 FROM garantie WHERE id_gar=6');
  $data = $data->fetch();
  $val2 = $data['val1'];                    
                    
 $devis = $devis * ($val1/100);
 $devis = $devis+$val2;  
                    
  $conn->query('UPDATE devis SET devis='.$devis.' WHERE id_contrat='.$id_contrat);                  
  /* La requette est terminée  */                    
    echo "ok";                    
                    
                    
}

?>