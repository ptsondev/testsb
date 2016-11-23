jQuery(document).ready(function($){	
	ajaxPath = window.location.protocol + "//" + window.location.host+'/ajax-process';

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

});


jQuery(window).load(function($) {
	
});
