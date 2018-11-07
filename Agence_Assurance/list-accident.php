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
    
       try {
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch (Exception $e) {

			die ('Erreur : ' . $e->getMessage());

      }
    
    $res = $conn->query('SELECT accident.id_accident,     
    accident.id_contrat,accident.source,accident.dest,accident.lieu,
    accident.date_accid,accident.nom_cond,accident.prenom_cond,accident.adr_cond,accident.num_permit,
    accident.imat_b,vehicule.imat,vehicule.num_chass,vehicule.id_vehicule,client.id_client,user.nom,user.prenom 
    FROM user
    INNER JOIN client ON user.id_user=client.id_user
    INNER JOIN vehicule ON client.id_client=vehicule.id_client
    INNER JOIN contrat ON vehicule.id_vehicule=contrat.id_vehicule
    INNER JOIN accident ON contrat.id_contrat=accident.id_contrat
    WHERE accident.devis_rem IS NULL');

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



?>

<div class="container list-contrat">
    
    <div class="panel panel-primary">
        <div class="panel-heading text-center">List des accidents à traiter</div>
    </div>
    
    <table class="table table-striped table-hover text-center">
        
        <tr class="info">
            <td>Client</td>
            <td>Adversaire</td>
            <td>Num.chassis</td>
            <td>Date</td>
            <td>Lieu</td>
            <td></td>
        </tr>
           <?php
        
               while($result=$res->fetch()){
                    $id_client = $result['id_client'];
                    $id_vehicule = $result['id_vehicule'];
                    $id_accident = $result['id_accident'];
                    $nom = $result['nom'];
                    $prenom = $result['prenom'];
                    $id_contrat = $result['id_contrat'];
                    $source = $result['source'];
                    $dest = $result['dest'];
                    $lieu = $result['lieu'];
                    $date_accid = $result['date_accid'];
                    $date_accid = date("d-m-Y",strtotime($date_accid));
                   // $date_accid = date("d-m-Y",$date_accid);
                    $nom_cond = $result['nom_cond'];
                    $prenom_cond = $result['prenom_cond'];
                    $adr_cond = $result['adr_cond'];
                    $num_permit = $result['num_permit'];
                    $imat_b = $result['imat_b'];
                    $imat = $result['imat'];
                    $num_chass = $result['num_chass'];
                    //$date_accid = DateTime::createFromFormat('d-m-Y',$date_accid);
                    //$date_accid = date_format($date_accid,'d-m-Y');
           ?>
        
        <tr>
            
            <td id="nom<?php echo $id_accident; ?>"><?php echo $nom.' '.$prenom; ?></td>
            <td id="adversaire<?php echo $id_accident; ?>"><?php echo $nom_cond.' '.$prenom_cond; ?></td>
            <td id="num_chass<?php echo $id_accident; ?>"><?php echo $num_chass; ?></td>
            <td><?php echo $date_accid; ?></td>
            <td><?php echo $lieu; ?></td>
            <td><button class="btn btn-primary affecter" name="affecter"
                  id="<?php echo $id_accident; ?>">Affecter Devis</button></td>
        </tr>
        
            <input type="hidden" id="client<?php echo $id_accident?>" value="<?php echo $id_client; ?>"/>  
            <input type="hidden" id="accident<?php echo $id_accident; ?>" value="<?php echo $id_accident; ?>"/>   
            <input type="hidden" id="source<?php echo $id_accident; ?>" value="<?php echo $source; ?>"/>  
            <input type="hidden" id="dest<?php echo $id_accident; ?>" value="<?php echo $dest; ?>"/>  
            <input type="hidden" id="lieu<?php echo $id_accident; ?>" value="<?php echo $lieu; ?>"/>  
            <input type="hidden" id="date_accid<?php echo $id_accident; ?>" value="<?php 
                   $date_accid = date("Y-m-d",strtotime($date_accid));
                   echo $date_accid; ?>"/>  
            <input type="hidden" id="nom_cond<?php echo $id_accident; ?>" value="<?php echo $nom_cond; ?>"/>  
            <input type="hidden" id="prenom_cond<?php echo $id_accident; ?>" value="<?php echo $prenom_cond; ?>"/>  
            <input type="hidden" id="adr_cond<?php echo $id_accident; ?>" value="<?php echo $adr_cond; ?>"/>
            <input type="hidden" id="num_permit<?php echo $id_accident; ?>" value="<?php echo $num_permit; ?>"/>
            <input type="hidden" id="imat_b<?php echo $id_accident; ?>" value="<?php echo $imat_b; ?>"/>
            <input type="hidden" id="imat<?php echo $id_accident; ?>" value="<?php echo $imat; ?>"/>
        
          <?php     
             } 
           ?>
    </table>
    
</div>

<!-- Start Declarer accident -->
    
<div id="dec-accident" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CCC">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center"><i class="fa fa-pencil-square-o fa-lg" style="margin-right: 8px"></i> Accident </h2>
      </div>    
    
        <div class="modal-body" style="font-weight: bold; margin-top: 30px">
            <div class="accident text-center">
                <form role="form" action="accident/validationDevis.php" method="post" enctype="multipart/form-data" id="myForm">
                    <fieldset>
                    <legend class="text-center">Partie client</legend>
                
                <div class="form-group text-center">
                          <label for="contrat" class="lab-contrat">Sélectionnez un contrat :</label>
                          <input type="text" class="form-control contrat" id="imat" name="imat" disabled>
                    </div>
                
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Lieu d'accident</label>
                      <input type="text" class="form-control" id="lieu" name="lieu">
                    </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Date d'accident</label>
                      <input type="date" class="form-control" id="date_accid" name="date_accid" >
                    </div>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Source</label>
                      <input type="text" class="form-control" id="source" name="source">
                    </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                      <label for="sel">Destination </label>
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
                    
                    <div class="form-group">
                      <label for="sel">Charger le rapport</label>
                      <input type="file" accept="*.pdf" class="form-control" id="FileInput" name="FileInput" 
                             style="width: 40%; margin: auto">
                    </div>
                    
                    <div class="form-group">
                      <label for="sel">Devis de remboursement</label>
                      <input type="number" class="form-control" id="devis_rem" name="devis_rem" 
                             style="width: 40%; margin: auto">
                    </div>
                    

                 <div class="row" style="margin: 30px 10px 30px">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-lg btn-primary btn-block"
                                name="validerAccident" id="validerAccident">Valider</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-lg btn-danger btn-block" data-dismiss="modal"
                                id="annuler">Annuler</button>
                    </div>
                </div>
                    
                     
                     <input type="hidden" id="accident2" name="accident2" value=""/>  
                     <input type="hidden" id="immat2" name="immat2" value=""/>  
                   
                    
                </form>
            </div>
        </div>
        
      </div>
      
    </div>
    
</div>
            
            
            
<!-- End Declarer accident -->

    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.form.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.form.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script>
          
        
//$("input[type=hidden]").hide();
/*------------------------------function-------------------------*/        
    function validateImmat(immat){
             if(immat.match('^[0-9]{4}[0-9]{3}[1-48]{2}$')!=null){
                return true
            }else{   
                return false;
            }    
            
    }
           
/*----------------------------function--------------------------*/        
    function validateNpermit(nPermit){
         if(nPermit.match('^[0-9]{10}$')!=null){
                return true;
         }else{ 
                return false;
        }
    }
/*-----------------------------function---------------------------*/
        
//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		
		if( !$('#FileInput').val()) //check empty input filed
		{
			//$('#FileInput').css('border-color','red');

            Lobibox.alert('error', {
                msg: "Il faut choisir un fichier a partir de votre disque !. "
            });
            return false;
		}
		
		var fsize = $('#FileInput')[0].files[0].size; //get file size
		var ftype = $('#FileInput')[0].files[0].type; // get file type
		

		//allow file types 
		switch(ftype)
        {
			case 'application/pdf':
            case 'application/x-pdf':    
			case 'application/force-download':
                break;
            default:
                //$("#output").html("<b>"+ftype+"</b> Unsupported file type!");
                //$('#FileInput').css('border-color','red');
				
            Lobibox.alert('error', {
                msg: "Il faut choisir un fichier de type PDF !. "
            });
                return false;
        }
		
		//Allowed file size is less than 5 MB (1048576)
		if(fsize>500000) 
		{
			/*$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be 
            less than 5 MB.");*/
            //$('#FileInput').css('border-color','red');
            
            Lobibox.alert('error', {
                msg: "Désole le size de fichier ne depasse pas 500 KO !. "
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
        
/*----------------------------------------END all functions--------------------------------*/        
    $('#num_permit').keyup(function(){  
        
      if(validateNpermit($('#num_permit').val())==false){
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
        
   
        
$('.affecter').click(function(e){
    
    $('#dec-accident').modal({
       backdrop:'static',
       keyboard:false,    
       show :'false'   
    });
    
   var id=e.target.id;
    
   var id_accident = id;
   var imat = $('#imat'+id).val();
   var imat_b = $('#imat_b'+id).val();
   var lieu = $('#lieu'+id).val();
   var date_accid = $('#date_accid'+id).val();
   var source = $('#source'+id).val();
   var dest = $('#dest'+id).val();
   var nom_cond = $('#nom_cond'+id).val();
   var prenom_cond = $('#prenom_cond'+id).val();
   var adr_cond = $('#adr_cond'+id).val();
   var num_permit = $('#num_permit'+id).val();
   
    $("#accident2").val(id_accident);
    $("#immat2").val(imat);      
    $("#imat").val(imat);
    $("#imat_b").val(imat_b);
    $("#lieu").val(lieu);
    $("#date_accid").val(date_accid);
    $("#source").val(source);
    $("#dest").val(dest);
    $("#nom_cond").val(nom_cond); 
    $("#prenom_cond").val(prenom_cond); 
    $("#adr_cond").val(adr_cond); 
    $("#num_permit").val(num_permit); 
   
    
});
        
$("#validerAccident").click(function(){
    
      if(($("#devis_rem").val()!="")&&($("#imat").val()!="")&&($("#imat_b").val()!="")&&($("#lieu").val()!="")&&($("#date_accid").val()!="")&& ($("#source").val()!="")&&($("#dest").val()!="")&&($("#nom_cond").val()!="")
        &&($("#prenom_cond").val()!="")&&($("#adr_cond").val()!="")&&($("#num_permit").val()!="")
         &&($("#FileInput").val()!="")){ 

        var verifPermit = 1;
        var verifImmat = 1;


        if(!validateImmat($("#imat_b").val())){
                $('#imat_b').css('border-color','red');
                verifImmat=0;

        }

        if(!validateNpermit($("#num_permit").val())){
                $('#num_permit').css('border-color','red');
                verifPermit=0;

        }

        if(verifImmat==1 && verifPermit==1){

            
                if(beforeSubmit()==true){
                    return true;
                }else{
                    return false;
                }
                
	            
               
        }else{
           
           return false;
        }
    

      //  alert("erreur de upload file");
    //   return false;
    //}     
          
   }else{
            Lobibox.alert('error', {
                msg: "Désole Il faut remplir tous les champs !. "
            });
        return false;
   }
    
});        


   
   </script>
</body>

<style>
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
    border-bottom:  1px solid #AAA
    }
    .insc-form button {
        border-radius: 0px;
        margin-top: 40px
    }
    .modal-content .btn-primary, .modal-content .btn-danger{
        width: 95%
    }
</style>
    
</html>