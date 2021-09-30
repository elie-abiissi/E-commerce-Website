$(document).ready(function () {
  $('span').click(function () {

    var idcart = $(this).attr("id");
    var idproduct = $(this).attr("class");

    $.ajax({
      url: "trash.php",
      method: "POST",
      data: { idcart: idcart, idproduct: idproduct },
      success: function (data) {
        $("#main_container").html("");
        $("#main_container").append("<a href='account.php' id='link'>View carts</a>");
      }

    });
  });
});