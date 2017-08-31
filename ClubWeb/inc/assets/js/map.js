function initMap() {
  var map;
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat:57.05474, lng:-2.13066},
    zoom: 15
  });

//declarations

var directionsService = new google.maps.DirectionsService;
var directionDisplay = new google.maps.DirectionsRenderer( {
  draggable:true,
  map:map,

});

var distancematrix = new google.maps.DistanceMatrixService();

var latlng = {lat: 57.0617, lng: -2.1295};

//infowindow content
var contentstring = "<p class='text-primary'>This is a test marker</p>";

var infowindow = new google.maps.InfoWindow({
  content: contentstring
});

//marker
var marker = new google.maps.Marker({
  position: latlng,
  map:map,
  title:"test marker"
});

marker.addListener("click", function() {
  infowindow.open(map, marker);
});
//directionDisplay.addListener("directions_changed" function() {
//  computeTotalDistance(directionDisplay.getDirections());
//});

renderRoute("Aberdeen", "Edinburgh", directionsService, directionDisplay);

//render route
function renderRoute(origin, destination, service, display) {
  service.route({
    origin: origin,
    destination: destination,
    travelMode: 'DRIVING',
    avoidTolls: true
  }, function(response, status) {
    if (status === "OK") {
      display.setDirections(response);
    } else {
      alert("Murray's an idiot, here's an error code so you can correct him: " +
       status);
    }
  });
}
function getDistance(origin, destination) {
  distancematrix.getDistanceMatrix( {
    origins: origin,
    destinations: destination,
    travelMode:"BICYCLING",
    drivingOptions: {
      trafficModel: "optimistic"
    },
    unitSystem: "IMPERIAL",
    avoidHighways: false,
    avoidTolls: true,
  }, function(response, status) {
    var results = response.rows[0].elements

    var element = results[0];
    var distance = element.distance.text;
    var duration = element.duration.text;
  });
}

}
