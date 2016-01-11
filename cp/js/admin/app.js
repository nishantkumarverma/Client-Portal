var apiURL="http://thinkless.in/cpapi/index.php/";
var appURL="http://thinkless.in/cp/index.php/";
var userLatitude=0;
var userLongitude=0;
$(document ).ready(function() {
});
function displayLoading(){
$("#loadingDiv").leanModal('show');
}

function hideLoading(){
$("#loadingDiv").leanModal("hide");
}

function displayErrorMessage(title,message,type){
hideLoading();
Alert(title,message,type);
}

function Alert (title,message,type) {
 toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    positionClass:'toast-bottom-left',
                    onclick: null
                };
				
				switch (type) {
    case "error":
       toastr.error(message,title);
        break;
    case "info":
       toastr.info(message,title);
        break;
    case "success":
         toastr.success(message,title);
        break;
	case "warning":
         toastr.warning(message,title);
        break;
	default:
         toastr.warning(message,title);
        break;
   }
}

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
console.log("userLatitude="+userLatitude);
  userLatitude=position.coords.latitude;
  userLongitude=position.coords.longitude;
}

function initialize_locality()
{
if(google==undefined){
alert("Error","Check your internet connection and reload the page");
}
        var input = document.getElementById('iAddress');
        var autocomplete = new google.maps.places.Autocomplete(
                /** @type {HTMLInputElement} */(input),
                {
                    types: ['geocode']

                });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            document.getElementById('iLatitude').value = place.geometry.location.lat();
            document.getElementById('iLongitude').value = place.geometry.location.lng();
			userLatitude=place.geometry.location.lat();
			userLongitude=place.geometry.location.lng();
			getPinCode(place.geometry.location.lat(),place.geometry.location.lng());
			displayMap(place.geometry.location.lat(),place.geometry.location.lng());
            var address = '';
            if (place.address_components)
            {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
            
        });
}

function getPinCode(latitude,longitude){
	var latlng = new google.maps.LatLng(latitude,longitude);
			geocoder = new google.maps.Geocoder();

    geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
		//console.log(results[0]);
            if (results[0]) {
                for (j = 0; j < results[0].address_components.length; j++) {
                    if (results[0].address_components[j].types[0] == 'postal_code')
                       // alert("Zip Code: " + results[0].address_components[j].short_name);
					    $('#iPincode').val(results[0].address_components[j].short_name);
						//console.log(results[0]);
						
						//getAddressInfoByZip(results[0].address_components[j].short_name);
						
						
                }
            }
        } else {
            alert("Failed to get pincode! Type is manually");
        }
    });
	
}



function displayMap(userLatitude,userLongitude){

 if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
if(userLatitude==0 && userLongitude==0){
userLatitude=position.coords.latitude;
userLongitude=position.coords.longitude;
}
console.log("userLatitude="+userLatitude);
var markers = [
        {
            "title": 'Current Location',
            "lat": userLatitude,
            "lng": userLongitude,
            "description": ''
        }
    ];
	console.log(markers);
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 6
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var geocoder = geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        for (var i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title,
                draggable: true,
                animation: google.maps.Animation.DROP
            });
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
                google.maps.event.addListener(marker, "dragend", function (e) {
                    var lat, lng, address;
                    geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            lat = marker.getPosition().lat();
                            lng = marker.getPosition().lng();
                            address = results[0].formatted_address;
							$("#iLongitude").val(lng);
							$("#iAddress").val(address);
							$("#iLatitude").val(lat);
                            //alert("Latitude: " + lat + "\nLongitude: " + lng + "\nAddress: " + address);
                        }
                    });
                });
            })(marker, data);
            latlngbounds.extend(marker.position);
        }
        var bounds = new google.maps.LatLngBounds();
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
    }, function() {
      //handleLocationError(true, infoWindow, map.getCenter());
    });
	}

}

var roundUpto = function(number, upto){
    return Number(number.toFixed(upto));
} 
function alert(errorTitle,message,alertType,messageType){
if(errorTitle==""){
swal(message, alertType);
}else{
swal(errorTitle, message, alertType);
}
}