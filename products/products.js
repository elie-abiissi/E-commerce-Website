
$(document).ready(function(){  
     function load_data(page,type)  
    {  
         $.ajax({  
              url:"pagination.php",  
              method:"GET",  
              data:{page:page, type:type},  
              success:function(data){  
               $('.container').html(data);  
              }  
         })  
    }  
    $(document).on('click', '.pagination_link', function(){  
         var page = $(this).attr("id");  
         var type = document.getElementById('sorting').selectedOptions[0].value;
         load_data(page,type);  
    }); 
    
   $('#sorting').change(function(){
     var type = document.getElementById('sorting').selectedOptions[0].value;
     load_data(1,type);
     
     }); 
});  



$(document).ready(function(){  
     function load_image(id,page,type)  
     {  
          $.ajax({  
               url:"image.php?id="+id+"&page="+page+"&type="+type,  
               method:"GET",  
               data:{id:id,type:type,page:page},  
               success:function(data){  
               $('.container').html(data);  
               }  
          })  
     }  
     $(document).on('click', '#image', function(){  
          var id = this.className.split(" ")[0];  
          var page = this.className.split(" ")[1];  
         var type = document.getElementById('sorting').selectedOptions[0].value;
         load_image(id,page,type);  
     });  
 }); 





 $(document).ready(function(){

     $('.myInput').on('keyup',function () {
         var inputValue = this.value;
         var errMsg = "";
         var outputDiv = ".search_container";
         if(inputValue != "") { 
   
           $.ajax({
             url:"fetch.php",
             data: {'input':inputValue},
             dataType: "html",
             type: "POST",
             success: function (response) {
                $(outputDiv).empty().html(response);
                $('.search_container').css("height","200px");
              }
           });
   
         } else { 
           var msg = "Please type your message or keyword.";
           $('.errMsg').text(msg);
         }
   
     });
   
   });


   $('.myInput').keydown(function(event) {
  if($('.myInput').is(":empty"))
     $('.search_container').css("height","0px");
 });













