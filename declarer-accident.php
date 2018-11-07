<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['client'] == true){
    
     
      $_SESSION['client'] = true;
    
      $titre = "Déclarer accident";

      include('client/menu-client.php');

       try {
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch (Exception $e) {

			die ('Erreur : ' . $e->getMessage());

      }
    
      $id_user = $_SESSION['id_user'];
      
      $res1 = $conn->query('SELECT id_client FROM client WHERE id_user="'.$id_user.'"');
      $res2 = $res1->fetch();
      $id_client = $res2['id_client'];
    
           
      $res1 = $conn->query('SELECT imat FROM vehicule  WHERE id_client="'.$id_client.'"');
        
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

<div class="container">
    <section class="accident">
        <h1 class="text-center">Déclarer nouveau accident</h1>
        
        <div class="insc-form  text-center">
            <form role="form" method="post" action="contrat/demandercontratvisiteur.php">
                <fieldset>
                    <legend class="text-center">Partie client</legend>
                
                <div class="form-group text-center">
                          <label for="contrat" class="lab-contrat">Sélectionnez un contrat :</label>
                          <select class="form-control contrat" id="immat_a" name="immat_a">
                            <?php
                               
                               while($res2 = $res1->fetch()){
                                   //$immat = $res2['imat'];
                               
                                  $immat = $res2['imat'];
                            ?>
                            <option value="<?php echo $immat ?>"><?php echo $immat; ?></option>
                            <?php
                               }
                            ?>       
                          </select>
                    </div>
                
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Où l'accident est survenu ?</label>
                      <input type="text" class="form-control" id="lieu" name="lieu">
                    </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Quand l'accident est survenu ?</label>
                      <input type="date" class="form-control" id="date_accid" name="date_accid" >
                    </div>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">D'où venez vous ?</label>
                      <input type="text" class="form-control" id="source" name="source">
                    </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Où allez vous </label>
                      <input type="text" class="form-control" id="dest" name="dest">
                    </div>
                </div>
                </div>
                
                </fieldset>
                
                <fieldset style="margin-top: 50px">
                    <legend class="text-center">Partie adversaire</legend>
                
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Nom conducteur</label>
                      <input type="text" class="form-control" id="nom_cond" name="nom_cond">
                    </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Prénom conducteur</label>
                      <input type="text" class="form-control" id="prenom_cond" name="prenom_cond">
                    </div>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Adresse conducteur</label>
                      <input type="text" class="form-control" id="adr_cond" name="adr_cond">
                    </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Num de pérmit</label>
                      <input type="text" class="form-control" id="num_permit" name="num_permit">
                    </div>
                </div>
                </div>
                    
                    <div class="form-group">
                      <label for="sel">Immatricule</label>
                      <input type="text" class="form-control" id="imat_b" name="imat_b" style="width:40%; margin: auto">
                    </div>
                                    
                </fieldset>
                
                <button style="width: 45%; float: right" type="button" class="btn btn-primary btn-lg btn-block"                         name="declarer" id="declarer">Declarer Accident</button>
                
                <a href="client.php"><button style="width: 45%; float: left" type="button" class="btn btn-danger 
                    btn-lg btn-block">Annuler</button></a>
                
            </form>
        </div>
        
    </section>
</div>   
    

    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/declarer-accident.js"></script>
    <script>new WOW().init();</script>
<script>
/*--------------------------function---------------------*/       
    function validateImmat(immat){
         if(immat.match('^[0-9]{4}[0-9]{3}[1-48]{2}$')!=null){
            return true
        }else{   
            return false;
        }
    }
/*--------------------------function---------------------*/  
    function validatePermit(nPermit){
        if(nPermit.match('^[0-9]{10}$')!=null){
            return true;
        }else{ 
            return false;
        }
    }
/*--------------------------function---------------------*/  
    function validateAccident(dateAccid){
        return true;
    }
    
      $('#num_permit').keyup(function(){  
          if(validatePermit($('#num_permit').val())==false){
                   $('#num_permit').css('border-color','red');
        
          }else{
                   $('#num_permit').css('border-color','');
          }      
      });
    
      $('#imat_b').keyup(function(){  
          if(validateImmat($('#imat_b').val())==false){
                   $('#imat_b').css('border-color','red');
          }else{
                   $('#imat_b').css('border-color','');
          }      
      });
    
    
$("#declarer").click(function(){
   
if(($("#lieu").val()!="")&&($("#date_accid").val()!="")&&($("#dest").val()!="")&&($("#nom_cond").val()!="")&&($("#prenom_cond").val()!="")&&($("#adr_cond").val()!="")&&($("#num_permit").val()!="")
&&($("#imat_b").val()!="")&&($("#source").val()!="")){      
   
    var lieu = $("#lieu").val();
    var date_accid = $("#date_accid").val();
//    alert(date_accid);
    var source = $("#source").val();
    var dest = $("#dest").val();
    var nom_cond = $("#nom_cond").val();
    var prenom_cond = $("#prenom_cond").val();    
    var adr_cond = $("#adr_cond").val();
    var num_permit = $("#num_permit").val();
    var imat_b = $("#imat_b").val();
    var immat_a = $("#immat_a").val(); 
    var imat_bVerif = 1;
    var num_permitVerif = 1;
    var date_accidVerif = 1;

    if(!validateImmat(imat_b)){
        $('#imat_b').css('border-color','red');
        imat_bVerif = 0;

    }

    if(!validatePermit(num_permit)){
        $('#num_permit').css('border-color','red');
        num_permitVerif = 0;
    }

    if(!validateAccident(date_accid)){
        date_accidVerif = 0;
    }

    if(date_accidVerif==1 && num_permitVerif==1 && imat_bVerif==1){

                   
                      $.ajax({
                          
                           type:"post",
                           url:"accident/validationAccident.php",
                           data:
                               {
                                'lieu':lieu,
                                'date_accid':date_accid,
                                'source':source,
                                'dest':dest,
                                'nom_cond':nom_cond,
                                'prenom_cond':prenom_cond,
                                'adr_cond':adr_cond,
                                'num_permit':num_permit,
                                'imat_b':imat_b,
                                'immat_a':immat_a
                               },
                          // dataType:"json",
                           success:function(reponse){
                              //  alert(reponse);
                                if(reponse=="ok"){
                                    
                                      Lobibox.notify('success', {
                                          title: 'success',
                                          msg: 'Votre declaration a été sauvegardée.'
                                       });
                                   
                                     // window.location.replace("client.php");
                                          window.setTimeout(function(){

                                                 // Move to a new location or you can do something else
                                                 window.location.href = "client.php";

                                          }, 5000);


                                 }else if(reponse=="end"){
                                     
                                        
                                    Lobibox.alert('error', {
                                        msg: "Désole Votre contrat a été expirée. "
                                    });
                                     
                                 }else if(reponse=="exist"){
                                     
                                        
                                    Lobibox.alert('error', {
                                        msg: "Vous avez deja declarer l'accident pour ce vehicule."
                                    });
                                     
                                 }else if(reponse=="nvalide"){
                                     
                                     Lobibox.alert('error', {
                                        msg: "Désole il faut valider votre contrat pour ce vehicule chez l'agence."
                                     });                                     
                                     
                                 }else{
                                     
                                     alert(reponse);
                                     
                                 }
                            
                                
                           },error: function(e){
                                       alert('Error: ' + e);
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
<?php

include('client/footer-client.php');

?>

</body>

<style>
    .accident {
        min-height: 1000px;
        background-color: #E9E9E9;
        padding-top: 80px
    }
    .insc-form{
        max-width: 80%;
        margin: auto
    }
    .accident h1{margin-bottom: 50px}
    .accident .lab-contrat, .accident .contrat{
        width: 45%;
        display: inline
    }
    legend {font-family: 'Poppins';
    border-bottom:  1px solid #AAA;
    border-color: #E41B17
    }
    .insc-form button {
        border-radius: 0px;
        margin-top: 40px
    }
</style>
    
</html>