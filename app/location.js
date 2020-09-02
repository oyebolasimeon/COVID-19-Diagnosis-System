if (navigator.geolocation) {
    //
}

function successCallback (position) {

    $(document).ready(function(){
        
          if (confirm("Turn on your device location for system full functionality")) {
           var userlat = position.coords.latitude;
           var userlng = position.coords.longitude;
           console.log("current latitude ", userlat); 
           console.log("current longitude", userlng);

            $(document).ready(function() {
            
                var phpuserlat = userlat;
                var phpuserlng = userlng;
                
                $.ajax({
                    type: "POST",
                    url: 'gpsreport.php',
                    data : {
                        phpuserlat : phpuserlat,
                        phpuserlng : phpuserlng 
                    },
                    success: function(data)
                    {
                        
                       console.log(data);
                    }
                });
            
        });
    


    //google api
    var coords = new google.maps.LatLng(userlat,userlng);

    var mapoptions = {
        zoom: 16,
        center: coords,
        mapTypeId: google.maps.MapTypeId.HYBRID
    }

    var map = new google.maps.Map(document.getElementById("map"), mapoptions);

    var marker = new google.maps.Marker({map: map, position: coords, icon : {
        path: google.maps.SymbolPath.CIRCLE,
        scale: 8.5,
        fillColor: "#F00",
        fillOpacity: 0.4,
        strokeWeight: 0.4
    }});
          } else {
            
            location.replace("https://www.teamcovid.dcig.com.ng/restricted")
          }
    });

	

    

}

navigator.geolocation.getCurrentPosition(successCallback);

function errorCallback (error) {
    console.log(error.message);
}

navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
var watchId = navigator.geolocation.watchPosition(successCallback);
navigator.geolocation.clearWatch(watchId);