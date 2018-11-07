<!DOCTYPE html>

<?php

session_start();

$_SESSION['inscrire']=false ;


?>

<html>
<head>
  <title>Inscrire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="lobibox-master/demo/demo.css"/> 
    <link rel="stylesheet" href="lobibox-master/dist/css/lobibox.min.css"/>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/inscrire.css" />
    <style type="text/css">
    
        .Rouge {
            border-color: red;
        }
    </style> 
</head>
    
<body>
    
<section class="container" style="width: 60%">
    <div class="brand-name">
        <a class="navbar-brand" style="float:none" href="index.php"> SAA<span>Constantine</span></a>
        <h1>Créer un compte</h1>
        <p class="lead">Svp, n'oubliez pas d'entrer tous les champs particulierement..<br/>
        et soyer sure que les informations que vous avez entrés sont valides !</p>
    </div>
   
    <div class="insc-form">
        <form role="form">
            <fieldset>
            <legend>Informations du compte</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="nom">Name</label>
                      <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="prenom">Prénom</label>
                      <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                      <label for="pseudo">Nom d'utilisateur</label>
                      <input type="text" class="form-control" id="pseudo" name="pseudo" required>
            </div>
            <div class="form-group">
                      <label for="password">Mot de passe</label>
                      <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                      <label for="password2">Retapez votre mot de passe</label>
                      <input type="password" class="form-control" id="password2" name="password2" required>
            </div>
            <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                      <label for="tel">Numéro de téléphone</label>
                      <input type="text" class="form-control" id="tel" name="tel" required>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="date_nai">Date de naissance</label>
                      <select class="form-control" id="date_nai" name="date_nai">
                        <option selected="selected" value="">Jour</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                      </select>
                </div>
                <div class="col-md-4">
                    <label for="mois_nai">&nbsp;</label>
                    <select class="form-control" id="mois_nai" name="mois_nai">
                        <option selected="selected" value="">Mois</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                </div>
                <div class="col-md-4">
                    <label for="annee_nai">&nbsp;</label>
                    <select class="form-control" id="annee_nai" name="annee_nai">
                         <option selected="selected" value="">Année</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option>
                    </select>
                </div>
            </div>
                <div class="form-group" style="margin-top: 15px">
                      <label for="sexe">Sexe</label>
                          <select class="form-control" id="sexe" name="sexe">
                            <option value="homme" selected>Homme</option>
                            <option value="femme">Femme</option>
                          </select>
                </div>
            <div class="form-group">
                      <label for="adr">Adresse</label>
                      <input type="text" class="form-control" id="adr" name="adr" required>
            </div>
            <div class="form-group">
                      <label for="profession">Profession</label>
                      <input type="text" class="form-control" id="profession" name="profession" required>
            </div>
            <div class="form-group">
                      <label for="num_permit">Numéro de permit</label>
                      <input type="text" class="form-control" id="num_permit" name="num_permit" required>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <label for="date_permit">Date de permit</label>
                      <select class="form-control" id="date_permit" name="date_permit">
                        <option selected="selected" value="">Jour</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                      </select>
                </div>
                <div class="col-md-4">
                    <label for="mois_permit">&nbsp;</label>
                    <select class="form-control" id="mois_permit" name="mois_permit">
                        <option selected="selected" value="">Mois</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                </div>
                <div class="col-md-4">
                    <label for="annee_permit">&nbsp;</label>
                    <select class="form-control" id="annee_permit" name="annee_permit">
                        <option selected="selected" value="">Année</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option>
                    </select>
                </div>
            </div>
                
            <p class="lead" style="margin-top: 30px">la création d'un nouveau compte vous exige à créer  un nouveau contrat</p>
                
            <button type="button"  style="width: 49%; float: right" class="btn btn-primary btn-lg btn-block" id="validationButton">
                Demander nouveau contrat</button>
            <a href="index.php"><button style="width: 49%; float: left; margin-top:40px" type="button" 
                                        class="btn annuler btn-lg btn-block">Annuler</button></a>    
            </fieldset>
        </form>  
        
    </div>
</section>
    
<section class="footer">
    <div class="container">
        <a href="#">Développeurs</a>
        <a href="#">Confidentialité et cookies</a>
        <a href="#">Conditions d’utilisation</a>
    </div>
</section>
    
    
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.validate.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/inscrire.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script>
    
/*$("#password").attr("required",true);
$("#password2").attr("required",true);
$("#email").attr("required",true);
$("#tel").attr("required",true);
$("#num_permit").attr("required",true);
$("#nom").attr("required",true);
$("#prenom").attr("required",true);
$("#pseudo").attr("required",true);
$("#adr").attr("required",true);
$("#profession").attr("required",true);*/

    $("#password2").keyup(function(){
     
     if($("#password").val()!=$("#password2").val()){
         $("#password2").css('border-color','red');
     }else{
          $("#password2").css('border-color','');
     }
     
 });    
 
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
    
 
$("#validationButton").click(function(){
        
     
      if(($("#password").val()!="")&&($("#password2").val()!="")&&($("#email").val()!="")&&($("#tel").val()!="")&&($("#num_permit").val()!="")&&($("#nom").val()!="")&&($("#prenom").val()!="")&&($("#pseudo").val()!="")&&($("#adr").val()!="")&&($("#profession").val()!="")&&($("#date_nai").val()!="")&&($("#mois_nai").val()!="")&&($("#annee_nai").val()!="")&&($("#date_permit").val()!="")&&($("#mois_permit").val()!="")&&($("#annee_permit").val()!="")){
        
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var pseudo = $("#pseudo").val();
        var adr = $("#adr").val();
        var profession = $("#profession").val();
        var num_permit = $("#num_permit").val();
        var tel = $("#tel").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var sexe = $("#sexe").val();
        var annee_permit = $("#annee_permit").val();
        var date_permit = $("#date_permit").val();
        var mois_permit = $("#mois_permit").val();
        var date_nai = $("#date_nai").val();
        var mois_nai = $("#mois_nai").val();
        var annee_nai = $("#annee_nai").val(); 

        var passwordVerif=1;
        var emailVerif=1;
        var phoneVerif=1;
        var numeroPermitVerif=1;

        if($("#password").val()!=$("#password2").val()){

                passwordVerif=0; 
                $("#password2").css('border-color','red');    

        }
          
        if(!validateEmail($("#email").val())){

               emailVerif=0; 
               $("#email").css('border-color','red');

        }
          
        if(!validatePhone($("#tel").val())){

              phoneVerif=0; 
              $("#tel").css('border-color','red');      
        }    
        if(!validateNpermit($("#num_permit").val())){

              numeroPermitVerif=0; 
              $("#num_permit").css('border-color','red');      

        }

        if(passwordVerif==1 && emailVerif==1 && phoneVerif==1 && numeroPermitVerif==1){
                  
    
                      $.ajax({
                          
                           type:"post",
                           url:"client/showFormDemande.php",
                           data:{
                                'nom':nom,
                                'prenom':prenom,
                                'pseudo':pseudo,
                                'adr':adr,
                                'profession':profession,
                                'num_permit':num_permit,
                                'tel':tel,
                                'email':email,
                                'password':password,
                                'sexe':sexe,
                                'annee_permit':annee_permit,
                                'date_permit':date_permit,
                                'mois_permit':mois_permit,
                                'date_nai':date_nai,
                                'mois_nai':mois_nai,
                                'annee_nai':annee_nai
                               },
                          // dataType:"json",
                           success:function(data){
                               
                               if(data=="client exist"){
                                     
                                    Lobibox.alert('error', {
                                    msg: "Vous Avez deja inscrier sur notre site."
                                    });
                                   
                                 //  window.location.replace("index.php");
                               }else{
                                   
                                    window.location.replace("demanderContrat.php");
                                   
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
</html>