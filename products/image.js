$(".add").on("click",function(){ 
    var value = parseInt($(".number").val()) + 1;
    $(".number").val(value);
    }
    );
    
    $(".remove").on("click",function(){ 
         if($(".number").val()>1){
         var value = parseInt($(".number").val()) - 1;
         $(".number").val(value);
         }
    }
    );

    if($("#add").hasClass("none")){
        $(".remove").prop('disabled', true);
        $(".add").prop('disabled', true);
        $(".add").css({cursor:"default"});
        $(".remove").css({cursor:"default"});
        $(".add").css("pointer-events","none");
        $(".remove").css("pointer-events","none");
    };

    $("#search_div").css("visibility","hidden");
