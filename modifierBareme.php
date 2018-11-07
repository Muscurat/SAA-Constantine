<?php

include('connexion.php');

$tous_risq = $_POST['tous_risq'];
$tourisme = $_POST['tourisme'];
$legers = $_POST['legers'];
$lourd = $_POST['lourd'];
$gamme = $_POST['gamme'];
$tpv = $_POST['tpv'];
$veh_tourisme = $_POST['veh_tourisme'];
$autre = $_POST['autre'];
$vol = $_POST['vol'];
$dc1 = $_POST['dc1'];
$dc2 = $_POST['dc2'];
$dc3 = $_POST['dc3'];
$timbre = $_POST['timbre'];
$tva = $_POST['tva'];
$mois6 = $_POST['mois6'];
$mois3 = $_POST['mois3'];
$msg = 0;

if (!empty($tous_risq)){
    $reponse = $conn->prepare('UPDATE garantie SET val1 = :tous_risq WHERE id_gar = 1');
    $reponse->execute(array('tous_risq' => $tous_risq));
    $msg = 1;
}

if (!empty($tourisme)){
    $reponse = $conn->prepare('UPDATE garantie SET val1 = :tourisme WHERE id_gar = 2');
    $reponse->execute(array('tourisme' => $tourisme));
    $msg = 1;
}

if (!empty($legers)){
    $reponse = $conn->prepare('UPDATE garantie SET val3 = :legers WHERE id_gar = 2');
    $reponse->execute(array('legers' => $legers));
    $msg = 1;
}

if (!empty($lourd)){
    $reponse = $conn->prepare('UPDATE garantie SET val4 = :lourd WHERE id_gar = 2');
    $reponse->execute(array('lourd' => $lourd));
    $msg = 1;
}

if (!empty($gamme)){
    $reponse = $conn->prepare('UPDATE garantie SET val2 = :gamme WHERE id_gar = 2');
    $reponse->execute(array('gamme' => $gamme));
    $msg = 1;
}

if (!empty($tpv)){
    $reponse = $conn->prepare('UPDATE garantie SET val5 = :tpv WHERE id_gar = 2');
    $reponse->execute(array('tpv' => $tpv));
    $msg = 1;
}

if (!empty($veh_tourisme)){
    $reponse = $conn->prepare('UPDATE garantie SET val1 = :veh_tourisme WHERE id_gar = 3');
    $reponse->execute(array('veh_tourisme' => $veh_tourisme));
    $msg = 1;
}

if (!empty($autre)){
    $reponse = $conn->prepare('UPDATE garantie SET val2 = :autre WHERE id_gar = 3');
    $reponse->execute(array('autre' => $autre));
    $msg = 1;
}

if (!empty($vol)){
    $reponse = $conn->prepare('UPDATE garantie SET val1 = :vol WHERE id_gar = 4');
    $reponse->execute(array('vol' => $vol));
    $msg = 1;
}

if (!empty($dc1)){
    $reponse = $conn->prepare('UPDATE garantie SET val1 = :dc1 WHERE id_gar = 5');
    $reponse->execute(array('dc1' => $dc1));
    $msg = 1;
}

if (!empty($dc2)){
    $reponse = $conn->prepare('UPDATE garantie SET val2 = :dc2 WHERE id_gar = 5');
    $reponse->execute(array('dc2' => $dc2));
    $msg = 1;
}

if (!empty($dc3)){
    $reponse = $conn->prepare('UPDATE garantie SET val3 = :dc3 WHERE id_gar = 5');
    $reponse->execute(array('dc3' => $dc3));
    $msg = 1;
}

if (!empty($timbre)){
    $reponse = $conn->prepare('UPDATE garantie SET val1 = :timbre WHERE id_gar = 6');
    $reponse->execute(array('timbre' => $timbre));
    $msg = 1;
}

if (!empty($tva)){
    $reponse = $conn->prepare('UPDATE garantie SET val1 = :tva WHERE id_gar = 7');
    $reponse->execute(array('tva' => $tva));
    $msg = 1;
}

if (!empty($mois6)){
    $reponse = $conn->prepare('UPDATE garantie SET val1 = :mois6 WHERE id_gar = 8');
    $reponse->execute(array('mois6' => $mois6));
    $msg = 1;
}

if (!empty($mois3)){
    $reponse = $conn->prepare('UPDATE garantie SET val1 = :mois3 WHERE id_gar = 9');
    $reponse->execute(array('mois3' => $mois3));
    $msg = 1;
}

if ($msg == 0){
    echo "not";
}else{
    echo "ok";
}

?>