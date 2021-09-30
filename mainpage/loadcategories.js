$(document).ready(function(){  
    function load_data(page,cat)  
   {  
      $.ajax({  
             url:"pagination.php",  
             method:"GET",  
             data:{page:page,cat:cat},  
             success:function(data){  
              $('.container').html(data);  
             }  
        })  
   }  
   $(document).on('click', '.pagination_link', function(){  
        var page = $(this).attr("id");  
        var cat = document.getElementsByClassName("maincontainer")[0].id;
        load_data(page,cat);  
   }); 
   
});  



$(document).ready(function(){  
    function load_image(id,page,cat)  
    {  
         $.ajax({  
              url:"image.php?id="+id+"&page="+page,  
              method:"GET",  
              data:{id:id,page:page,cat:cat},  
              success:function(data){  
              $('.container').html(data);  
              }  
         })  
    }  
    $(document).on('click', '#image', function(){  
         var id = this.className.split(" ")[0];  
         var page = this.className.split(" ")[1];  
         var cat = document.getElementsByClassName("maincontainer")[0].id;
         load_image(id,page,cat);  
    });  
}); 