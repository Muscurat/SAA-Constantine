<?php


session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['client'] == true){
    

    $titre = "Tableau de board";
 
    include('client/menu-client.php');

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

$data = $conn->query('SELECT user.nom,user.prenom,user.email,user.pseudo,user.num_tel,user.sexe,
client.adr,client.prof,client.num_permit,client.date_permit,client.date_naiss
FROM user
INNER JOIN client ON user.id_user=client.id_user WHERE user.id_user="'.$_SESSION["id_user"].'"');
$data = $data->fetch();

$date_permit = $data['date_permit'];
$date_naiss = $data['date_naiss'];


?>
    
                            <!-- End navbar -->
                                <!-- Start header -->
<div class="container">
    <div class="header-container">
        <h1 class="text-center">Modifier le profile</h1>
        <div class="calcul-devis text-center">
            
            <form role="form" enctype="multipart/form-data" method="post" action="editProfil.php">
                
            <div class="form-group">
                  <label for="avatar">Changer la photo de profil :</label>
                <input type="file" class="form-control" id="avatar" name="avatar"> </br>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="nom">Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $data['nom']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="prenom">Prénom</label>
                      <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $data['prenom']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                      <label for="pseudo">Nom d'utilisateur</label>
                      <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php echo $data['pseudo']; ?>">
            </div>
            <a href="#"><p class="lead" id="change"  data-toggle="modal" data-target="#connModal">* Changer le mot de passe *</p></a>
            <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>">
            </div>
            <div class="form-group">
                      <label for="tel">Numéro de téléphone</label>
                      <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $data['num_tel']; ?>">
            </div>
                    
            <div class="form-group dat">
                <label for="date">Date naissance</label>
                <input type="date" class="form-control" id="date_naiss" name="date_naiss" value="<?php echo $date_naiss; ?>">
            </div>
                <div class="form-group" style="margin-top: 15px">
                      <label for="sexe">Sexe</label>
                          <select class="form-control" id="sexe" name="sexe" value="">
                            <option selected="selected" value="">Sélectionnez...</option>
                            <option value="homme" id="homme">Homme</option>
                            <option value="femme" id="femme">Femme</option>
                          </select>
                      <input type="hidden" id="check" value="<?php echo $data['sexe']?>"/>
                </div>
            <div class="form-group">
                      <label for="adr">Adresse</label>
                      <input type="text" class="form-control" id="adr" name="adr" value="<?php echo $data['adr']; ?>">
            </div>
            <div class="form-group">
                      <label for="profession">Profession</label>
                      <input type="text" class="form-control" id="profession" name="profession" value="<?php echo $data['prof']; ?>">
            </div>
            <div class="form-group">
                      <label for="num_permit">Numéro de permit</label>
                      <input type="text" class="form-control" id="num_permit" name="num_permit" value="<?php echo $data['num_permit']; ?>" disabled>
            </div>
            
            <div class="form-group dat">
                <label for="date">Date Permit</label>
                <input type="date" class="form-control" id="date_permit" name="date_permit" value="<?php echo $date_permit; ?>">
            </div>
                
            <button type="submit" class="btn btn-primary btn-lg btn-block" id="save">Enregistrer</button>
            
        </form>
            
        </div>   
        
    </div>
</div>
                            <!-- End header -->

<!-- Start connexion modal -->
    
<div id="connModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content text-center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="annuler">&times;</button>
          <i class="fa fa-key fa-4x"></i>
      </div>
      <div class="modal-body">
        
            <form role="form" id="blabla">
              <div class="form-group">
                  <input type="password" class="form-control" id="passwordOld" name="passwordOld" placeholder="Mot de passe actuelle">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Nouveau mot de passe">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" id="password2" name="password2" placeholder="Retapper le nouveau mot de passe">
              </div>
             
              <button type="button" class="btn btn-primary btn-lg" id="changePassword"
                      >Changer</button>
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" 
                      id="annuler">Annuler</button>
            </form>
          
      </div>
    
    </div>

  </div>
</div>
    
<!-- End inscrire modal -->
    
    
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script>

        if($("#check").val()=="homme"){
            $("#homme").prop("selected",true);
        } else{
            $("#femme").prop("selected",true);
        }
/*-----------------------------function---------------------------*/
        
//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		

		
		var fsize = $('#avatar')[0].files[0].size; //get file size
		var ftype = $('#avatar')[0].files[0].type; // get file type
		

		//allow file types 
		switch(ftype)
        {
			case 'image/jpg':  
            case 'image/png':    
			case 'image/jpeg':
			case 'image/gif':
                break;
            default:
                //$("#output").html("<b>"+ftype+"</b> Unsupported file type!");
                //$('#avatar').css('border-color','red');
				
            Lobibox.alert('error', {
                msg: "Il faut choisir un fichier de type IMAGE !. "
            });
                return false;
        }
		
		//Allowed file size is less than 5 MB (1048576)
		if(fsize>200000) 
		{
			/*$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be 
            less than 5 MB.");*/
            //$('#avatar').css('border-color','red');
            
            Lobibox.alert('error', {
                msg: "Désole le size de fichier ne depasse pas 200 KO !. "
            });
			return false
		}
        
        return true;
				
	}else{
        
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		//$("#output").html("Please upgrade your browser, because your current browser lacks some new features we 
          //                need!");
		    Lobibox.alert('error', {
                msg: "Désole mis-a-jourer votre navigateur svp !. "
            });
        return false;
	}
}
        
//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}
        
        
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

    function validateNpermit(nPermit){
            if(nPermit.match('^[0-9]{10}$')!=null){
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
      $('#num_permit').keyup(function(){  
          if(validateNpermit($('#num_permit').val())==false){
                   $('#num_permit').css('border-color','red');
          }else{
                   $('#num_permit').css('border-color','');
          }      
      });

    $("#password2").keyup(function(){
     
     if($("#password").val()!=$("#password2").val()){
         $("#password2").css('border-color','red');
     }else{
          $("#password2").css('border-color','');
     }
     
 });
    
                
 $("#changePassword").click(function(){
    
          if(($("#password").val()!="")&&($("#password2").val()!="")&&($("#passwordOld").val()!="")){
              
                 
     verifPassword = 1;
     if($("#password").val()!=$("#password2").val()){
         $("#password2").css('border-color','red');
         verifPassword = 0;
     }
     
              var password = $("#password").val();
              var password2 = $("#password2").val();
              var passwordOld = $("#passwordOld").val();
              
              if(verifPassword==1){
                      
                      $.ajax({
                          
                           type:"post",
                           url:"client/validationPassword.php",
                           data:{
                                'password':password,
                                'passwordOld':passwordOld
                               },
                          // dataType:"json",
                           success:function(data){
                               
                               if(data=="ok"){
                                   
                                  
                                  Lobibox.notify('success', {
                                      title: 'success',
                                      msg: 'votre mot de passe a été modifiée avec success.'
                                  });
                                   
                                   
                                   
                                   
                               }else if(data=="not"){
                                   
                               Lobibox.alert('error', {
                                  msg: "votre ancien mot de passe est incorrect."
                               });
                                   
                               }else{
                                   
                                   alert(data);
                                   
                               }

                           }
                       });
              }
              
          }else{
              
                   Lobibox.alert('error', {
                          msg: "remplir tous les champs svp !"
                   });
              
          }
    

    
    
});
        
$("#save").click(function(){
    
    if(($("#tel").val()!="")&&($("#email").val()!="")&&($("#nom").val()!="")&&($("#prenom").val()!="")&&($("#pseudo").val()!="")&&($("#sexe").val()!="")&&($("#adr").val()!="")&&($("#profession").val()!="")&&($("#date_naiss").val()!="")
       &&($("#date_permit").val()!="")){
        
        verifTel = 1;
        verifEmail = 1;
        verifPermit = 1;
        
        if(!validateEmail($("#email").val())){

               verifEmail=0; 
               $("#email").css('border-color','red');

        }
          
        if(!validatePhone($("#tel").val())){

              verifTel=0; 
              $("#tel").css('border-color','red');      
        }    
        if(!validateNpermit($("#num_permit").val())){

              verifPermit=0; 
              $("#num_permit").css('border-color','red');      

        }
        
        if(verifTel==1 && verifPermit==1 && verifEmail==1){
                    
            if(beforeSubmit()==true){
                return true;
            }else{
                return false;
            }
            
        }else{
            return false;
        }
        
        
    }else{
        
           Lobibox.alert('error', {
                  msg: "remplir tous les champs svp !"
           });
           return false;
    }
    
    
});       

</script>

</body>

<style>
    
.calcul-devis{
    width: 900px;
    margin: auto;
    background-color: transparent;
    border-radius: 20px;
    border: 3px solid #337ab7;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-top: 40px;
    padding: 40px 80px
    }
    .btn-group-lg>.btn, .btn-lg{
        margin-top: 30px;
        margin-left: 220px;
        width: 300px;
        border-radius: 0px
    }
    
    .dat{
        width: 30%;
        margin: auto
    }
    
</style>

<?php

include('client/footer-client.php');

?>

</html>