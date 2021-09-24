
$(document).ready(function(){
    $(document).on('click', '#submit', function(){  
        var email = document.getElementById('email');
        var text = document.getElementById('text');
        var correct = document.getElementsByClassName('correct')[0]
        console.log(email.value);
        console.log(text.value);
        if(!ValidateInput(email,text) || (email.value.length==0 || text.value.length==0)){
            correct.style.backgroundColor='rgb(252, 67, 67)';
            correct.style.visibility="visible";
            correct.value='Enter valid inputs.';
            $('.correct').prop( "disabled", true );
        }
    });  
});  

$(document).ready(function(){
    $(document).on('keyup', '#email', function(){ 
        if(document.getElementById('email').value.length>0){
            if(document.getElementById('text').value.length>0)
            $('#submit').css("visibility","visible");
            else $('#submit').css("visibility","hidden");
        }
    });  
    $(document).on('keyup', '#email', function(){ 
        if(document.getElementById('email').value.length==0){
            $('#submit').css("visibility","hidden");
        }
    });

    $(document).on('keyup', '#text', function(){ 
        if(document.getElementById('text').value.length>0){
            if(document.getElementById('email').value.length>0)
            $('#submit').css("visibility","visible");
            else $('#submit').css("visibility","hidden");
        }
    });  
    $(document).on('keyup', '#text', function(){ 
        if(document.getElementById('text').value.length==0){
            $('#submit').css("visibility","hidden");
        }
    });
}); 


function ValidateInput(inputEmail,inputText){
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var textformat = /^[a-zA-Z0-9_.-]{5,}$/;
    var a = inputEmail.value.match(mailformat);
    var b = inputText.value.match(mailformat);
    if(!a || !b)return false;
    return true;
}

