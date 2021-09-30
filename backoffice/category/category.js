var cat_id = 1;
$(document).ready(function () {
    $('#categorie').on('change', function () {
        id = this.value;
        $.ajax({
                url: "getimage.php",
                method: "GET",
                data: { id: id },
                dataType:"JSON",
                success: function (data) {
                    $('#image_container').html(data.image);
            $('#name').val(data.name);
                }
            })
        
    })
});
