$(document).ready(function(){
    $('#submit').click(function(){
    
      var email = $("#email").val();
      var password = $("#password").val();
      
     
       $.ajax({
       url:"verify.php",
       method:"POST",
       data:{email:email, password:password},
       success:function(data){
           console.log(20);
        $('#correct').css("display","block");
        $('#main').css("display","none");
       }
      })
    }) 
   });