window.onload = iniciar;

function iniciar() {
  getLocation();
}

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
  }
  else{
    window.alert("Geolocalização não é suportado pelo navegador.");
  }
}

function showPosition(position) {
  console.log(position);

  lat = position.coords.latitude;
  lon = position.coords.longitude;

  mapa = document.getElementById('mapa');
  mapa.style.height='100%';
  mapa.style.width='100%';

  latlon=new google.maps.LatLng(lat, lon)
  var myOptions={
    center:latlon,
    zoom:14,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false,
    navigationControlOptions: {
      style:google.maps.NavigationControlStyle.SMALL
    }
  };
  var map=new google.maps.Map(document.getElementById("mapa"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
}

function showError(error) {
  var error = null;
  switch(error.code) {
    case error.PERMISSION_DENIED:
      error = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      error = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      error = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      error = "An unknown error occurred."
      break;
  }
  if (error != null) {
    window.alert(error);
  }
}
