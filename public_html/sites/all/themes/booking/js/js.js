jQuery(document).ready(function($){	
    isHome = false;
    if($('body').hasClass('front')){
        isHome=true;
    }
    $(window).bind('scroll', function() {
    //	parallax();
    });	
    var ww = window.screen.width;
    
        
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
        
        $('#btn-re-submit').click(function(){            
            var reName = $('#re-name').val();            
            var reEmail = $('#re-email').val();
            var rePass = $('#re-pass').val();
            var rePass2 = $('#re-pass2').val();
            var error = false;
            if(jQuery.trim(reName)==''){                
                $('#re-name').addClass('error');        
                $('#re-name-ems').text('Tên đăng nhập không được để trống..');
                error = true;
            }else{
                $('#re-name').removeClass('error');        
            }
            if(jQuery.trim(reEmail)==''){                
                $('#re-email').addClass('error');        
                $('#re-email-ems').text('Email không được để trống..');
                error = true;
            }else{
                $('#re-email').removeClass('error');        
            }
            if(jQuery.trim(rePass)==''){                
                $('#re-pass').addClass('error');        
                $('#re-pass-ems').text('Mật khẩu không được để trống..');
                error = true;
            }else{
                $('#re-pass').removeClass('error');        
            }
            if(rePass != rePass2){                
                $('#re-pass2').addClass('error');        
                $('#re-pass2-ems').text('Mật khẩu xác nhận không đúng');
                error = true;
            }else{
                $('#re-pass2').removeClass('error');        
            }
            
            if(!error){
                // pass simple case, submit ajax
                jQuery.ajax({
	            method: "POST",
	            async:false,
	            url: ajaxPath,
	                data: {action: "submitCustomRegister", name:reName, email:reEmail, pass:rePass},
	                success: function (response) {
                            if(response=="1"){
                                // đăng ký thành công
                                document.location.href="/";
                            }else{
                                response = jQuery.parseJSON(response);
                                $('#re-name-ems').text(response['name']);
                                $('#re-email-ems').text(response['mail']);                            
                            }
	                }
	        });
            }
        });
        
        if(ww < 800){
            $("body").click(function (e) {
                if (e.target.className !== 'menu' && e.target.id !== 'btnShowMenu') {
                    $('#main-menu').hide();
                }
            });
        }
        
	$('a.dropdown-toggle').click(function(e){
		$(this).next('ul').toggle();
		 e.stopPropagation();
    	e.preventDefault();
	});
	
    if( $('#txtSearchKey').length || $('#txtDes').length){
    		var availablePlaces = [];
	    	jQuery.ajax({
	            method: "POST",
	            async:false,
	            url: ajaxPath,
	                data: {action: "getAvaiablePlaces"},
	                success: function (response) {
	                    availablePlaces = jQuery.parseJSON(response);
	                }
	        });
	    
        $( "#txtSearchPlace, #txtDes, #txtSearchKey" ).autocomplete({
          source: availablePlaces
        });
    };
    
    $('#btnSubmitForgetPass').click(function(){
       var mail = $('#fgEmail').val();
       jQuery.ajax({
	    method: "POST",
	    async:false,
	    url: ajaxPath,
	    data: {action: "ForgetPass", mail:mail},
	    success: function (response) { 
                $('#sms-notice').html(response);
            }
	});
       
    });
    
    $('#txtSearchKey').on('keypress', function (e) {
         if(e.which === 13){
             var place = $(this).val();
             //alert('search');
             window.location.href= fullURL+'/search-result?key='+place;
             //http://sb.dev/search-result?key=Ddasd
         }
   });
   $('#btnShowSearch').click(function(){
      $('#txtSearchKey').toggle(); 
   });
   
    $("#btn-register, #btn-forgetpass, #btnShowLocation, #btnShowPhotos").fancybox();
    
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
    $('#travellers-info').on('click', '.add-customer .fa-plus', function(){
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
    $('#list-todo').on('click', '.add-todo .fa-plus', function(){
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
    
    
    var nscl = ($('#budget-after #nscl').text());
    if(nscl=='' || nscl==0){
        $('#u-expected-budget').keyup(function(){
           nscl = removeFormatNumber($('#u-expected-budget').val()); 
           $('#budget-after #nscl').text(formatNumber(nscl));
        });
    }else{
        nscl = removeFormatNumber(nscl);
    }
    
    // them chi tieu
    $('#list-cost').on('click', '.add-cost .fa-plus', function(){
        if(confirmLogin()){
            var name= $('#list-cost .txtName').val();
            if(name == ''){
                alert('Please enter expense name');
            }else{                
                var type = $('#list-cost .slType').val();
                var quality = $('#list-cost .txtQuality').val();
                var uPrice = removeFormatNumber($('#list-cost .txtUnitPrice').val());
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
                
                nscl -= removeFormatNumber(total);
                $('#budget-after #nscl').text(formatNumber(nscl));
            }
        }
    });
    
    // them thong tin lien he khan cap
    $('#list-urgent-contact').on('click', '.add-urgent-contact .fa-plus', function(){
        if(confirmLogin()){            
            var name= $('#list-urgent-contact .txtFullName').val();
            if(name == ''){
                alert('Please enter name');
            }else{                
                var landline = $('#list-urgent-contact .txtLandline').val();
                var cellphone = $('#list-urgent-contact .txtCellPhone').val();
                var address = $('#list-urgent-contact .txtAddress').val();
                var relationship = $('#list-urgent-contact .txtRelationship').val();
                var note = $('#list-urgent-contact .txtNote').val();
                
                var newRow = '<div class="item">';
                newRow += '<div class="col-sm-2 col-xs-6">'+name+'</div>';
                newRow += '<div class="col-sm-2 col-xs-6">'+landline+'</div>';
                newRow += '<div class="col-sm-2 col-xs-6">'+cellphone+'</div>';
                newRow += '<div class="col-sm-2 col-xs-6">'+address+'</div>';
                newRow += '<div class="col-sm-2 col-xs-6">'+relationship+'</div>';
                newRow += '<div class="col-sm-2 col-xs-6">'+note+'</div>';
                newRow += '<i class="fa fa-times" aria-hidden="true" title="Remove this row"></i></div>';
                $('#list-urgent-contact #urgent-contact-result').append(newRow);
                
                $('#list-urgent-contact .txtFullName').val('');
                $('#list-urgent-contact .txtLandline').val('');
                $('#list-urgent-contact .txtCellPhone').val('');
                $('#list-urgent-contact .txtAddress').val('');
                $('#list-urgent-contact .txtRelationship').val('');
                $('#list-urgent-contact .txtNote').val('');
                
                
            }
        }
    });
    
      // them ticket
    $('#list-ticket').on('click', '.add-ticket .fa-plus', function(){        
        if(confirmLogin()){            
            var datetime= $('#list-ticket .txtDateTime').val();
            if(datetime == ''){
                alert('Please enter datetime');
            }else{                
                var start = $('#list-ticket .txtStart').val();
                var end = $('#list-ticket .txtEnd').val();
                var type = $('#list-ticket .txtType').val();
                var num = $('#list-ticket .txtNum').val();
                var note = $('#list-ticket .txtNote').val();
                
                var newRow = '<div class="item">';
                newRow += '<div class="col-sm-2 col-xs-6">'+datetime+'</div>';
                newRow += '<div class="col-sm-2 col-xs-6">'+start+'</div>';
                newRow += '<div class="col-sm-2 col-xs-6">'+end+'</div>';
                newRow += '<div class="col-sm-2 col-xs-6">'+type+'</div>';
                newRow += '<div class="col-sm-2 col-xs-6">'+num+'</div>';
                newRow += '<div class="col-sm-2 col-xs-6">'+note+'</div>';
                newRow += '<i class="fa fa-times" aria-hidden="true" title="Remove this row"></i></div>';
                $('#list-ticket #ticket-result').append(newRow);
                
                $('#list-ticket .txtDateTime').val('');
                $('#list-ticket .txtStart').val('');
                $('#list-ticket .txtEnd').val('');
                $('#list-ticket .txtType').val('');
                $('#list-ticket .txtNum').val('');
                $('#list-ticket .txtNote').val('');
                
                
                
            }
        }
    });
    
    
    $('#list-todo, #list-cost, #list-urgent-contact').on('click', '.item .fa-times', function(){
       $(this).parents('.item').remove(); 
    });
    
    
    
    if( $('#tour-detail').length){
        var liHeight = 300;    
        var tourTop = $('#tour-detail .timeline').offset().top;    
        $('.timeline-item').draggable();
        $('#tour-detail .timeline').droppable({
            drop: function( event, ui ) {            
                if(ui.offset.top  <  tourTop){
                        console.log('x');
                        $('#tour-detail .timeline ul[data-day=1]').prepend(ui.draggable);
                        ui.draggable.css({top: '0', left:'none'});
                        //return false;
                }else{
                    // tim ra thang tren no de insert no vao sau
                    $('#tour-detail .timeline > ul > li').each(function(){
                        if($(this).attr('fid') != ui.draggable.attr('fid')){
                            var h = $(this).offset().top;
                            if(h+liHeight > ui.offset.top){
                                //console.log($(this));
                                $(this).after(ui.draggable);
                                ui.draggable.css({top: 0, left:'none'});
                                return false;
                            }
                        }
                    });    
                } 
            }
        });       
    }
    
    // Begin customize tour
    $('#btnCustomTour').click(function(){
        if(confirmLogin()){ 
            //$('#tour-detail').animate({ 'zoom': 0.4 }, 400);
            //window.parent.document.body.style.zoom = 0.4;
            $('.edit-mode').show();
            $('.view-mode').hide();
            /*$('html, body').animate({
                scrollTop: $('#main-content').offset().top + 'px'
            }, 'fast');*/
        }
    });
    
    /* 
     * ADD TO FAVORITE LIST
     * */
    $('#btnAddToFavorite').click(function(){
        nid = $(this).data('nid');
        jQuery.ajax({
	    method: "POST",
	    async:false,
	    url: ajaxPath,
	    data: {action: "addToFavorite", nid:nid},
	    success: function (response) { 
                window.location.href = response;
            }
	});
    });
    
    /*
     *  SAVE CUSTOM TOUR 
     */
    $('#btnSaveCustomTour').click(function(){
        var addNew = 1;
        if($(this).hasClass('update')){
            addNew = 0;
        }
        var tour={};
        tour.addNew = addNew;
        tour.id = $('article.node-tour').data('nid');
        if(!tour.id){
            tour.id = $('article.node-custom-tour').data('nid');
        }
        
        // tour information
        tour.background = $('#tour-detail').data('bgid');
        tour.destination = $('#des-ref').data('nid');
        tour.startDate = $('#u-start-date').val();
        tour.endDate = $('#u-end-date').val();
        tour.totalDay = $('#u-total-day').val(); 
        tour.target = $('.rdTarget:checked').val();
        tour.transport = $('.rdTransport:checked').val();
        tour.budget = removeFormatNumber($('#u-expected-budget').val());
                                
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

        // todo works  
        var toDoWorks = [];
        $('#todo-result .item').each(function(){
            var item={};
            item.name = $(this).find('.col-sm-2:nth-child(1)').text();
            item.prio = $(this).find('.col-sm-2:nth-child(2)').text();
            item.human = $(this).find('.col-sm-2:nth-child(3)').text();
            item.time = $(this).find('.col-sm-2:nth-child(4)').text();
            item.status = $(this).find('.col-sm-2:nth-child(5)').text();
            item.note = $(this).find('.col-sm-2:nth-child(6)').text();            
            toDoWorks.push(item);
        });
        tour.toDoWorks = toDoWorks;
        
        // ngan sach
        var expense = [];
        $('#cost-result .item').each(function(){
            var item={};
            item.name = $(this).find('.col-sm-2:nth-child(1)').text();
            item.type = $(this).find('.col-sm-2:nth-child(2)').text();
            item.quantity = $(this).find('.col-sm-2:nth-child(3)').text();
            item.uprice = removeFormatNumber($(this).find('.col-sm-2:nth-child(4)').text());
            item.total = removeFormatNumber($(this).find('.col-sm-2:nth-child(5)').text());
            item.note = $(this).find('.col-sm-2:nth-child(6)').text();            
            expense.push(item);
        });
        tour.expense = expense;
        
        // urgent contact
        var uContact = [];
        $('#urgent-contact-result .item').each(function(){
            var item={};
            item.name = $(this).find('.col-sm-2:nth-child(1)').text();
            item.home_phone = $(this).find('.col-sm-2:nth-child(2)').text();
            item.phone = $(this).find('.col-sm-2:nth-child(3)').text();
            item.address = $(this).find('.col-sm-2:nth-child(4)').text();
            item.relationship = $(this).find('.col-sm-2:nth-child(5)').text();
            item.note = $(this).find('.col-sm-2:nth-child(6)').text();            
            uContact.push(item);
        });
        tour.uContact = uContact;
        
        // ticket info
        var tickets = [];
        $('#ticket-result .item').each(function(){
            var item={};
            item.datetime = $(this).find('.col-sm-2:nth-child(1)').text();
            item.start = $(this).find('.col-sm-2:nth-child(2)').text();
            item.end = $(this).find('.col-sm-2:nth-child(3)').text();
            item.type = $(this).find('.col-sm-2:nth-child(4)').text();
            item.num = $(this).find('.col-sm-2:nth-child(5)').text();
            item.note = $(this).find('.col-sm-2:nth-child(6)').text();            
            tickets.push(item);
        });
        tour.tickets = tickets;
        
        // tour detail 
        var trips = [];
        $('#tour-detail li.timeline-item').each(function(){
            var trip = {};
            trip.name = $(this).find('h3.trip-name').text();
            trip.bday = $(this).parent().data('day');
            trip.bdaypart=$(this).find('.txtDayPart').val();
            trips.push(trip);
        });
        tour.trips = trips;
        
        //console.log(tour.background);
        //return;
        
        jQuery.ajax({
	    method: "POST",
	    async:false,
	    url: ajaxPath,
	    data: {action: "addCustomTour", tour:tour},
	    success: function (response) { 
                //alert(response);
                //console.log(response);
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
     
     // save to image
     $("#btnSaveImage").click(function() { 
         var nid = $(this).data('nid');         
        jQuery.ajax({
            method: "POST",
            async: false,
            url: ajaxPath,
            data: {action: "getFullCustomTourData", nid: nid},
            success: function (response) {
                $('#export-img').html(response);
                // save
                html2canvas($("#export-img"), {
                    onrendered: function(canvas) {
                        theCanvas = canvas;
                        document.body.appendChild(canvas);

                        // Convert and download as image 
                        Canvas2Image.saveAsPNG(canvas); 
                        $("#export-img").html(canvas);       
                        $(document).scrollTop( $("#btnSaveImage").offset().top );  
                    }
                });     
        
            }
        });
                      

    });   
    
     $("#btnSaveImage2").click(function() { 
         var nid = $(this).data('nid');         
        jQuery.ajax({
            method: "POST",
            async: false,
            url: ajaxPath,
            data: {action: "getFullCustomTourData2", nid: nid},
            success: function (response) {
                $('#export-img2').html(response);
                  // save
                html2canvas($("#export-img2"), {
                    onrendered: function(canvas) {
                      //  theCanvas = canvas;
                      //  document.body.appendChild(canvas);

                        // Convert and download as image 
                        Canvas2Image.saveAsPNG(canvas); 
                      //  $("#export-img2").append(canvas);
                      //  // Clean up 
                      //  document.body.removeChild(canvas);
                    }
                });     
            }
        });
                      
       
    });  
    
    // tu tinh ngan sach    
    $('.add-cost .txtUnitPrice, .add-cost .txtQuality').focusout(function(){
       var unit = removeFormatNumber($('.add-cost .txtUnitPrice').val());
       var quantity = $('.add-cost .txtQuality').val();       
       if(jQuery.isNumeric(unit) && jQuery.isNumeric(quantity)){
           var amount = unit*quantity;
           $('.add-cost .txtTotal').val(formatNumber(amount));
       }
    });
    
    // auto them dau . khi nhap gia
    $('#u-expected-budget, .txtUnitPrice').keyup(function (e){
        var k = $(this).val();
        k = formatNumber(k);        
        $(this).val(k);
    });

    if( $('.u-post-tool').length){
        $('.u-post-tool .fa-comments').click(function(){
           var nid = $(this).data('nid');
           $('#u-post-'+nid+' .comment-form').toggle();
        });
    }   
});


function downloadCanvas(link, canvasId, filename) {
    link.href = document.getElementById(canvasId).toDataURL();
    link.download = filename;
}
    
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



function parallax() {
    var win_width = $( window ).width();
    
        var scrollPos = $(window).scrollTop();		    
        if(scrollPos >100){	
            $('#header-r2').addClass('active');
            if(win_width > 700){
                $('#bcform-search-destination').insertAfter($('#site-logo'));
            }
        }else{
            if(isHome){
                $('#header-r2').removeClass('active');	
            }        
        }
}

function formatNumber (num) {
    num = num.toString();
    num = num.replace(/\,/g, '');
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

function removeFormatNumber(num){
    if(!num){
        return 0;
    }
    return parseInt(num.replace(/\,/g, ''));
}