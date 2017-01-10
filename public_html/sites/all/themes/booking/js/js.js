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

     $( "#u-start-date, #u-end-date" ).datepicker({'dateFormat': 'M-d-yy'});
    
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
    
    // them hanh khach
    $('#travellers-info').on('click', '.add-customer .fa-check', function(){
        if(confirmLogin()){
            var name= $('.txtNewCus-Name').val();
            if(name==''){
                alert('Please enter member\'s name');
            }else{
                var phone= $('.txtNewCus-Phone').val();
                var email= $('.txtNewCus-Email').val();
                var old = $('.slNewCus-Old option:selected').val(); 
                var tmp = [name, phone, email, old];

                var newMember = '<li>';
                newMember += '<span class="cu-name">'+name+'</span> -';
                newMember += '<span class="cu-phone">'+phone+'</span> -';
                newMember += '<span class="cu-email">'+email+'</span> -';
                newMember += '<span class="cu-old">'+old+'</span>';
                newMember +='<i class="fa fa-times" aria-hidden="true" title="Remove this member"></i></li>';
                $('#list-customers ol').append(newMember);
                
                $('#list-customers .txtNewCus-Name').val('');
                $('#list-customers .txtNewCus-Phone').val('');
                $('#list-customers .txtNewCus-Email').val('');
            }
        }
    });
    
    $('#list-customers').on('click', 'li .fa-times', function(){
       $(this).parents('li').remove(); 
    });
    
    
    // them viec can lam
    $('#list-todo').on('click', '.add-todo .fa-check', function(){
        if(confirmLogin()){
            var task= $('#list-todo .txtTask').val();
            if(task==''){
                alert('Please enter task to do');
            }else{
                var order = $('#list-todo .txtOrder').val();
                var name = $('#list-todo .txtName').val();
                var time = $('#list-todo .txtTime').val();
                var status = $('#list-todo .txtStatus').val();
                var note = $('#list-todo .txtNote').val();
                
                
                var tmp = [task,order,name,time,status,note];

                var newTask = '<div class="item">';
                newTask += '<div class="col-sm-2 col-xs-6">'+task+'</div>';
                newTask += '<div class="col-sm-2 col-xs-6">'+order+'</div>';
                newTask += '<div class="col-sm-2 col-xs-6">'+name+'</div>';
                newTask += '<div class="col-sm-2 col-xs-6">'+time+'</div>';
                newTask += '<div class="col-sm-2 col-xs-6">'+status+'</div>';
                newTask += '<div class="col-sm-2 col-xs-6">'+note+'</div>';
                newTask += '<i class="fa fa-times" aria-hidden="true" title="Remove this row"></i></div>';
                $('#list-todo #todo-result').append(newTask);
                
                $('#list-todo .txtTask').val('');
                $('#list-todo .txtOrder').val('');
                $('#list-todo .txtName').val('');
                $('#list-todo .txtTime').val('');
                $('#list-todo .txtStatus').val('');
                $('#list-todo .txtNote').val('');
            }
        }
    });
    
    // them chi tieu
    $('#list-cost').on('click', '.add-cost .fa-check', function(){
        if(confirmLogin()){
            var name= $('#list-cost .txtName').val();
            if(name == ''){
                alert('Please enter expense name');
            }else{                
                var type = $('#list-cost .slType').val();
                var quality = $('#list-cost .txtQuality').val();
                var uPrice = $('#list-cost .txtUnitPrice').val();
                var total = $('#list-cost .txtTotal').val();
                var note = $('#list-cost .txtNote').val();
                
                var newTask = '<div class="item">';
                newTask += '<div class="col-sm-2 col-xs-6">'+name+'</div>';
                newTask += '<div class="col-sm-2 col-xs-6">'+type+'</div>';
                newTask += '<div class="col-sm-2 col-xs-6">'+quality+'</div>';
                newTask += '<div class="col-sm-2 col-xs-6">'+uPrice+'</div>';
                newTask += '<div class="col-sm-2 col-xs-6">'+total+'</div>';
                newTask += '<div class="col-sm-2 col-xs-6">'+note+'</div>';
                newTask += '<i class="fa fa-times" aria-hidden="true" title="Remove this row"></i></div>';
                $('#list-cost #cost-result').append(newTask);
                
                $('#list-cost .txtName').val('');                
                $('#list-cost .txtQuality').val('');
                $('#list-cost .txtUnitPrice').val('');
                $('#list-cost .txtTotal').val('');
                $('#list-cost .txtNote').val('');
            }
        }
    });
    
    $('#list-todo, #list-cost').on('click', '.item .fa-times', function(){
       $(this).parents('.item').remove(); 
    });
    
    
    
    
    $('.timeline-item').draggable();
    $('ul.timeline-items').droppable({
        drop: function( event, ui ) {
            var changed = Math.floor(ui.position.top / 240);
            var cur_index = ui.draggable.index();
            var new_index = cur_index + changed;
            
            console.log(ui.position.top);  
            console.log(new_index);
     
            ui.draggable.css({top: 0, left:'none'});
            if(new_index < 0){ 
                ui.draggable.parent().prepend(ui.draggable);
            }else{
                ui.draggable.parents().children("li:eq("+new_index+")").after(ui.draggable);
            }
        }
    });
    
    
    
    // Begin customize tour
    $('#btnCustomTour').click(function(){
        if(confirmLogin()){ 
            $('.edit-mode').show();
            $('.view-mode').hide();
            /*$('html, body').animate({
                scrollTop: $('#main-content').offset().top + 'px'
            }, 'fast');*/
        }
    });
    
    /*
     *  SAVE CUSTOM TOUR 
     */
    $('#btnSaveCustomTour').click(function(){
        var tour={};
        tour.id = $('article.node-tour').data('nid');
        tour.startDate = $('#u-start-date').val();
        tour.endDate = $('#u-end-date').val();
        tour.totalDay = $('#u-total-day').val(); 
        tour.target = $('.rdTarget:checked').val();
                                
        // customers 
        var customers = [];
        $('#list-customers li').each(function(){
            var cu={};
            cu.name = $(this).find('.cu-name').text();
            cu.phone = $(this).find('.cu-phone').text();
            cu.email = $(this).find('.cu-email').text();
            cu.old = $(this).find('.cu-old').text();
            customers.push(cu);
        });
        tour.customers = customers;
        
        // tour detail 
        var trips = [];
        $('#tour-detail li.timeline-item').each(function(){
            var trip = {};
            trip.nid = $(this).data('tdid');
            trip.bday = '1';
            trip.bdaypart=$(this).find('.txtDayPart').val();
            trips.push(trip);
        });
        tour.trips = trips;
        
        console.log(tour);
        jQuery.ajax({
	    method: "POST",
	    async:false,
	    url: ajaxPath,
	    data: {action: "addCustomTour", tour:tour},
	    success: function (response) { 
                //alert(response);
                window.location.href = response;
            }
	});
        
    });
    
    $('#place-tabs .tab').click(function(){
       var ref=$(this).data('ref');
       $('.tab-ref').hide();
       $('#place-tabs .tab').removeClass('current');
       $('#place-'+ref).show();
       $(this).addClass('current');
    });
    
     $("#place-tabs-ref, .tour-detail-2 .content").mCustomScrollbar();
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

