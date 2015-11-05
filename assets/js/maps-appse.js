$(document).ready(function() {

	var mapCenter = new google.maps.LatLng(1.257834, 109.230453); //Koordinat Awal Google map
	var map;
	
	map_initialize(); // initialize google map
	
	//############### Google Map Initialize ##############
	function map_initialize()
	{
			var googleMapOptions = 
			{ 
				center: mapCenter, // map center
				zoom: 5, //zoom level, 0 = earth view to higher value
				maxZoom: 12,
				minZoom: 5,
				zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL //zoom control size
			},
				scaleControl: true, // enable scale control
				mapTypeId: google.maps.MapTypeId.ROADMAP // Tipe Google Map
			};
		
		   	map = new google.maps.Map(document.getElementById("kanvas_map"), googleMapOptions);			
			
			//Load Markers from the XML File, Check (map_process.php)
			$.get("assets/include/map_process.php", function (data) {
				$(data).find("marker").each(function () {
					  var lokasi 		= $(this).attr('lokasi');
					  //var address 	= '<p>'+ $(this).attr('address') +'</p>';
					  //var type 		= $(this).attr('type');
					  var ket           = '<p> </p>';
					  var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
					  create_marker(point, lokasi, ket, false, false, false, "assets/icons/pin_ina.png");
				});
			});	
			
			//Right Click to Drop a New Marker
			/*google.maps.event.addListener(map, 'rightclick', function(event) {
				//Edit form to be displayed with new marker
				var EditForm = 
				'<p>'+
					'<div class="marker-edit">'+
						'<form action="ajax-save.php" method="POST" name="SaveMarker" id="SaveMarker">'+
						'<label for="pLokasi"><span>Nama Lokasi :</span><input type="text" name="pLokasi" class="save-lokasi" placeholder="Lokasi" maxlength="40" /></label>'+
						'</form>'+
					'</div>'+
				'</p>'+
				'<button name="save-marker" class="save-marker">Save Lokasi</button>';

				//Drop a new Marker with our Edit Form
				create_marker(event.latLng, 'Tambah Lokasi', EditForm, true, true, true, "assets/icons/pin_blue.png");
			});*/
										
	}
	
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
		//var removeBtn 	= contentString.find('button.remove-marker')[0];
		//var saveBtn 	= contentString.find('button.save-marker')[0];
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
	
	//############### Remove Marker Function ##############
	/*function remove_marker(Marker)
	{
		
		/* determine whether marker is draggable 
		new markers are draggable and saved markers are fixed */
		/*if(Marker.getDraggable()) 
		{
			Marker.setMap(null); //just remove new marker
		}
		else
		{
			//Remove saved marker from DB and map using jQuery Ajax
			var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
			var myData = {del : 'true', latlang : mLatLang}; //post variables
			$.ajax({
			  type: "POST",
			  url: "assets/include/map_process.php",
			  data: myData,
			  success:function(data){
					Marker.setMap(null); 
					alert(data);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError); //throw any errors
				}
			});
		}

	}*/
	
	//############### Save Marker Function ##############
	/*function save_marker(Marker, mLokasi, replaceWin)
	{
		//Save new marker using jQuery Ajax
		var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
		var myData = {lokasi : mLokasi, latlang : mLatLang }; //post variables
		console.log(replaceWin);		
		$.ajax({
		  type: "POST",
		  url: "assets/include/map_process.php",
		  data: myData,
		  success:function(data){
				replaceWin.html(data); //replace info window with new html
				Marker.setDraggable(false); //set marker to fixed
				Marker.setIcon('assets/icons/pin_ina.png'); //replace icon
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //throw any errors
            }
		});
	}*/

});