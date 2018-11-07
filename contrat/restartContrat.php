<?php

$zone = $_POST['zone'];
$valeur_veh = $_POST['valeur_veh'];
$dure = $_POST['dure'];
$id_contrat = $_POST['contrat'];
$id_vehicule = $_POST['vehicule'];
$id_client = $_POST['client'];
$date_dem = $_POST['date_dem'];
$usage = $_POST['usage'];
$genre = $_POST['genre'];
$puissance = $_POST['puissance'];
       try {
        
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       }catch (Exception $e) {

            die ('Erreur : ' . $e->getMessage());

       }

        $conn->query('UPDATE vehicule SET 
            zone="'.$zone.'",valeur="'.$valeur_veh.'" WHERE id_vehicule="'.$id_vehicule.'"');

       $date = new DateTime();
       $date_debut = date_format($date,"y-m-d");
       $date_fin = "";
       if($dure=="1ans"){
                  date_add($date,date_interval_create_from_date_string("365 days"));
                  $date_fin = date_format($date,"y-m-d");
       }else if($dure=="6mois"){
                  date_add($date,date_interval_create_from_date_string("182 days"));
                  $date_fin = date_format($date,"y-m-d");
       }else if($dure=="3mois"){
                  date_add($date,date_interval_create_from_date_string("90 days"));
                  $date_fin = date_format($date,"y-m-d");
       }

        $conn->query('UPDATE contrat SET dure="'.$dure.'",date_debut="'.$date_debut.'",date_fin="'.$date_fin.'" 
        WHERE id_contrat="'.$id_contrat.'"');

        $conn->query('UPDATE devis SET tous_risques=NULL,defence_et_recours=NULL,
        bris_de_glaces=NULL,vol_et_incendie=NULL,demmage_collision=NULL,responsabilite_civile=NULL
        WHERE id_contrat="'.$id_contrat.'"');

function calculerRc ($usage,$puissance,$conn,$id_contrat) {
    
        switch ($usage) {
                
            case "tourisme": if ( $puissance <= 6){ 
                                  
                                  $val_rc = 300;
                                  $conn->query('UPDATE devis SET responsabilite_civile="'.$val_rc.'" WHERE
                                  id_contrat="'.$id_contrat.'"');
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
    
//  $gar_rc = calculerDasc($valeur_veh,$usage,$_POST['genre'],$_POST['genre_2'],$_POST['genre_3']);
//    echo $gar_rc;
    
    
function calculerViv ($valeur_veh,$conn,$id_contrat) {
    
    if ( !empty($_POST['viv']) ){
        
        $data = $conn->query('SELECT val1 FROM garantie WHERE id_gar=4');
        $data = $data->fetch();
        $val1 = $data['val1']; 
         $val_viv = $val1;
        $devis_viv = ($valeur_veh * $val1)/100;
       
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
           $val_dc = $val1;
           $devis_dc = ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val1) / 100;
           $conn->query('UPDATE devis SET demmage_collision="'.$devis_dc.'",dc_verif="'.$dc_verif.'" 
           WHERE id_contrat="'.$id_contrat.'"');     
           return ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val1) / 100 ;
            
        } elseif ($valeur == 20000) {
            $dc_verif = 20000;
           $val_dc = $val2;
            $devis_dc = ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val2 ) / 100 ;
           $conn->query('UPDATE devis SET demmage_collision="'.$devis_dc.'",dc_verif="'.$dc_verif.'"
           WHERE id_contrat="'.$id_contrat.'"');               
           return ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val2 ) / 100 ;
            
        } elseif ($valeur == 30000) {
           $dc_verif = 30000;
           $val_dc = $val3;
           $devis_dc = ( calculerRc($usage,$puissance,$conn,$id_contrat) * $val3 ) / 100;
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
   
   echo "ok";    

?>