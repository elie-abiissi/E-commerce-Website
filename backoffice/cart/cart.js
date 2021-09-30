$(document).ready(function(){  
    $("svg").on('click', function(){ 
        var idcart= $(this).attr("id");
        
        $.ajax({  
             url:"view.php",  
             method:"GET",  
             data:{idcart:idcart},  
             success:function(data){  
            
            $('#bottom').html(data);  
            
             }  
        })  
   })
});
