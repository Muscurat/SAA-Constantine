<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['clientbloque'] == true){
     
     $titre = "Tableau de borad";
    
     include('client/menu-bloque.php');
    
}else if($_SESSION['comptebloque'] == true){
    
    header('location:comptebloque.php');
    
}else if($_SESSION['client'] == true){
    
    header('location:client.php');
    
}else if($_SESSION['agent'] == true){
    
    header('location:agent.php');
    
}else if($_SESSION['admin'] == true){
    
    header('location:admin.php');
    
}else{
    
    header('location:index.php');
    
}

?>
    
                            <!-- End navbar -->
    
                            <!-- Start header -->
<div class="container">
    <div class="profil-menu">
        <ul class="nav nav-pills nav-stacked text-center">
          <li role="presentation"><a href="php/deconnexion.php">Déconnexion</a></li>
        </ul>
    </div>
    <div class="header-container text-center">
        <div class="client-header">
            
            <h1>Chez client Mr <span><?php echo($_SESSION['nomUser'].' '.$_SESSION['prenomUser']); ?></span></h1>
            <p class="lead">Bienvenue au votre tableau de board.<br/>
            Votre compte sa sera bloqé jusquà votre validation de votre contrat. <br/> </p>
            <p class="lead" style="padding-top: 50px; color: #E41B17"><span style="font-weight: bold">Remarque : </span>Si vous ne validez pas votre demande pendant 10 jours, votre compte sa sera supprimer automatiquement.
            </p>
            
        </div>
        
    </div>
    
</div>    
                            <!-- End header -->
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
<?php

include('client/footer-client.php');

?>
    
</html>