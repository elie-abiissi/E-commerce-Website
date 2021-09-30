$(document).ready(function(){  
    $("#add").on('click', function(){ 
        var prod= document.getElementsByClassName("image")[0].id;
        var quantity = document.getElementsByClassName("number")[0].value;
        $.ajax({  
             url:"addorder.php?prod="+prod+"&quantity="+quantity,  
             method:"GET",  
             data:{prod:prod, quantity:quantity},  
             success:function(data){  
            $('.exist').css("visibility","visible");  
            $('.soldout').css("background-color","#3AF75E");  
             }  
        })  
   })
});

$("#quant").css("width","50px");