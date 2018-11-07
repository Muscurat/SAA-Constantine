<?php

session_start();

if(!empty($_SESSION['agent'])){
    header('location: agent.php');
}else if(!empty($_SESSION['client'])){
    header('location: client.php'); 
}else if(!empty($_SESSION['comptebloque'])){
    header('location: comptebloque.php');
}else if(!empty($_SESSION['admin'])){
    header('location: admin.php');
}else if(!empty($_SESSION['clientbloque'])){
    header('location: clientbloque.php');
}

//session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
  <title>SAA-Constantine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="libs/toastr/toastr.css"/>
    <link rel="stylesheet" href="lobibox-master/demo/demo.css"/> 
    <link rel="stylesheet" href="lobibox-master/dist/css/lobibox.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
     <style type="text/css">
    
        .Rouge {
            text-decoration-color: darkred;
        }
         
         .org {
             
             text-decoration-color: #555;
         } 
    </style> 
  
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

    
<!-- Start header -->
    
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">SAA<span>Constantine</span></a>
    </div>
    <div>
      <div class="collapse navbar-collapse navbar-right" id="myNavbar">
        <ul class="nav navbar-nav">
          <li id="id0" class="active"><a href="#carousel-example-generic"><i class="fa fa-home fa-lg" aria-hidden="true"></i><span class="sr-only">(current)</span></a></li>
          <li id="id1"><a href="#about">Présentation</a></li>
          <li id="id2"><a href="#agent">Nos Agents</a></li>
          <li id="id3"><a href="#contact-us">Contactez Nous</a></li>
        </ul>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#connModal"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Connexion</button>
        <a href="inscrire.php"> <button type="button" class="btn btn-danger"> <span class="glyphicon glyphicon glyphicon-plus-sign" aria-hidden="true"></span>S'inscrire</button></a>
      </div>
    </div>
  </div>
</nav>
    
<!-- End header -->
    
<!-- Start Carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators hidden-xs">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="photos/ample_slider1.jpg" alt="Pic 1">
      <div class="carousel-caption">
          <h1 class="hidden-xs">Calcul de devis</h1>
          <p class="lead"> Calculez <span>votre devis </span>maintenant facillement </p>
      </div>
    </div>
      
    <div class="item">
      <img src="photos/services-bis.jpg" alt="Pic 3">
      <div class="carousel-caption">
          <h1 class="hidden-xs">Service accident</h1>
          <p class="lead"> Vous pouvez déclarer votre accident <span>en ligne </span> ,et nout la traitons. </p>
      </div>
    </div>
      
    <div class="item">
      <img src="photos/shutterstock_158522279.jpg" alt="Pic 4">
      <div class="carousel-caption">
        <h1 class="hidden-xs">Demande de contrat</h1>
        <p class="lead"> Créez <span>votre contrat </span>où que vous soyez..quand vous voulez </p>
      </div>
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
<!-- End Carousel -->
    
<!-- Start calculer devis -->
    
<section class="cal-devis text-center">
    <button type="button" class="btn btn-primary btn-lg" style="border-radius: 0px" id="work" >
        <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right: 7px">
        </span> Calculer devis</button>
</section>
    
<!-- End Calculer devis -->
    
<!-- Start Section About -->

<section class="about text-center" id="about">
  <div class="container">
        <h1 class="wow flipInX" data-wow-duration="2s"data-wow-offset="100"> La société SAA <span>Constantine</span> </h1>
        <p class="lead wow zoomIn" data-wow-duration="1s" data-wow-offset="200">La Société nationale d’assurance <strong>SAA Constantine</strong> est une Entreprise Publique Economique dont le seul actionnaire de l’Etat.<br/>
        Créer en 1963, la Société nationale d’assurance est l’une des premières sociétés d’assurance instituées en Algérie au lendemain de l’indépendance du pays.<br/>
        Son capital social est de 16 milliards de DA (classé au premier rang des assurances en Algérie, elle détient 28% de part du marché).<br/>
        Son chiffre d’affaire de l’année 2006 est de : 13,4 milliards de DA.<br/>
        Son réseau de distribution est le plus dense, il est réparti à travers toutes les régions du pays. Il est composé de 460 agences soutenues par 14 Directions régionales tournées essentiellement vers le marché dans l’optique d’une démarche de proximité vis-à-vis des clients.<br/>
        Le nombre total de l’effectif composant la société est de 3652.<br/>
        La Société nationale d’assurance dispose d’une filiale d’expertise représentée par 25 centres opérationnels au niveau du territoire national.</p>
  </div>
</section>
    
<!-- End Section About -->
    
<!-- Start Section Privilège -->
    
<section class="features text-center" id="privilege">
  <div class="container">
            <h1>Nos privilèges</h1>
            <div class="row">
                <div class="col-lg-3 col-sm-12">
                    <div class="feat wow fadeInLeft" data-wow-duration="1s"data-wow-offset="100">
                        <i class="fa fa-user-secret fa-3x fa-fw" aria-hidden="true"></i>
                        <h3>Sécurité</h3>
                        <p>Vous aurez votre propre éspace, aucun personne peut accéde au votre compte ou consulte 
                        vos informations.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-12">
                    <div class="feat wow fadeInUp" data-wow-duration="1s"data-wow-offset="100">
                        <i class="fa fa-edit fa-3x fa-fw" aria-hidden="true"></i>
                        <h3>Facilité</h3>
                        <p>Nous mettons entre vos mains ce facile système à utiliser.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-12">
                    <div class="feat wow fadeInDown" data-wow-duration="1s"data-wow-offset="100">
                        <i class="fa fa-cogs fa-3x fa-fw" aria-hidden="true"></i>
                        <h3>Contrôle</h3>
                        <p>Dérriere plan des agents contrôle vos demandes et vos déclarations.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-12">
                    <div class="feat wow fadeInRight" data-wow-duration="1s"data-wow-offset="100">
                        <i class="fa fa-television fa-3x fa-fw" aria-hidden="true"></i>
                        <h3>Responsive</h3>
                        <p>Vous n'êtes pas obligé d'utiliser tel ou tel dispositif, notre système est adapté aux différents tailles d'écrans.</p>
                    </div>
                </div>
                
            </div>
        </div>
</section>
    
<!-- End Section Privilège -->
    
<!-- Start section agent -->
    
<section class="agent text-center" id="agent">
  <div class="team">
            
            <div class="container">
                <h1 class="titre-color">Nos Agents</h1>
                <div class="row">
                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="person">
                            <img class="img-circle wow rotateIn" data-wow-duration="1s"data-wow-offset="200" src="photos/youcef_agent.jpg" alt="Youcef" />
                            <div class="wow bounce" data-wow-duration="1s"data-wow-offset="200">
                                <h3 class="titre-color">Youcef Amara</h3>
                                <a href="#"><i class="fa fa-google-plus-square fa-2x">
                                </i></a>
                                <a href="http:\\www.facebook.com/youcef.amara"><i class="fa fa-facebook-square fa-2x">
                                </i></a>
                                <a href="#"><i class="fa fa-twitter-square fa-2x">
                                </i></a>
                                <a href="#"><i class="fa fa-youtube-square fa-2x">
                                </i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="person">
                            <img class="img-circle wow pulse" data-wow-duration="1.5s"data-wow-offset="200" src="photos/dahman.jpg" alt="Dahmane" />
                            <div class="wow bounce" data-wow-duration="1s"data-wow-offset="200">
                                <h3 class="titre-color">Dahdouh</h3>
                                <a href="#"><i class="fa fa-google-plus-square fa-2x">
                                </i></a>
                                <a href="http:\\www.facebook.com/youcef.amara"><i class="fa fa-facebook-square fa-2x">
                                </i></a>
                                <a href="#"><i class="fa fa-twitter-square fa-2x">
                                </i></a>
                                <a href="#"><i class="fa fa-youtube-square fa-2x">
                                </i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="person">
                            <img class="img-circle wow pulse" data-wow-duration="1.5s"data-wow-offset="200" src="photos/hamza.jpg" alt="Hamza" />
                            <div class="wow bounce" data-wow-duration="1s"data-wow-offset="200">
                                <h3 class="titre-color">Hamza</h3>
                                <a href="#"><i class="fa fa-google-plus-square fa-2x">
                                </i></a>
                                <a href="http:\\www.facebook.com/youcef.amara"><i class="fa fa-facebook-square fa-2x">
                                </i></a>
                                <a href="#"><i class="fa fa-twitter-square fa-2x">
                                </i></a>
                                <a href="#"><i class="fa fa-youtube-square fa-2x">
                                </i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="person">
                            <img class="img-circle wow rotateIn" data-wow-duration="1s"data-wow-offset="200" src="photos/youcef_agent.jpg" alt="Youcef" />
                            <div class="wow bounce" data-wow-duration="1s"data-wow-offset="200">
                                <h3 class="titre-color">Elamine Bachir</h3>
                                <a href="#"><i class="fa fa-google-plus-square fa-2x">
                                </i></a>
                                <a href="http:\\www.facebook.com/youcef.amara"><i class="fa fa-facebook-square fa-2x">
                                </i></a>
                                <a href="#"><i class="fa fa-twitter-square fa-2x">
                                </i></a>
                                <a href="#"><i class="fa fa-youtube-square fa-2x">
                                </i></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        
        </div>
</section>
    
<!-- End section agent -->
    
<!-- Start Nos Commentaires -->
    
    <section class="comments text-center">
        <h1>Commentaires des clients</h1>
        
        <div class="container">
        <div id="carousel_comments" class="carousel slide" data-ride="carousel">

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
              <p class="lead"> J'ai des contrats avec cette agence, elle est magnifique ..</p>
                <span>Youcef Amara</span>
          </div>

        <div class="item">
          <p class="lead">J'ai déclarer une accident dans cette agence en ligne ! Wooow...</p>
            <span>Elamine Bachir</span>
        </div>

        <div class="item">
            <p class="lead"> Agence en ligne avec multi services !! c'est parfait </p>
            <span>Belhout Redouane</span>
          </div>
        </div>
            
            <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel_comments" data-slide-to="0" class="active">
            <img src="photos/youcef.jpg" alt="Pic 1" />
          </li>
        <li data-target="#carousel_comments" data-slide-to="1">
          <img src="photos/dahman.jpg" alt="Pic 1" />
          </li>
        <li data-target="#carousel_comments" data-slide-to="2">
          <img src="photos/hamza.jpg" alt="Pic 1" />
          </li>
      </ol>
            
       </div>

      </div>
  
  </section>
    
<!-- End Nos Commentaires -->
    
<!-- Start contactez-Nous -->
    
<section class="contact-us text-center" id="contact-us">
  <div class="field">
        <div class="container">
            <h1 class="titre-color">Contactez Nous</h1>
            <div class="row">
                <form role="form">
                    <div class="col-md-6 wow bounceInLeft" data-wow-duration="1s"data-wow-offset="200">
                        <div class="form-group">
                            <input type="text" id="nomprenom" class="form-control input-lg" placeholder="Nom et Prénom">
                        </div>
                        <div class="form-group">
                            <input type="text" id="email" class="form-control input-lg" placeholder="Email addresse">
                        </div>
                        <div class="form-group">
                            <input type="text" id="phone" class="form-control input-lg" placeholder="Numéro de téléphone">
                        </div>
                    </div>
                    <div class="col-md-6 wow bounceInRight" data-wow-duration="1s"data-wow-offset="200">
                        <div class="form-group">
                            <textarea id="comment" class="form-control input-lg" placeholder="Votre Message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" id="envoyerMail" class="btn btn-danger btn-lg btn-block">Contactez-Nous</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    
<!-- End contactez-Nous -->
    
<!-- Start contact info -->
<section class="footer">
    <div class="contact-info text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 wow zoomIn" data-wow-duration="1s"data-wow-offset="200" data-wow-delay=".5s">
                    <h3>Informations de contact</h3>
                    <div class="phone">
                        <i class="fa fa-phone fa-lg"></i>
                        <p>0559-02-13-28</p>
                    </div>
                    <div class="location">
                        <i class="fa fa-map-marker fa-lg"></i>
                        <p>Ali mendjli UV2.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 wow zoomIn" data-wow-duration="1s"data-wow-offset="200" data-wow-delay="1s">
                    <h3>Heurs de travailles</h3>
                    <h4>Dimanche - Jeudi :</h4>
                    <p>08:00 - 16:00</p>
                </div>

                <div class="col-md-4 col-sm-12 wow zoomIn" data-wow-duration="1s"data-wow-offset="200" data-wow-delay="1.5s">
                    <h3>Réseaux sociaux</h3>
                    <div class="res">
                        <i class="fa fa-google-plus-square fa-3x"></i>
                        <i class="fa fa-facebook-square fa-3x"></i>
                        <i class="fa fa-twitter-square fa-3x"></i>
                        <i class="fa fa-youtube-square fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <p>Ce site est réalisé par <span>Youcef Amara </span>et <span>El amine Bachir </span> 2016 <i class="fa fa-copyright"></i></p>
        </div>
    </div>
</section>
    
<!-- End contact info -->
    
<!-- Start connexion modal -->
    
<div id="connModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content text-center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="annuler">&times;</button>
        <h4 class="modal-title"><i class="fa fa-key"></i> Connexion</h4>
      </div>
      <div class="modal-body">
        
            <form role="form">
              <div class="input-group margin-bottom-lg">
                  <span class="input-group-addon"><i class="fa fa-user fa-fw fa-2x" aria-hidden="true"></i></span>
                  <input class="form-control input-lg" type="text" placeholder="Nom d'utilisateur" id="pseudo">
              </div>
              <div class="input-group margin-bottom-lg">
                  <span class="input-group-addon"><i class="fa fa-unlock-alt fa-fw fa-2x" aria-hidden="true"></i></span>
                  <input class="form-control input-lg" type="password" placeholder="Mot de passe" id="password">
              </div>
             
              <button type="button" class="btn btn-primary btn-lg" id="connexion">Connexion</button>
              <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" id="annuler">Annuler</button>
            </form>
          
            <div class="inscrire">
                <p class="lead">Vous n'avez pas encore de compte ? <a hraf="#">Créez-en un !</a></p>
            </div>
          
            <a href="#">| Mot de passe oublié |</a>
          
      </div>
    
    </div>

  </div>
</div>
    
<!-- End inscrire modal -->
    
<!-- Star devis modal -->
    
<div id="calculer-devis" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content text-center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="annulerDevis">&times;</button>
        <h4 class="modal-title"><i class="fa fa-calculator" style="margin-right: 8px"></i> Claculer Devis</h4>
      </div>
      <div class="modal-body">
        
            <form role="form" action="calcul_devis_vis.php" method="post">
              
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="usage">Usage</label>
                          <select class="form-control" id="usage" name="usage">
                            <option selected="selected" class="tourisme" value="tourisme">Tourisme</option>
                            <option class="utilitaire" value="utilitaire">Utilitaire</option>
                            <option class="transport" value="transport">Transport</option>
                          </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="genre">Genre</label>
                          <select class="form-control list-tourisme" id="genre" name="genre">
                            <option selected="selected" value="tourisme">Véhicule de tourisme</option>
                            <option value="gamme">haute gamme et tous terrains</option>
                          </select>
                        
                            <select class="form-control list-utilitaire" id="genre_2" name="genre_2">
                            <option selected="selected" value="leger">légers (-3.5 tonnes)</option>
                            <option value="lourd">lourd (3.5 tonnes et plus)</option>
                          </select>
                        
                            <select class="form-control list-transport" id="genre_3" name="genre_3">
                            <option selected="selected" value="transport">TPV et transport du personnel</option>
                          </select>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <div class="form-group">
                              <label for="puissance">Puissance</label>
                              <input type="number" class="form-control" id="puissance" name="puissance" max="100">
                          </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="energie">Energie</label>
                          <select class="form-control" id="energie">
                            <option selected="selected">Diesel</option>
                            <option>Ecense</option>
                          </select>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="nbr_place">Nombre de place</label>
                          <input type="number" class="form-control" id="nbr_place" max="30" min="2">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="valeur_veh">Valeur (DA)</label>
                          <input type="number" class="form-control" id="valeur_veh" name="valeur_veh" max="8000000"  accept=""min="200000">
                    </div>
                </div>
            </div>
                
            <div class="form-group text-center">
                    <div class="checkbox disabled">
                          <label><input type="checkbox" value="" disabled checked name="rc"> Résponsabilité civile</label>
                    </div>
                </div>
                <div class="form-group  form-inline text-center">
                    <div class="checkbox">
                          <label><input type="checkbox" value="" class="dasc" name="dasc"> Demmages avec ou sans collisions (Tous risques) </label>
                    </div>
                    <div class="checkbox">
                          <label><input type="checkbox" value="" class="bd" name="bdg"> Bris de Glaces </label>
                    </div>
               
                    <div class="checkbox">
                          <label><input type="checkbox" value="" class="dr" name="dr"> Défence et Recours </label>
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="checkbox">
                          <label><input type="checkbox" value="" name="viv"> Vol et Incendie du véhicule </label>
                    </div>
                    <div class="checkbox" style="margin-top: 30px">
                          <label><input type="checkbox" value="" id="dc" name="dc"> Demmages collision </label>
                    </div>
                </div>
                <div class="form-group text-center val">
                        <label for="valeur-dc">Valeur </label>
                        <select class="form-control bdg" id="valeur" style="width: 40%; margin: auto" disabled="disabled" name="valeur-dc">
                        <option selected="selected" value="10000">10000 dz</option>
                        <option value="20000">20000 dz</option>
                        <option value="30000">30000 dz</option>
                        </select>
                </div>
                
                <div class="form-group text-center" style="width: 40%; margin: auto">
                        <label for="dure">Duré du contrat</label>
                        <select class="form-control" id="dure">
                        <option selected="selected" value="1ans">1 ans</option>
                        <option value="6mois">6 mois</option>
                        <option value="3mois">3 mois</option>
                        </select>
                </div>
                
                <div class="form-group text-center" style="margin: 20px 0px">
                    <span style="color: #555; font-weight: bold">Zone : &nbsp; &nbsp;</span>
                    <label class="radio-inline">
                    <input type="radio" name="zone" value="nord" id="nord" checked>Nord
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="zone" value="sud" id="sud">Sud
                    </label>
                </div>
                
                <div class="aff-devis">
                    <p class="lead" style="color: #E41B17; margin-top: 60px; font-weight: bold" id="affichageDevis"></p>
                </div>
             
              <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" 
                      id="annulerDevis">Annuler</button>
            </form>
          
            
      </div>
    
    </div>

  </div>
</div>
    
<!-- End devis modal -->
    
<!-- Start Loading -->
    
<section class="loading">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
</section>
    
<!-- End Loading -->
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script>
        
         function validatePhone(phone){
         if(phone.match('^[0]{1}[5-7]{1}[0-9]{8}$')!=null){
                return true;
            }else{   
                return false;
            }
        
    }


function validateEmail(email) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(email)) {
return true;
}else {
return false;
//}
}
}

      $('#email').keyup(function(){  
          if(validateEmail($('#email').val())==false){
                   $('#email').css('border-color','red');
          }else{
                   $('#email').css('border-color','');
          }      
      });
    
      $('#phone').keyup(function(){  
          if(validatePhone($('#phone').val())==false){
                   $('#phone').css('border-color','red');
          }else{
                   $('#phone').css('border-color','');
          }  
    
      });


// Contact form popup send-button click event.
    
$("#envoyerMail").click(function() {

if(($("#nomprenom").val()!="")&&($("#email").val()!="")&&($("#phone").val()!="")&&($("#comment").val()!="")){
  
var name = $("#nomprenom").val();
var email = $("#email").val();
var phone = $("#phone").val();
var comment = $("#comment").val();
var verifEmail = 1;
var verifTel = 1;
    
    if(!validatePhone($("#phone").val())){
        verifTel = 0;

    }
    
    if(!validateEmail($("#email").val())){
        verifEmail = 0;

    }
    
    if(!validateEmail($("#email").val()) || !validatePhone($("#phone").val())){
        Lobibox.alert('error', {
           msg: "verifier le numero de telephone et l'adress email !"
        });
    }

    if(verifEmail==1 && verifTel==1){
        
               $.ajax({
           type:"post",
           url:"php/sendMail.php",
           data:{
			    'name':name,
                'email':email,
                'phone':phone,
                'comment':comment
			   },
          // dataType:"json",
           success:function(response){
               if(response=="OK"){
                 // toastr.success("send successful","OK",{timeOut:3000});
                    Lobibox.notify('success', {
                        title: 'bien envoyée',
                        msg: 'votre message a été envoyer avec success.'
                    });


               }else{
                 //toastr.error("send failed","NO",{timeOut:3000});
                    Lobibox.notify('error', {
                       title: 'mal envoie',
                       msg: 'votre message ne pas envoyer , verifier votre connexion.'
                    });
                   
               }
               
           }
       });
        
    }else{
        
        
    }

    
    
    
}else{
    
        Lobibox.alert('error', {
           msg: "remplir tous les champs svp !"
        });
    
}    
 
});  
       
         
        
        $("#annulerDevis").click(function(){
            
            $("#puissance").val('');
            $("#valeur_veh").val('');
            $("#nbr_place").val('');
            $("input[name='viv']").checked = false;
            $("input[name='dc']").checked = false;
            $("input[name='bdg']").checked = false;
            $("input[name='dr']").checked = false;
            $("input[name='dasc']").checked = false;
            $("input[name='dr']").val('');
            $("input[name='dasc']").val('');
            $("input[name='bdg']").val('');
            $("input[name='dc']").val('');
            $("input[name='viv']").val('');
            $("#affichageDevis").text('');

        });
        
        $('#work').click(function(){
            
            $('#calculer-devis').modal({
               backdrop:'static',
               keyboard:false,    
               show :'false'   
            });
         
           $("input[name='dr']").val('');
           $("input[name='dasc']").val('');
           $("input[name='bdg']").val('');
           $("input[name='dc']").val('');
           $("input[name='viv']").val('');
           $("#affichageDevis").text('');
            
        });
                

        $("#puissance,#valeur_veh,#nbr_place").keyup(function(){ 

            // alert($('input[name="dasc"]').val());
                 
                var puissance = $("#puissance").val();
                var valeur_veh = $("#valeur_veh").val();
                var nbr_place = $("#nbr_place").val();
                var valeur = $("#valeur").val();
                var usage = $("#usage").val();
                var energie = $("#energie").val();
                var genre = $("#genre").val();
                var genre_2 = $("#genre_2").val();
                var genre_3 = $("#genre_3").val();
                var dure = $("#dure").val();
                var dasc;
                var dr;
                var bdg;
                var dc;
                var viv;
                var zone;

                if((puissance!="") && (valeur_veh!="") && (nbr_place!="")){

                               if($("input[name='dasc']").is(':checked')){
                                   $("input[name='dasc']").val('dasc');
                                   dasc = $("input[name='dasc']").val();
                                }else{
                                   $("input[name='dasc']").val('');
                                   dasc = $("input[name='dasc']").val();
                                }
                                   
                                if($("input[name='dr']").is(':checked')){
                                   $("input[name='dr']").val('dr');
                                   dr = $("input[name='dr']").val();
                                }else{
                                   $("input[name='dr']").val('');
                                   dr = $("input[name='dr']").val();   
                                } 
                               
                                if($("input[name='bdg']").is(':checked')){
                                   $("input[name='bdg']").val('bdg');
                                    bdg = $("input[name='bdg']").val();
                                }else{
                                   $("input[name='bdg']").val('');
                                    bdg = $("input[name='bdg']").val();                                   
                                }
                    
                                if($("input[name='dc']").is(':checked')){
                                   $("input[name='dc']").val('dc');
                                   dc = $("input[name='dc']").val();
                                }else{
                                   $("input[name='dc']").val('');
                                   dc = $("input[name='dc']").val();                                   
                                } 
                            
                                if($("input[name='viv']").is(':checked')){
                                   $("input[name='viv']").val('viv');
                                    viv = $("input[name='viv']").val();
                                }else{
                                    $("input[name='viv']").val('');
                                    viv = $("input[name='viv']").val();  
                                }
                    
                                if($("#nord").is(':checked')){
                                    zone = $("#nord").val();
                                }else{
                                    zone = $("#sud").val();
                                }
                                
                                
                  $.ajax({
                           type:"post",
                           url:"contrat/calculerDevisVisiteur.php",
                           data:{
                                'puissance':puissance,
                                'valeur_veh':valeur_veh,
                                'nbr_place':nbr_place,
                                'valeur':valeur,
                                'usage':usage,
                                'energie':energie,
                                'zone':zone,
                                'dasc':dasc,
                                'dr':dr,
                                'bdg':bdg,
                                'dc':dc,
                                'viv':viv,
                                'genre':genre,
                                'genre_2':genre_2,
                                'genre_3':genre_3,
                                'dure':dure
                               },
                          // dataType:"json",
                           success:function(devis){
                              
                              
                                $("#affichageDevis").text(devis+" DA");
                          

                           }
                       });  

                }else{
                    
                    $("input[name='dr']").val('');
                    $("input[name='dasc']").val('');
                    $("input[name='bdg']").val('');
                    $("input[name='dc']").val('');
                    $("input[name='viv']").val('');
                    $("#affichageDevis").text('');

                } 







        });

        $('#valeur,#usage,#energie,input[name="zone"],input[name="dasc"],input[name="dr"],input[name="bdg"],#genre,#genre_2,#genre_3,#dure,input[name="dc"],input[name="viv"]').change(function(){

            
            var puissance = $("#puissance").val();
            var valeur_veh = $("#valeur_veh").val();
            var nbr_place = $("#nbr_place").val();
            var valeur = $("#valeur").val();
            var usage = $("#usage").val();
            var energie = $("#energie").val();
            var dasc = $("input[name='dasc']").val();
            var dr = $("input[name='dr']").val();
            var bdg = $("input[name='bdg']").val();
            var dc = $("input[name='dc']").val();
            var viv = $("input[name='viv']").val();
            var genre = $("#genre").val();
            var genre_2 = $("#genre_2").val();
            var genre_3 = $("#genre_3").val();
            var dure = $("#dure").val();
            var dasc;
            var dr;
            var bdg;
            var dc;
            var viv;
            var zone
            if((puissance!="") && (valeur_veh!="") && (nbr_place!="")){

                               if($("input[name='dasc']").is(':checked')){
                                   $("input[name='dasc']").val('dasc');
                                   dasc = $("input[name='dasc']").val();
                                }else{
                                   $("input[name='dasc']").val('');
                                   dasc = $("input[name='dasc']").val();
                                }
                                   
                                if($("input[name='dr']").is(':checked')){
                                   $("input[name='dr']").val('dr');
                                   dr = $("input[name='dr']").val();
                                }else{
                                   $("input[name='dr']").val('');
                                   dr = $("input[name='dr']").val();   
                                } 
                               
                                if($("input[name='bdg']").is(':checked')){
                                   $("input[name='bdg']").val('bdg');
                                    bdg = $("input[name='bdg']").val();
                                }else{
                                   $("input[name='bdg']").val('');
                                    bdg = $("input[name='bdg']").val();                                   
                                }
                    
                                if($("input[name='dc']").is(':checked')){
                                   $("input[name='dc']").val('dc');
                                   dc = $("input[name='dc']").val();
                                }else{
                                   $("input[name='dc']").val('');
                                   dc = $("input[name='dc']").val();                                   
                                } 
                            
                                if($("input[name='viv']").is(':checked')){
                                   $("input[name='viv']").val('viv');
                                    viv = $("input[name='viv']").val();
                                }else{
                                    $("input[name='viv']").val('');
                                    viv = $("input[name='viv']").val();  
                                }
                
                                if($("#nord").is(':checked')){
                                    zone = $("#nord").val();
                                }else{
                                    zone = $("#sud").val();
                                }                    

              $.ajax({
                       type:"post",
                       url:"contrat/calculerDevisVisiteur.php",
                       data:{
                            'puissance':puissance,
                            'valeur_veh':valeur_veh,
                            'nbr_place':nbr_place,
                            'valeur':valeur,
                            'usage':usage,
                            'energie':energie,
                            'zone':zone,
                            'dasc':dasc,
                            'dr':dr,
                            'bdg':bdg,
                            'dc':dc,
                            'viv':viv,
                            'genre':genre,
                            'genre_2':genre_2,
                            'genre_3':genre_3,
                            'dure':dure
                           },
                      // dataType:"json",
                       success:function(devis){
                                       
                           $("#affichageDevis").text(devis+" DA");
                          // $("#affichageDevis").text().css('text-color','red');

                       }
                   });  

            }else{

                    $("input[name='dr']").val('');
                    $("input[name='dasc']").val('');
                    $("input[name='bdg']").val('');
                    $("input[name='dc']").val('');
                    $("input[name='viv']").val('');
                    $("#affichageDevis").text('');
                
            }


        });

        //$('input[name="dasc"]').change(function(){

 $("#connexion").click(function() {
     
       var pseudo = $("#pseudo").val();
       var password = $("#password").val();
    
        $.ajax({
               type:"post",
               url:"php/connexion.php",
               data:{
                    'pseudo':pseudo,
                    'password':password
                   },
              // dataType:"json",
               success:function(response){
                   
                   if(response == "not found"){
                       
                        Lobibox.alert('error', {
                           msg: "remplir tous les champs svp !"
                        });
                       
                   }else if(response == "wrong informations"){
                       
                      Lobibox.alert('error', {
                           msg: "verifier votre informations svp !"
                      });
                       
                   }else if(response == "client"){

                       window.location.replace("client.php");

                   }else if(response == "agent"){

                        window.location.replace("agent.php");
                       
                   }else if(response == "admin"){
                       
                       window.location.replace("admin.php");
                       
                   }else if(response == "clientB1"){
                       
                       window.location.replace("clientbloque.php");
                       
                   }else if(response == "clientB2"){
                       
                       window.location.replace("comptebloque.php");
                       
                   }else if(response == "suppression"){
                       
                      Lobibox.alert('error', {
                           msg: "verifier votre informations svp !"
                      });;
                       
                   }else{
                       alert(response);
                   }


               }
           });  
  });

  $("#annuler").click(function(){
     
       $("#pseudo").val('');
       $("#password").val('');
    
  });

        //});
    </script>
    
    
</body>
</html>
