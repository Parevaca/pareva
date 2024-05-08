"use strict";
function showDeliveryLables(){
    var type = $('#deliveryChargeID').find(":selected").attr('data-type');
    $("#delivery_type").val(type);
    if (type == 0) {
        $("#distance_type,#range,#distance_charge").hide();
        $("#city_same_day,#city_next_day,#city_sub_city,#city_outside,#weight_group").show();
    } else if(type == 1){
        $("#city_same_day,#city_next_day,#city_sub_city,#city_outside,#weight_group").hide();
        $("#distance_type,#range,#distance_charge").show();
    }else{
        $("#city_same_day,#city_next_day,#city_sub_city,#city_outside,#weight_group,#distance_type,#range,#distance_charge").hide();
    }
}
$(function () {
    var delivery_charge_id = $("select#deliveryChargeID option").filter(":selected").val();
    if (delivery_charge_id) {
        $.ajax({
            type: 'POST',
            url: $('#deliveryChargeID').data('url'),
            data: {'delivery_charge_id': delivery_charge_id},
            dataType: "html",
            success: function (data) {
                $('#deliveryChargeInfo').html(data);
                showDeliveryLables();
            }
        });
    }

});

$(document).on('change', '#deliveryChargeID', function () {
    $.ajax({
        type: 'POST',
        url: $(this).data('url'),
        data: {'delivery_charge_id': $(this).val()},
        dataType: "html",
        success: function (data) {
            $('#deliveryChargeInfo').html(data);
            showDeliveryLables();
        }
    });
});

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
        if(charCode ==46){
            return true;
        }else{
            return false;
        }
    }
    return true;
}