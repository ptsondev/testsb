jQuery(document).ready(function($){	
    ajaxPath = window.location.protocol + "//" + window.location.host+'/ajax-process';           
});



function initialize(lat, lng, z=15) {
    var mapOptions = {
        center: {lat: lat, lng:  lng},
        zoom: z
    };
    this.map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    

//    google.maps.event.addListener(marker, "dragend", function (event) {
//        var markerNewPosition = this.getPosition();
//        alert(markerNewPosition);
//    });
}
//google.maps.event.addDomListener(window, "load", initialize);

function addMarker(nid, lat, lng, title, detail){    
    //  var image = 'pictures/ship2.gif';
      
    var myLatlng = new google.maps.LatLng(lat, lng);
    var marker = new google.maps.Marker({        
        position: myLatlng,
        map: this.map,
        title: title,
        draggable: true,
    //    icon:image
        
        // add more info
        nid : nid
    });
   
    marker.setVisible(true);
    marker.setMap(this.map);

    
    var contentString = '<div class="place-info" style="width:300px;"><h3>'+title+'</h3>'+detail+'</div>';
    google.maps.event.addListener(marker, 'click', function() {
		if (infowindow) {
			infowindow.close();
		}			      
		infowindow = new google.maps.InfoWindow({		
			content: contentString
		});
		infowindow.open(marker.get('map'), marker);    
		//map.setZoom(14);		
		//map.setCenter(marker.getPosition());
    });

    google.maps.event.addListener(marker, "dragend", function(event) { 
        curlat = event.latLng.lat(); 
        curlng = event.latLng.lng(); 
	jQuery('#edit-location-lat').val(curlat);
	jQuery('#edit-location-lng').val(curlng);
    });   
  
    
}
