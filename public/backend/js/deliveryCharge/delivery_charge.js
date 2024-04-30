"use strict";
// Delivery charge -> When category selected KG. then show weight otherwise hide weight
// start
showDeliveryLables();
cityWightLabel();
$("#category").on('change', function () {
    cityWightLabel();
    showDeliveryLables();
});
function showDeliveryLables(){
    var type = $('#category').find(":selected").attr('data-type');
    $("#delivery_type").val(type);
    if (type == 0) {
        $("#distance_type,#range").hide();
        $("#city_same_day,#city_next_day,#city_sub_city,#city_outside,#weight_group").show();
        cityWightLabel();
    } else if(type == 1){
        $("#city_same_day,#city_next_day,#city_sub_city,#city_outside,#weight_group").hide();
        $("#distance_type,#range").show();
    }else{
        $("#city_same_day,#city_next_day,#city_sub_city,#city_outside,#weight_group,#distance_type,#range").hide();
    }
}
function cityWightLabel(){
    if ($("#category").val() == 1) {
        $("#weight_group").show();
    } else {
        $("#weight_group").hide();
    }
}
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
// end
