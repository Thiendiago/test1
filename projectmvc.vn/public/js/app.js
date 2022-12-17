$(document).ready(function(){
    $(".num_order").change(function(){
        var id = $(this).attr('data-id');
        var qty = $(this).val();
        var data = {id: id, qty: qty};
        console.log(data);
        $.ajax({
            url: '?mod=cart&act=update_ajax',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function (data){
                // alert(data);
                $("#sub-total-"+id).text(data.sub_total);
                $("#total-price span").text(data.total);
                console.log(data);
            },
            error: function (xhr, ajaxOption, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});