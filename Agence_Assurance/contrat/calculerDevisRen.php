<?php

 $puissance = $_POST['puissance'];
 
 
 //$_REQUEST['nbr_place']; ............................... 

 $usage = $_POST['usage'];

// $_REQUEST['energie']; .................................

 $genre = $_POST['genre'];
 $dure = $_POST['dure'];
$valeur_veh = $_POST['valeur_veh'];

       try {
        
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            
       }catch (Exception $e) {

            die ('Erreur : ' . $e->getMessage());

       }    

   function calculerRc ($usage,$puissance,$conn) {
        
        switch ($usage) {
                
            case "tourisme": if ( $puissance <= 6) 
                                return 300;
                            elseif ( $puissance <= 10)
                                return 400;
                            elseif ( $puissance <= 17)
                                return 600;
                            elseif ( $puissance <= 21)
                                return 1000;
                            else
                                return 1500;
                break;
                
            case "utilitaire": if ( $puissance <= 6) 
                                return 3600;
                            elseif ( $puissance <= 10)
                                return 4000;
                            elseif ( $puissance <= 17)
                                return 6000;
                            elseif ( $puissance <= 21)
                                return 8000;
                            elseif ( $puissance <= 31)
                                return 10000;
                            else
                                return 15000;
                break;
                
            case "transport": if ( $puissance <= 6 ) 
                                return 2000;
                            elseif ( $puissance <= 10)
                                return 3000;
                            elseif ( $puissance<= 17)
                                return 4000;
                            else
                                return 6000;
                break;
                
        }
        
    }
    
    
//    $gar_rc = calculerRc($usage,$puissance);
//    echo $gar_rc;
//    
function calculerDasc ($valeur_veh,$usage,$genre,$conn) {
    
    if ( !empty($_POST['dasc']) ) {
        
        $data = $conn->query('SELECT val1 FROM garantie WHERE id_gar=1');
        $data = $data->fetch();
        $val_dasc = $data['val1'];
         
        return ($valeur_veh * $val_dasc)/100 ;
        
    } elseif ( !empty($_POST['dr']) ) {
        
        $data = $conn->query('SELECT val1,val2 FROM garantie WHERE id_gar=3');
        $data = $data->fetch();
        $val1 = $data['val1'];
        $val2 = $data['val2'];
        
        switch ($usage) {
            case "tourisme": return $val1;
                break;
            default: return $val2;
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
                case "tourisme": return $val1;
                    break;
                case "gamme": return $val2;
                    break;
            }
            case "utilitaire": switch($genre){
                case "leger": return $val3;
                    break;
                case "lourd": return $val4;
                    break;
            }
            case "transport": return $val5;
                break;
        }
        
    } else {
        return 0;
    }
    
}
    
//  $gar_rc = calculerDasc($valeur_veh,$usage,$_POST['genre'],$_POST['genre_2'],$_POST['genre_3']);
//    echo $gar_rc;
    
function calculerViv ($valeur_veh,$conn) {
    
    if ( !empty($_POST['viv'])){
        
        $data = $conn->query('SELECT val1 FROM garantie WHERE id_gar=4');
        $data = $data->fetch();
        $val1 = $data['val1'];        
        
        return ($valeur_veh * $val1)/100 ;
        
    }else return 0;
    
}
    
//    $gar_rc = calculerViv($valeur_veh);
//    echo $gar_rc;
    
function calculerDc ($usage,$puissance,$conn) {
    
        $data = $conn->query('SELECT val1,val2,val3 FROM garantie WHERE id_gar=5');
        $data = $data->fetch();
        $val1 = $data['val1'];     
        $val2 = $data['val2'];     
        $val3 = $data['val3'];    
    
    if ( !empty($_POST['valeur']) && !empty($_POST['dc']) ){
        
       $valeur = $_POST['valeur'];
        if ($valeur == 10000) {
            return ( calculerRc($usage,$puissance,$conn) * $val1 ) / 100 ;
        } elseif ($valeur == 20000) {
            return ( calculerRc($usage,$puissance,$conn) * $val2 ) / 100 ;
        } elseif ($valeur == 30000) {
            return ( calculerRc($usage,$puissance,$conn) * $val3 ) / 100 ;
        }
        
    }else 
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
    
    $devis = calculerRc ($usage,$puissance,$conn) + calculerDasc ($valeur_veh,$usage,$genre,$conn) + calculerViv ($valeur_veh,$conn) + calculerDc ($usage,$puissance,$conn) + calZone ();

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

    echo $devis;

?>