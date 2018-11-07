
<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && 
((!empty($_SESSION['client'])) || (!empty($_SESSION['clientbloque'])) || (!empty($_SESSION['comptebloque'])))){
     
      
 if(!empty($_SESSION['client'])){
     
           $titre = "Tableau de board";

     include_once('client/menu-client.php');
     
 }else{
     
     $titre = "Tableau de board";

     include_once('client/menu-bloque.php');
     
 }


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
    <div class="header-container">
        <h1 class="text-center">Contactez-Nous</h1>
        <div class="calcul-devis text-center">
            <div class="client-contact">
                <form role="form" action="calcul_devis_vis.php" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="nomprenom" 
                               placeholder="Nom et Prénom">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="email"
                               placeholder="Email Adresse">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="phone"
                               placeholder="Numéro de téléphone">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="7" id="comment"
                                  class="form-control"></textarea>
                    </div>
                    
                    <button type="button" class="btn btn-danger btn-lg" id="envoyerMail">Contactez-Nous</button>

                </form>
            </div>
            
            <div class="cover-contact"></div>
            
        </div>   
        
    </div>
</div>
                            <!-- End header -->

<?php

include('client/footer-client.php');

?>
    
<script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
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



</script>
</body>

<style>
    
.calcul-devis{
    width: 900px;
    margin: auto;
    background-color: #FFF;
    border-radius: 20px;
    border: 3px solid #337ab7;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-top: 40px;
    padding: 40px 30px;
    overflow: hidden
    }
    .btn-group-lg>.btn, .btn-lg{
        margin: 30px 30px 0px;
        width: 300px;
        border-radius: 0px
    }
    
    .client-contact{
        background-color: transparent;
        width: 500px;
        height: 500px;
        float: right;
        padding: 20px 0px
    }
    
    .cover-contact{
        width: 300px;
        height: 500px;
        float: left;
        background: url('photos/contact_us.png');
        opacity: 0.5
    }
    .input-lg {border-radius: 0px}
    
</style>
  
</html>