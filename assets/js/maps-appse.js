// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

function initAutocomplete() {
  var map = new google.maps.Map(document.getElementById('kanvas_map'), {
    center: {lat: 1.257834, lng: 109.230453},
    zoom: 5, //zoom level, 0 = earth view to higher value
    maxZoom: 14,
    minZoom: 5,
    zoomControlOptions: {
    style: google.maps.ZoomControlStyle.SMALL //zoom control size
    },
    scaleControl: true, // enable scale control
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  //Load Markers from the XML File, Check (map_process.php)
  $.get("assets/include/map_process.php", function (data) {
    $(data).find("marker").each(function () {
        var lokasi    = $(this).attr('lokasi');
        //var address   = '<p>'+ $(this).attr('address') +'</p>';
        //var type    = $(this).attr('type');
        var ket           = '<p> </p>';
        var point   = new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
        create_marker(point, lokasi, ket, false, false, false, "assets/icons/pin_ina.png");
    });
  }); 

  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];
  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location
      }));

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
  // [END region_getplaces]

  //############### Create Marker Function ##############
function create_marker(MapPos, MapTitle, MapDesc, InfoOpenDefault, DragAble, Removable, iconPath)
{             
  
  //new marker
  var marker = new google.maps.Marker({
    position: MapPos,
    map: map,
    draggable:DragAble,
    animation: google.maps.Animation.DROP,
    title: MapTitle,
    icon: iconPath
  });
  
  //Content structure of info Window for the Markers
  var contentString = $('<div>'+
  '<div class="marker-inner-win"><span class="info-content">'+
  '<h1 class="marker-heading">'+MapTitle+'</h1>'+
  MapDesc+ 
  '</span><button name="daftar-dokumen" class="daftar-dokumen" title="Daftar Dokumen">.:: Dokumen ::.</button>'+
  '</div></div>');  

  
  //Create an infoWindow
  var infowindow = new google.maps.InfoWindow();
  //set the content of infoWindow
  infowindow.setContent(contentString[0]);

  //Find remove button in infoWindow
  //var removeBtn   = contentString.find('button.remove-marker')[0];
  //var saveBtn   = contentString.find('button.save-marker')[0];
  var dokBtn = contentString.find('button.daftar-dokumen')[0];

  //add click listner to dokumen button
  google.maps.event.addDomListener(dokBtn, "click", function(event) {
    window.location='maps/maps_search/'+MapTitle;
  });
  //add click listner to remove marker button
  /*google.maps.event.addDomListener(removeBtn, "click", function(event) {
    remove_marker(marker);
  });*/
  
  /*if(typeof saveBtn !== 'undefined') //continue only when save button is present
  {
    //add click listner to save marker button
    google.maps.event.addDomListener(saveBtn, "click", function(event) {
      var mReplace = contentString.find('span.info-content'); //html to be replaced after success
      var mLokasi = contentString.find('input.save-lokasi')[0].value; //name input field value
      //var mDesc  = contentString.find('textarea.save-desc')[0].value; //description input field value
      //var mType = contentString.find('select.save-type')[0].value; //type of marker
      
      if(mLokasi =='')
      {
        alert("Masukkan Nama Lokasi Dahulu");
      }else{
        save_marker(marker, mLokasi, mReplace); //call save marker function
      }
    });
  }*/
  
  //add click listner to save marker button    
  google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker); // click on marker opens info window 
    });
    
  if(InfoOpenDefault) //whether info window should be open by default
  {
    infowindow.open(map,marker);
  }
}
}

