var map;
var service;
var infowindow;

function initMap() {
  var centerPlace = {lat: 42.2453603, lng: 42.3951167};

  infowindow = new google.maps.InfoWindow();

  map = new google.maps.Map(
      document.getElementById('map'), {center: centerPlace, zoom: 5});

  var request = {
    query: 'tbc',
    fields: ['name', 'geometry'],
  };

  var service = new google.maps.places.PlacesService(map);

  service.findPlaceFromQuery(request, function(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
        createMarker(results[i]);
      }
      map.setCenter(centerPlace);
    }
    console.log(status);
  });
}

function toggleResp() {
    var x = document.getElementById("headerTopnav");
    if (x.className === "topnav-c") {
        x.className += " responsive";
    } else {
        x.className = "topnav-c";
    }
}