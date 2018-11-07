<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && 
   ((!empty($_SESSION['agent'])) || (!empty($_SESSION['admin'])))){
     
      
 if(!empty($_SESSION['agent'])){
     
           $titre = "Tableau de board";

     include_once('agent/menu-agent.php');
     
 }else{
     
     $titre = "Tableau de board";

     include_once('admin/menu-admin.php');
     
 }

}else if(!empty($_SESSION['comptebloque'])){
    
    header('location:comptebloque.php');
    
}else if(!empty($_SESSION['clientbloque'])){
    
    header('location:clientbloque.php');
    
}else if(!empty($_SESSION['client'])){
    
    header('location:client.php');
    
}else if(!empty($_SESSION['admin'])){
    
    header('location:admin.php');
    
}else{
    
    header('location:index.php');
    
}
include ('connexion.php');

$reponse = $conn->query('SELECT user.nom, user.prenom, user.num_tel, user.email, user.sexe, client.date_naiss, client.adr, client.prof, client.num_permit, client.date_permit, client.id_client
FROM user
INNER JOIN client ON user.id_user = client.id_user');

?>
    
                            <!-- End navbar -->
    
<div class="container list-contrat">
    
    <div class="panel panel-primary">
        <div class="panel-heading text-center">List des clients</div>
    </div>
    <form>
        <input type="text" name="search" placeholder="Search.." id="search">
    </form>
    
    <table class="table table-striped table-hover text-center" id="table">
        
        <tr class="info">
            <td>Nom</td>
            <td>Prénom</td>
            <td>Date naissance</td>
            <td>Adresse</td>
            <td>Num.Téléphone</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        
        <?php while($donnees = $reponse->fetch()) { ?>
        
        <tr id="ser">
            <td id="nom<?php echo $donnees['id_client']; ?>"><?php echo $donnees['nom']; ?></td>
            <td id="prenom<?php echo $donnees['id_client']; ?>"><?php echo $donnees['prenom']; ?></td>
            <td id="date_naiss<?php echo $donnees['id_client']; ?>"><?php echo $donnees['date_naiss']; ?></td>
            <td id="adr<?php echo $donnees['id_client']; ?>"><?php echo $donnees['adr']; ?></td>
            <td id="num_tel<?php echo $donnees['id_client']; ?>"><?php echo $donnees['num_tel']; ?></td>
            <td><a href="#" data-toggle="modal" data-target="#info-contrat" class="details" id="<?php echo $donnees['id_client']; ?>">Détails</a></td>
            <td><a href="#" data-toggle="tooltip" title="Blocker"><i class="fa fa-lock bloquer" id="<?php echo $donnees['id_client']; ?>"></i></a></td>
            <td><a href="#" data-toggle="tooltip" title="Déblocker"><i class="fa fa-unlock debloquer" id="<?php echo $donnees['id_client']; ?>"></i></a></td>
        </tr>
        
        <input type="hidden" id="email<?php echo $donnees['id_client']; ?>" value="<?php echo $donnees['email']; ?>"/>
        <input type="hidden" id="sexe<?php echo $donnees['id_client']; ?>" value="<?php echo $donnees['sexe']; ?>"/>
        <input type="hidden" id="prof<?php echo $donnees['id_client']; ?>" value="<?php echo $donnees['prof']; ?>"/>
        <input type="hidden" id="num_permit<?php echo $donnees['id_client']; ?>" value="<?php echo $donnees['num_permit']; ?>"/>
        <input type="hidden" id="date_permit<?php echo $donnees['id_client']; ?>" value="<?php echo $donnees['date_permit']; ?>"/>
        
        <?php } ?>
    </table>
    
</div>

<!-- Start Information contrat -->
    
<div id="info-contrat" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CCC">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center"><i class="fa fa-user fa-lg" style="margin-right: 8px"></i> Client</h2>
      </div>    
    
        <div class="modal-body" style="font-weight: bold">
            
            <table style="margin: auto; width: 100%">
                <tr>
                    <td><p class="lead">Nom :</p></td>
                    <td><p class="lead" id="nom_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Prénom :</p></td>
                    <td><p class="lead" id="prenom_det"></p></td>
                </tr>
                
                <tr>
                    <td><p class="lead">Date de naissance :</p></td>
                    <td><p class="lead" id="date_naiss_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Adresse :</p></td>
                    <td><p class="lead" id="adr_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Numéro de téléphone :</p></td>
                    <td><p class="lead" id="num_tel_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Email :</p></td>
                    <td><p class="lead" id="email_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">sexe :</p></td>
                    <td><p class="lead" id="sexe_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Prodession :</p></td>
                    <td><p class="lead" id="prof_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Numéro de permit :</p></td>
                    <td><p class="lead" id="num_permit_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Date de permit :</p></td>
                    <td><p class="lead" id="date_permit_det"></p></td>
                </tr>
            </table>
            

        </div>
    </div>
    </div>
</div>
    
<!-- End Information contrat -->
    
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/sendMail.js"></script>
    <script>new WOW().init();</script>
    <script>$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>

    <script>

        
        
        $("input[type=hidden]").hide();
        
        $('.details').click(function(e){
         var id=e.target.id;
         var id_client = id; 
            
            
         
        var email = $('#email'+id).val();
        var sexe = $('#sexe'+id).val();
        var prof = $('#prof'+id).val();
        var num_permit = $('#num_permit'+id).val();
        var date_permit = $('#date_permit'+id).val();
        
        $('#nom_det').text($('#nom'+id).text());
        $('#prenom_det').text($('#prenom'+id).text());
        $('#date_naiss_det').text($('#date_naiss'+id).text());
        $('#adr_det').text($('#adr'+id).text());
        $('#num_tel_det').text($('#num_tel'+id).text());
        $('#email_det').text(email);
        $('#sexe_det').text(sexe);
        $('#prof_det').text(prof);
        $('#num_permit_det').text(num_permit);
        $('#date_permit_det').text(date_permit);
        });
        
        $('.bloquer').click(function(e){
            var id=e.target.id;
            var id_client = id;
            //alert(bloquer);
                        
            
            $.ajax({
                          
                           type:"post",
                           url:"client/bloquerClient.php",
                           data:
                               {
                                'id_client':id_client
                               },
                            success:function(reponse){
                                
                                if(reponse=="ok"){
                                    
                                     Lobibox.notify('success', {
                                          title: 'success',
                                          msg: 'Client est bloqué successivement !'
                                      });
                                    
                                } else if(reponse=="bloquer") {
                                    
                                   Lobibox.alert('error', {
                                      msg: "Client est déja bloqué !"
                                   });
                                    
                                }
                                
                            },error: function(e){
                                       alert('Error: ' + e);
                            }
                
        });
            });
        
        $('.debloquer').click(function(e){
            var id=e.target.id;
            var id_client = id;
            
            $.ajax({
                          
                           type:"post",
                           url:"client/debloquerClient.php",
                           data:
                               {
                                'id_client':id_client
                               },
                            success:function(reponse){
                                
                                if(reponse=="ok"){
                                    
                                      Lobibox.notify('success', {
                                          title: 'success',
                                          msg: 'Client est débloqué successivement !'
                                      });
         
                                } else if(reponse=="debloquer") {
                                    
                                    Lobibox.alert('error', {
                                       msg: "Client n'est pas bloqué !"
                                   });
                                    
                                }
                                
                            },error: function(e){
                                       alert('Error: ' + e);
                            }
                
        });
            });

        
                           var $rows = $('#table #ser');

                             $('#search').keyup(function() { 
    
                          var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
                          reg = RegExp(val, 'i'),text;
    
                          $rows.show().filter(function() {
                                 text = $(this).text().replace(/\s+/g, ' ');
                                 return !reg.test(text);
                          }).hide();
                    });        

    </script>
    
</body>

<style>
    .modal-content .btn-primary, .modal-content .btn-danger{
        width: 95%
    }
    
    input[type=text] {
    color: #999;
    margin-bottom: 20px;
    margin-left: 450px;
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #337ab7;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 20%;
}
</style>
    
</html>