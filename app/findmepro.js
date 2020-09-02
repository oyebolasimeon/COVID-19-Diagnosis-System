

if (navigator.geolocation) {
    // supported
}

function successCallback (position) {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "data.php", true);
    ajax.send();
    
	var userlat = position.coords.latitude;
	var userlng = position.coords.longitude;

    console.log("current latitude ", userlat); 
    console.log("current longitude", userlng);

    //ajax code to parse to php
   
    

    

    //google api
    var coords = new google.maps.LatLng(userlat,userlng); 
    //var coords = new google.maps.LatLng(6.5830912,3.3456128);

    var mapoptions = {
    	zoom: 16,
    	center: coords,
    	mapTypeId: google.maps.MapTypeId.HYBRID
    }

    var map = new google.maps.Map(document.getElementById("map"), mapoptions);



    var marker = new google.maps.Marker({map: map, position: coords, icon : {
        path: google.maps.SymbolPath.CIRCLE,
        scale: 50.5,
        fillColor: "#F00",
        fillOpacity: 0.4,
        strokeWeight: 0.4
    }});

}

navigator.geolocation.getCurrentPosition(successCallback);

function errorCallback (error) {
    console.log(error.message);
}

navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
var watchId = navigator.geolocation.watchPosition(successCallback);
navigator.geolocation.clearWatch(watchId);