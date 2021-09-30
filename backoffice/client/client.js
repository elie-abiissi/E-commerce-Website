$(document).ready(function(){
    $('#display').click(function(){
     var id= $('#clients_list').val();
     if(id != '')
     {
      $.ajax({
       url:"fetch.php",
       method:"POST",
       data:{id:id},
       dataType:"JSON",
       success:function(data)
       {
           
        $('#clients').css("visibility", "visible");
        $('#first_name').text(data.firstname);
        $('#last_name').text(data.lastname);
        $('#date').text(data.date);
        $('#email').text(data.email);
        $('#phone').text(data.phone);
        $('#governorate').text(data.governorate);
        $('#district').text(data.district);
       }
      })
     }
     else
     {
      $('#clients').css("visibility", "hidden");
     }
    });
   });