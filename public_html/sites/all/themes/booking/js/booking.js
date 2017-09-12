jQuery(document).ready(function($){	
    
     
    $(".f-rating").rateYo({
        numStars: 5,
        halfStar: true
    });
    
    var desRStar = $('#lblrate .num').text();
    $('#des-rStar').rateYo({
        rating: desRStar,
        numStars: 5,
        halfStar: true,
        readOnly: true
    });
    
    $(".rateYo").each(function(){
       var rating = $(this).data('rating');        
        $(this).rateYo({            
            rating: rating,
            numStars: 5,
            halfStar: true
        });
    });
    
    $( "#sPPN" ).slider({
        min: 1, //100k
        max: 150, //15tr
        value: 20,
        range:"min",
        slide: function( event, ui ) {
            temp = formatNumber(ui.value * 100000);
            $('#dPPN').text(temp);
        }
    });
    temp = formatNumber(20 * 100000);
    $('#dPPN').text(temp);
    
    var dpOptions = 
    { numberOfMonths: 2,
      showButtonPanel: true,
      showOn: "button",
      buttonImage: "https://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date",
      dateFormat: "dd/mm/yy",
      minDate:0
    };
    $("#booking-request-form #dCheckIn" ).datepicker(dpOptions).on( "change", function() {        
        $('#displayCheckIn').text( $(this).val());
    });
    $("#booking-request-form #dCheckOut" ).datepicker(dpOptions).on( "change", function() {        
        $('#displayCheckOut').text( $(this).val());
    });
    
    $('#booking-request-form #filter-room .fa-plus-circle').click(function(){
        var rel = $(this).data('rel');
        temp = $('#'+rel).val();
        temp++;
        $('#'+rel).val(temp);
    });
    
    $('#booking-request-form #filter-room .fa-minus-circle').click(function(){
        var rel = $(this).data('rel');
        temp = $('#'+rel).val();
        if(temp>0){
            temp--;
        }
        $('#'+rel).val(temp);
    });
    
    
    $('#btnSubmitBookingReQuest, #btnSaveBookingReQuest').click(function(){
        var filter={};
        filter.des = $('#txtDes').val();
        filter.checkIn = $('#dCheckIn').val();
        filter.checkOut = $('#dCheckOut').val();
        filter.nRoom =  $('#nRoom').val();
        filter.nAdult =  $('#nAdult').val();
        filter.nChildren =  $('#nChildren').val();
        filter.dPPN = removeFormatNumber($('#dPPN').text());
        filter.rStar = $('#rStar').rateYo("rating");
        filter.rTripAdvisor = $('#rTripAdvisor').rateYo("rating");
        filter.cType = [];
        filter.status = $(this).data('status'); // send to TCP or save to draft
        $(".cType:checked").each(function(){ 
            filter.cType.push($(this).val());
        });
        
        //console.log(filter);        
        
        jQuery.ajax({
            method: "POST",
            async: false,
            url: ajaxPath,            
            data: {action: "bookingRequest", filter:filter},
            success: function (response) {
                console.log(response);
                
            }
        });
        
    });
    

    $('.btnDeal').click(function(){
       var bkrid= $(this).data('bkrid'); // booking request nid       
       $(this).after($('#own-hotel'));
       $('#own-hotel').show();
    });
    
    $('#osl-hotel').change(function(){
       var hid = $(this).val();
       jQuery.ajax({
            method: "POST",
            async: false,
            url: ajaxPath,            
            data: {action: "loadRoomsByHotel", hid:hid},
            success: function (response) {
                var res = jQuery.parseJSON(response);
                $('#osl-room').empty().append(res.rooms);
                $('#or-ppn').text(res.price);
            }
        });
    });
    $('#osl-room').change(function(){
        var price = $(this).find(':selected').data('price');
          $('#or-ppn').text(price);          
    });
    
    $('#btnConfirmDeal').click(function(){       
        // valid number
                
        // save deal
        var deal={};
        var focusTD = $(this).parents('#own-hotel').parent();
        deal.bkrid = $(this).parents('#own-hotel').parent().find('.btnDeal').data('bkrid');
        deal.hid = $('#osl-hotel').val();
        deal.rid = $('#osl-room').val();
        deal.price = $('#otxt-price').val();
        jQuery.ajax({
            method: "POST",
            async: false,
            url: ajaxPath,            
            data: {action: "submitDeal", deal:deal},
            success: function (response) {
                $('#own-hotel').hide();                
                focusTD.find('.btnDeal').text(response);
                focusTD.find('.btnDeal').removeClass('btnDeal');                
            }
        });
        
        // refresh form
        $('#otxt-price').val('');
    });
    
    
    $('#slSortByPrice').change(function(){
       var sort = $(this).val();
       curpath = window.location.origin + window.location.pathname + '?sort_price='+sort;
       window.location.href = curpath; 
    });
    
    $("#showMap").fancybox();
}); 