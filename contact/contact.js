$("#location").hide();
function show_map(){
    setTimeout(function() {
        $("#location").css("width","100%");
        $("#loader").hide();
    }, 3300);
}
show_map();