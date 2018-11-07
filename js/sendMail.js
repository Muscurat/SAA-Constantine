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
        $('#phone').css('border-color','red');
    }
    
    if(!validateEmail($("#email").val())){
        verifEmail = 0;
        $('#email').css('border-color','red');
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

       
    
