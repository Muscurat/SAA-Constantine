<!DOCTYPE html>
<html>
<head>
<?php
//Si le titre est indiqué, on l'affiche entre les balises <title>
echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> Saa Constantine </title>';
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="libs/toastr/toastr.css"/>
    <link rel="stylesheet" href="lobibox-master/demo/demo.css"/> 
    <link rel="stylesheet" href="lobibox-master/dist/css/lobibox.min.css"/>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/dashboeard.css" />
    <link rel="stylesheet" href="css/profil-menu.css" />
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Neuton:400,700,400italic,800'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:400,700'>
</head>
 
<?php
    
    include('connexion.php');
    
    $reponse = $conn->prepare('SELECT avatar from user WHERE id_user = :id_user');
    $reponse->execute(array(
    'id_user' => $_SESSION['id_user']
    ));
    
    while ($donnees = $reponse->fetch()) {
      $src = "client/avatar/".$donnees['avatar'];  
    };
    
            
            $reponse = $conn->prepare('SELECT * FROM user 
            INNER JOIN client ON user.id_user = client.id_user
            INNER JOIN message ON client.id_client = message.id_client
            WHERE message.etat = 0 AND user.id_user = :id_user');
            $reponse->execute(array('id_user' => $_SESSION['id_user']));
            $nbr = $reponse->rowCount(); ?>
            <input type="hidden" id="nbr" value="<?php echo $nbr; ?>">
    
<?php
    
    echo 
'<body>
    
                        <!-- Start navbar -->
    
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">SAA <span>Constantine</span></a>
    </div>
    <div>
      <div class="collapse navbar-collapse navbar-right dash-nav" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="messages.php"><i class="fa fa-envelope-o fa-lg"></i></a></li>
          <li><a href="client-calculDevis.php">Calculer devis</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contrat<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="client-demandeContrat.php">Demander contrat</a></li>
            <li><a href="gerer-contrat.php">Gérer contrat</a></li>
              </ul>
            </li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accident<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="declarer-accident.php">Déclarer accident</a></li>
            <li><a href="client-consult-accident.php">Consulter accident</a></li>
              </ul>
            </li>
          <li style="margin-right: 40px"><a href="client-contactUs.php">Contactez Nous</a></li>
          
            <div class="dropdown text-center">
             <a href="#">'; ?> <img src="<?php echo $src; ?>" class="img-circle" alt="Cinque Terre" width="50" height="50" style="margin-top: 5px; margin-right: 60px"><?php echo '</a>
              <div class="dropdown-content">
                <a href="profile.php">Profile</a>
                <a href="php/deconnexion.php">Déconnexion</a>
              </div>
            </div>
            
        </ul>
      </div>
    </div>
  </div>
</nav>
<div class="notif text-center"></div>' ;

?>