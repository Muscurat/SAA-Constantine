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

    
// like clicking on a link
//window.location.href = "http://yourdomian.com";
    
    


