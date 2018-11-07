<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['client'] == true){
    

    $titre = "Boite Message";

    include('client/menu-client.php');
    header('Content-Type: text/html; charset=UTF-8');

    
}else if(!empty($_SESSION['comptebloque'])){
    
    header('location:comptebloque.php');
    
}else if(!empty($_SESSION['clientbloque'])){
    
    header('location:clientbloque.php');
    
}else if(!empty($_SESSION['agent'])){
    
    header('location:agent.php');
    
}else if(!empty($_SESSION['admin'])){
    
    header('location:admin.php');
    
}else{
    
    header('location:index.php');
    
}


?>
    
                            <!-- End navbar -->
    
                            <!-- Start header -->
<div class="container">
    
    <div class="header-container text-center">
        
        <div class="message text-center">
            
            <?php while ($donnees = $reponse->fetch()) { ?>
            <div class="object text-center">
                <p class="lead"><a href="#" data-toggle="modal" data-target="#aff-msg" class="details" id="<?php echo $donnees['id_message'] ; ?>"><?php echo $donnees['object'] ; ?></a></p>
            </div>
            
            <input type="hidden" id="msg<?php echo $donnees['id_message'] ; ?>" value="<?php echo $donnees['message'] ; ?>">
            <input type="hidden" id="obj<?php echo $donnees['id_message'] ; ?>" value="<?php echo $donnees['object'] ; ?>">
            
            <?php
            }
            ?>
        
        </div>
        
        <div class="aucun-msg"><p class="lead">Aucun message existe dans votre boite !</p></div>
        
    </div>

</div>  

<!-- Start Information contrat -->
    
<div id="aff-msg" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CCC">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center"></h2>
      </div>    
    
        <div class="modal-body" style="font-weight: bold">
            
            <p class="lead" id="msg_det"></p>
            
        </div>
        
      </div>
    </div>
</div>
                            <!-- End header -->
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>

<script>

        $("input[type=hidden]").hide();
    
        
        $('.details').click(function(e){
         var id=e.target.id;
         var id_message = id; 
            
         var message = $('#msg'+id).val();
         var object = $('#obj'+id).val();
         $('.modal-title').text(object);
         $('#msg_det').text($('#msg'+id).val());
            
            $.ajax({
                type:"post",
                   url:"readMessage.php",
                   data: {
                       'id_message': id
                   },
                 success:function(reponse){
                     
                     if(reponse=="ok"){
                         
                     } else {
                         alert(reponse);
                     }
                 
             },error: function(e){
                                       alert('Error: ' + e);
                                    }
             });
            
        });
    
        
</script>


<!-- Start contact info -->
<?php

include('client/footer-client.php');

?>
    
</html>