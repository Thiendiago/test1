$(document).ready(function(){
    $("#check-ajax").click(function(){
        var data_id = $(this).serialize();;
        var data = {id: data_id};
       
        $.ajax({
            url: '?mod=order&action=update',
            method: 'POST',
            data: data,
            dataType: 'text',
            success: function (data) {
                alert(data);
               // You will get response from your PHP page (what you echo or print)
            },
            error: function (xhr, ajaxoption, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
        return false;
    });
});