<?php


ob_start();
?>

<style type="text/css">
    .center{text-align: center}
    table{
        margin: auto;
        width: 100%
    }
    .header td{
        width: 375px;
        height: 40px;
        text-align: left
    }
    .garantie td{width: 33%}
    .devis td{width: 25%}
    th{
        background-color: #BBB;
        font-weight: bold
    }
    
</style>
<page>
    
    <?php
    
    include ('../connexion.php');
    if (isset($_GET['id_con']))
        $id_con = $_GET['id_con'];
    
    $reponse = $conn->prepare('SELECT user.nom, user.prenom, user.sexe, 
    client.adr, client.prof, client.date_naiss, client.num_permit, client.date_permit,
    vehicule.marque, vehicule.usag, vehicule.genre,vehicule.nom as nom_veh, vehicule.zone, vehicule.puiss, vehicule.num_chass, vehicule.imat, vehicule.nbr_place,
    contrat.date_debut, contrat.date_fin,
    devis.devis
    FROM user
    INNER JOIN client ON user.id_user = client.id_user
    INNER JOIN vehicule ON client.id_client = vehicule.id_client
    INNER JOIN contrat ON contrat.id_vehicule = vehicule.id_vehicule
    INNER JOIN devis ON contrat.id_contrat = devis.id_contrat
    WHERE contrat.id_contrat = :id_con');
    $reponse->execute(array('id_con' => $id_con));
    
    ?>
    <h3 class="center"> Société Nationale d'Assurance-Constantine</h3>
    
<table class="header">

    <tr>
        <td>Unité: Contantine</td>
        <td>Adresse: Nouvelle ville UV 2.</td>
        <td>Date d'échéance: 11/05/2016 à 11/05/2017</td>
    </tr>
    <tr>
        <td>Téléphone: (031) 75 31 52</td>
        <td>Fax: (031) 75 31 53</td>
    </tr>
</table>
    <h4 class="center">Contrat d'assurance</h4>  
    
        <h5 class="center"> Souscripteur</h5>
    
<table class="header">
    
    <?php 
    while ($donnees = $reponse->fetch()) { ?>

    <tr>
        <td>Raison sociale: M.<?php echo $donnees['nom'].' '.$donnees['prenom']; ?>.</td>
        <td>Activité: Sans precision.</td>
    </tr>
    <tr>
        <td>Adresse: <?php echo $donnees['adr']; ?>.</td>
        <td>Profession: <?php echo $donnees['prof']; ?>.</td>
    </tr>
</table>
    
        <h5 class="center"> Véhicule</h5>
    
    <table class="header">

    <tr>
        <td>Tarif :</td>
        <td>Usage: <?php echo $donnees['usag']; ?>.</td>
    </tr>
    <tr>
        <td></td>
        <td>Genre: <?php echo $donnees['genre']; ?>.</td>
    </tr>
    <tr>
        <td></td>
        <td>Zone: <?php echo $donnees['zone']; ?>.</td>
    </tr>
    <tr>
        <td>Véhicule :</td>
        <td><?php echo $donnees['marque']; ?> - <?php echo $donnees['nom_veh'];?> <?php echo $donnees['num_chass']; ?> - N° Imm : <?php echo $donnees['imat']; ?></td>
    </tr>
    <tr>
        <td></td>
        <td>Puissance: <?php echo $donnees['puiss']; ?> CV Nombre Places: <?php echo $donnees['nbr_place']; ?></td>
    </tr>
    <tr>
        <td>Conducteur :</td>
        <td><?php echo $donnees['nom'].' '.$donnees['prenom']; ?> - Né le: <?php echo $donnees['date_naiss']; ?> - sexe: <?php echo $donnees['sexe']; ?></td>
    </tr>
    <tr>
        <td></td>
        <td>Permit: Numéro: <?php echo $donnees['num_permit']; ?> délivré le: <?php echo $donnees['date_permit']; ?> </td>
    </tr>
    <tr>
        <td>Date debut du contrat : <?php echo $donnees['date_debut']; ?></td>
        <td>Date fin du contrat : <?php echo $donnees['date_fin']; ?></td>
    </tr>    
    
</table>

<table class="garantie">
    
    <tr>
        <th>Garanties</th>
        <th></th>
        <th>Prime</th>
    </tr>
    
    <?php
                                          
    $rep = $conn->prepare('SELECT devis.tous_risques, devis.bris_de_glaces, devis.defence_et_recours, devis.vol_et_incendie, devis.demmage_collision, devis.responsabilite_civile
    FROM contrat
    INNER JOIN devis ON contrat.id_contrat = devis.id_contrat
    WHERE contrat.id_contrat = :id_con');
    $rep->execute(array('id_con' => $id_con));   
                                          
    while ($res = $rep->fetch()) { 
        $prime_nette = 0;
    if (isset($res['responsabilite_civile'])){ $prime_nette = $prime_nette + $res['responsabilite_civile']; ?>
        <tr>
            <td>Responsabilité civile</td>
            <td></td>
            <td><?php echo $res['responsabilite_civile']; ?></td>
        </tr>
    <?php
    }
    ?>
    
    <?php
       
        if (isset($res['tous_risques'])){ $prime_nette = $prime_nette + $res['tous_risques']; ?>
        <tr>
            <td>Tous risques</td>
            <td></td>
            <td><?php echo $res['tous_risques']; ?></td>
        </tr>
    <?php
    }
    ?>
    
    <?php
       
        if (isset($res['bris_de_glaces'])){ $prime_nette = $prime_nette + $res['bris_de_glaces']; ?>
        <tr>
            <td>Bris de glaces</td>
            <td></td>
            <td><?php echo $res['bris_de_glaces']; ?></td>
        </tr>
    <?php
    }
    ?>
    
    <?php
       
        if (isset($res['defence_et_recours'])){ $prime_nette = $prime_nette + $res['defence_et_recours']; ?>
        <tr>
            <td>Défence et recours</td>
            <td></td>
            <td><?php echo $res['defence_et_recours']; ?></td>
        </tr>
    <?php
    }
    ?>
    
    <?php
       
        if (isset($res['vol_et_incendie'])){ $prime_nette = $prime_nette + $res['vol_et_incendie']; ?>
        <tr>
            <td>Vol et incendie</td>
            <td></td>
            <td><?php echo $res['vol_et_incendie']; ?></td>
        </tr>
    <?php
    }
    ?>
    
    <?php
       
        if (isset($res['demmage_collision'])){ $prime_nette = $prime_nette + $res['demmage_collision']; ?>
        <tr>
            <td>Demmage collision</td>
            <td></td>
            <td><?php echo $res['demmage_collision']; ?></td>
        </tr>
    <?php
    }
    
    }
    ?>
    
</table>
    
    <h5 class="center" style="background-color: #BBB">Décompte de Prime</h5>
    
    <table class="devis">
        
        <?php
        $rep1 = $conn->query('SELECT val1 FROM garantie WHERE nom_gar = "tva"');
        $rep2 = $conn->query('SELECT val1 FROM garantie WHERE nom_gar = "timbre"');
        
         $result1 = $rep1->fetch();
         $result2 = $rep2->fetch();
        ?>
    <tr>
        <th>Prime Nette</th>
        <th>TVA</th>
        <th>Timbre</th>
        <th>Prime Totale</th>
    </tr>
    <tr>
        <td><?php echo $prime_nette; ?></td>
        <td><?php echo $result1['val1']; ?></td>
        <td><?php echo $result2['val1']; ?></td>
        <td><?php echo $donnees['devis']; ?></td>
    </tr>
    
</table>
    
<div class="footer" style="margin-top: 30px">
    
    <p style="float: left">Fait le: <?php echo $donnees['date_debut']; ?></p>
    <p style="float: right">Signature:</p>
    
    <?php
    }
    ?>
    
</div>

</page>    

<?php

$content = ob_get_clean();

    require_once('html2pdf/vendor/autoload.php');

try {
    $pdf = new HTML2PDF('p','A4','fr');
    $pdf->pdf->SetTitle('Contrat');
    $pdf->writeHTML($content);
    $pdf->Output('Contrat.pdf');
} catch (HTML2PDF_exception $e) {
    die($e);
}
    

?>