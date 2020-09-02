var map;
var geocoder;

function loadMap() {
    var pune = {lat: 6.5568767999999995, lng: 3.3325056};
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: pune
    });

    var marker = new google.maps.Marker({
        position: pune,
        map: map
    });

    var cdata = JSON.parse(document.getElementById('data').innerHTML);
    geocoder = new google.maps.Geocoder();

    var alldata = JSON.parse(document.getElementById('alldata'));
    showallcolleges(alldata)
}

function showallcolleges(alldata) {
    Array.prototype.forEach.call(alldata, function(data){
            var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.lat, data.lng),
            map: map
        });
    })
} 