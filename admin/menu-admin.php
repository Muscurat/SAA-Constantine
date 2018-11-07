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
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contrat<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="list-contrat.php">Valider contrat</a></li>
            <li><a href="consult-contrat.php">Rechercher contrat</a></li>
              </ul>
            </li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accident<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="list-accident.php">Affecter Devis</a></li>
            <li><a href="gerer-devis.php">Gérer Devis</a></li>
            <li><a href="consult-accident.php">Rechercher accident</a></li>
              </ul>
            </li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Client<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="consult-client.php">Gérer client</a></li>
              </ul>
            </li>
            <li class="dropdown" style="margin-right: 50px">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="gerer-agent.php">Gérer agent</a></li>
                <li><a href="bareme.php">Modifier barème</a></li>
                <li><a href="#">Statistiques</a></li>
              </ul>
            </li>
          
            <div class="dropdown text-center">
             <a href="#">'; ?> <img src="<?php echo $src; ?>" class="img-circle" alt="Cinque Terre" width="50" height="50" style="margin-top: 5px; margin-right: 60px"><?php echo '</a>
              <div class="dropdown-content">
                <a href="php/deconnexion.php">Déconnexion</a>
              </div>
            </div>
            
        </ul>
      </div>
    </div>
  </div>
</nav>';
    
?>