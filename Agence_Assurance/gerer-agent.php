<?php



session_start();
 

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['admin'] == true){
     
      
     $titre = 'Gérer agent';

     include_once('admin/menu-admin.php');

    
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

       try {
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch (Exception $e) {

			die ('Erreur : ' . $e->getMessage());

      }

$role = 1;
$res = $conn->query('SELECT nom,prenom,pseudo,password,email,num_tel,sexe,id_user FROM user 
WHERE role='.$role);


?>


<div class="container list-contrat">
    
    <div class="list-agent">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">List des agents</div>
        </div>

        <table class="table table-striped table-hover">

            <tr class="info">
                <td>Agent</td>
                <td>email</td>
                <td>Num téléphone</td>
                <td>sexe</td>
                <td></td>
                <td></td>
            </tr>
            <?php    
               
              while($data=$res->fetch()){
               
                $id_user = $data['id_user'];  
            
            ?>
            <tr>
                <td id="nomPrenom<?php echo $id_user; ?>"><?php echo $data['nom'].' '.$data['prenom']; ?></td>
                <td id="email<?php echo $id_user; ?>"><?php echo $data['email']; ?></td>
                <td id="tel<?php echo $id_user; ?>"><?php echo $data['num_tel']; ?></td>
                <td id="sexe<?php echo $id_user; ?>"><?php echo $data['sexe']; ?></td>
                <td><button class="modifier" id="modifier<?php echo $id_user; ?>"
                            onclick="modifier1(<?php echo $id_user; ?>)">
                    <i class="fa fa-wrench fa-lg"></i></button></td>
                <td><button class="supprimer" id="supprimer<?php echo $id_user; ?>" 
                            onclick="supprimer(<?php echo $id_user; ?>)">
                    <i class="fa fa-remove fa-lg"></i></button></td>
            </tr>
            
            <input type="hidden" id="nom<?php echo $id_user; ?>" value="<?php echo $data['nom']; ?>"/>
            <input type="hidden" id="prenom<?php echo $id_user; ?>" value="<?php echo $data['prenom']; ?>"/>
            <input type="hidden" id="pseudo<?php echo $id_user; ?>" value="<?php echo $data['pseudo']; ?>"/>
            <input type="hidden" id="password<?php echo $id_user; ?>" value="<?php echo $data['password']; ?>"/>
           
            <?php
              }
            ?>

        </table>
    </div>
    
    <div class="gerer-form text-center">
        
        <h2>Ajouter/Modifier agent</h2>
        
        <form role="form">
            
            <div class="form-group">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="pseudo" name="pseudo" 
                       placeholder="Nom d'utilisateur">
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="tel" name="tel" placeholder="Num de téléphone">
            </div>
            
            <div class="form-group">
                  <select class="form-control" id="sexe" name="sexe">
                    <option selected="selected" value="">Sexe..</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                  </select>
            </div>
            
             <input type="hidden" id="user" value=""/>
            
            <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary btn-lg btn-block" name="ajouter" id="ajouter">
                    Ajouter</button>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-success btn-lg btn-block" name="modifierF" id="modifierF"
                         onclick="modifier2()">
                    Modifier</button>
            </div> 
            </div>
        
        </form>
    
    </div>

</div>

<script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script>
        
        //--------------------------function---------------------------//
        function validateEmail(email) {
            var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            if (filter.test(email)) {
            return true;
            }else {
            return false;
            //}
            }
         }
        
        //-------------------------------------------------------------//
            function validatePhone(phone){
         if(phone.match('^[0]{1}[5-7]{1}[0-9]{8}$')!=null){
                return true;
            }else{   
                return false;
            }
        
    }
        
 
      $('#email').keyup(function(){  
          if(validateEmail($('#email').val())==false){
              $('#email').css('border-color','red');
          }else{
              $('#email').css('border-color','');
          }      
      });
        
      $('#tel').keyup(function(){  
          if(validatePhone($('#tel').val())==false){
                   $('#tel').css('border-color','red');
          }else{
                   $('#tel').css('border-color','');
          }      
      });        

                
function supprimer(e){
    
    
    var id=e;  
    var password = $('#password'+id).val();
    var pseudo = $('#pseudo'+id).val();
    
                Lobibox.confirm({
                    msg: "Voulez vouz supprimer cet agent ?",
                    callback: function ($this, type) {
                        if (type === 'yes') {
       
                            $.ajax({

                                   type:"post",
                                   url:"agent/supprimerAgent.php",
                                   data:{
                                        'password':password,
                                         'pseudo':pseudo
                                       },
                                   // dataType:"json",
                                   success:function(data){

                                      if(data=="ok"){
                                         window.location.replace("gerer-agent.php");                     
                                      }else{
                                         alert(data);
                                     }
                                   }

                               });
                        } 
                    }
                });
    
}

        
function modifier1(e){
    
    var id=e;    
    var nom = $('#nom'+id).val();
    var prenom = $('#prenom'+id).val();
    var password = $('#password'+id).val();
    var pseudo = $('#pseudo'+id).val();
    var email = $('#email'+id).text();
    var sexe = $('#sexe'+id).text();
    var tel = $('#tel'+id).text();
    var id_user = id;

    $('#nom').val(nom); 
    $('#prenom').val(prenom); 
    $('#pseudo').val(pseudo); 
    $('#password').val(password); 
    $('#email').val(email); 
    $('#tel').val(tel); 
    $('#sexe').val(sexe); 
    $('#user').val(id_user);
}
        
function modifier2(){
  
    
    if(($("#nom").val()!="")&&($("#prenom").val()!="")&&($("#email").val()!="")&&($("#tel").val()!="")&& 
   ($("#sexe").val()!="")&&($("#pseudo").val()!="")&&($("#password").val()!="")){ 

        
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var email = $("#email").val();
        var tel = $("#tel").val();
        var sexe = $("#sexe").val();
        var pseudo = $("#pseudo").val();
        var password = $("#password").val();
        var id_user = $('#user').val();
        
        verifTel = 1;
        verifEmail = 1;
        
        if(!validateEmail($("#email").val())){

               verifEmail=0; 
               $("#email").css('border-color','red');

        }
          
        if(!validatePhone($("#tel").val())){

              verifTel=0; 
              $("#tel").css('border-color','red');      
        }  
       
         if(verifEmail==1 && verifTel==1){
             
                 
                      $.ajax({
                          
                           type:"post",
                           url:"agent/modifierAgent.php",
                           data:{
                                'nom':nom,
                                'prenom':prenom,
                                'pseudo':pseudo,
                                'password':password,
                                'sexe':sexe,
                                'tel':tel,
                                'email':email,
                                'id_user':id_user
                               },
                           // dataType:"json",
                           success:function(data){
                               
                               if(data=="exist"){
                                     
                                    Lobibox.alert('error', {
                                    msg: "Modifier le mot de passe et le password de l'agent."
                                    });
                                   
                                 //  window.location.replace("index.php");
                               }else if(data=="ok"){
                                   
                                     Lobibox.notify('success', {
                                          title: 'success',
                                          msg: 'agent modifiée avec success.'
                                      });
                                   
                                          // window.location.replace("client.php");
                                     window.setTimeout(function(){
                                          // Move to a new location or you can do something else
                                        window.location.href = "gerer-agent.php";

                                     }, 5000);
                                   
                                    
                               }else{
                                   alert(data);
                               }
                           }
                       }); 
             
         }else{
             
         }

}else{
    
}   
    
    
}        

        
$('#ajouter').click(function(){
   
    if(($("#nom").val()!="")&&($("#prenom").val()!="")&&($("#email").val()!="")&&($("#tel").val()!="")&& 
   ($("#sexe").val()!="")&&($("#pseudo").val()!="")&&($("#password").val()!="")){ 
    
                
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var email = $("#email").val();
        var tel = $("#tel").val();
        var sexe = $("#sexe").val();
        var pseudo = $("#pseudo").val();
        var password = $("#password").val();
        var id_user = $('#user').val();
        
        verifTel = 1;
        verifEmail = 1;
        
        if(!validateEmail($("#email").val())){

               verifEmail=0; 
               $("#email").css('border-color','red');

        }
          
        if(!validatePhone($("#tel").val())){

              verifTel=0; 
              $("#tel").css('border-color','red');      
        }
        
        if(verifEmail==1 && verifTel==1){
             
                 
                      $.ajax({
                          
                           type:"post",
                           url:"agent/ajouterAgent.php",
                           data:{
                                'nom':nom,
                                'prenom':prenom,
                                'pseudo':pseudo,
                                'password':password,
                                'sexe':sexe,
                                'tel':tel,
                                'email':email,
                                'id_user':id_user
                               },
                           // dataType:"json",
                           success:function(data){
                               
                               if(data=="exist"){
                                     
                                    Lobibox.alert('error', {
                                    msg: "Modifier le mot de passe et le password de l'agent."
                                    });
                                   
                                 //  window.location.replace("index.php");
                               }else if(data=="ok"){
                                   
                                     Lobibox.notify('success', {
                                          title: 'success',
                                          msg: 'agent ajoutée avec success.'
                                      });
                                   
                                          // window.location.replace("client.php");
                                     window.setTimeout(function(){
                                          // Move to a new location or you can do something else
                                        window.location.href = "gerer-agent.php";

                                     }, 5000);
                                   
                                    
                               }else{
                                   alert(data);
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


</script>

</body>

<style>
    .list-contrat{min-height: 800px}
    
    .list-agent {width: 59%; float: right}
    .list-agent button {border: none; background-color: transparent}
    
    .gerer-form{
        width:40%;
        margin-top: 120px; 
        border: 3px solid #337ab7;
        padding: 10px 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    
    .gerer-form h2{
        margin-bottom: 30px;
        color: #666
    }
    
    .gerer-form input, .gerer-form select{
        width: 90%;
        margin: auto
    }
    .gerer-form button{
        margin-top: 20px;
        border-radius: 0px
    }
</style>

</html>
