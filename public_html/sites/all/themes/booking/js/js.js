jQuery(document).ready(function($){	
        fullURL = window.location.protocol + "//" + window.location.host;
	ajaxPath = fullURL+'/ajax-process';

	$(".rslides").responsiveSlides({
		pager: true
	});
	
	$('#btn-login').click(function(){
		$('#custom-login-area').toggle();
		return false;
	});

	$('#btnShowMenu').click(function(){
		$('#main-menu').toggle();
	});

	$('a.dropdown-toggle').click(function(e){
		$(this).next('ul').toggle();
		 e.stopPropagation();
    	e.preventDefault();
	});
	
    if( $('#txtSearchPlace').length){
    		var availablePlaces = [];
	    	jQuery.ajax({
	            method: "POST",
	            async:false,
	            url: ajaxPath,
	                data: {action: "getAvaiablePlaces"},
	                success: function (response) {
	                	console.log(response);
	                    availablePlaces = jQuery.parseJSON(response);
	                }
	        });
	    
        $( "#txtSearchPlace" ).autocomplete({
          source: availablePlaces
        });
    };
    
    /*$('.timeline').timelify({
        animLeft: "fadeInLeft",
		animCenter: "fadeInUp",
		animRight: "fadeInRight",
		animSpeed: 600,
		offset: 150
	});*/
    
    $(".link-detail-tour").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});

     $( "#u-start-date, #u-end-date" ).datepicker({'dateFormat': 'd/m/yy'});
    
    $('.btn-edit, .tour-detail-controls i.fa-pencil-square-o').on('click', function(){
        // validate is user logged in
        if(confirmLogin()){
            $(this).parents('.info-group').find('.view-mode').toggle();
            $(this).parents('.info-group').find('.edit-mode').toggle();
        }       
    });
    
    /*
    $('#edit-travellers-info').on('click', function(){
        jQuery.ajax({
	            method: "POST",
	            async:false,
	            url: ajaxPath,
	                data: {action: "addCustomer"},
	                success: function (response) {
	                	//alert(response);
	                    $('#list-customers').append(response);
	                }
	        });
    });
    */
    $('.tour-detail-controls i.fa-times').on('click', function(){
        $(this).parents('.timeline-item').remove(); 
    });
    $('.tour-detail-controls i.fa-pencil-square-o').on('click', function(){
        
    });
    
    $('#travellers-info').on('click', '.add-customer .fa-check', function(){
        var name= $('.txtNewCus-Name').val();
        if(name==''){
            alert('Please enter member\'s name');
        }else{
            var phone= $('.txtNewCus-Phone').val();
            var email= $('.txtNewCus-Email').val();
            var newMember = '<li>'+name+' - ' + phone + ' - ' + email + ' </li>';
            $('#list-customers ol').append(newMember);
        }
    });
    
    $('.timeline-item').draggable();
    $('ul.timeline-items').droppable({
        drop: function( event, ui ) {
            var changed = Math.floor(ui.position.top / 180);
            var cur_index = ui.draggable.index();
            var new_index = cur_index + changed;
            
            console.log(ui.position.top);  
            console.log(new_index);
     
            ui.draggable.css({top: 0, left:'none'});
            if(new_index < 0){ 
                ui.draggable.parent().prepend(ui.draggable);
            }else{
                ui.draggable.parent().children("li:eq("+new_index+")").after(ui.draggable);
            }
        }
    });
});


jQuery(window).load(function($) {
	
});

function confirmLogin(){
    if($('body').hasClass('logged-in')){      
        return true;
    }else{
        var r = confirm("Please login to be modify your tour");
        if (r == true) {
            window.location.href  = fullURL+'/user/login';                
        } 
        return false;
    }
}