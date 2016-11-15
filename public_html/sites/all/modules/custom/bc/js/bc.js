jQuery(document).ready(function($){	
    ajaxPath = window.location.protocol + "//" + window.location.host+'/ajax-process';
    
    if( $('#edit-field-funds-und-0-value').length){
        $('#edit-field-funds-und-0-value').keyup(function() {
            var number = $('#edit-field-funds-und-0-value').val();        
            jQuery.ajax({
                method: "POST",
                url: ajaxPath,
                data: {action: "convert_money_to_text", number: number},
                success: function (response) {
                    $('#txt-funds').text(response);           
                }
            });

        });
    }
    
    if( $('#ntvcore-form-update-company').length){
        $('#ntvcore-form-update-company input[type="checkbox"]').change(function() {            
            var id = $(this).attr('id');
            id = id.substring(0,id.length - 2);
            if($(this).is(':checked')){
                $('#ntvcore-form-update-company #'+id).removeAttr("disabled");
            }else{
                $('#ntvcore-form-update-company #'+id).attr("disabled", "disabled");
            }
        });
    }
    
});