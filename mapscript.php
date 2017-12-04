
<script>
$("#checkbox1").click(function(){
	
	var cust_id =$("#checkbox1").val();
	var type = 1;
	document.cookie = cust_id;
	//style="display: none;
	
//	$("#product_view2").hide();
	
	
	$.ajax({
                    type: "POST",
                    url: 'ajax.php',
                    data: {
			cust_id:cust_id,
			condition_type: type, 
			},
			
                    success: function (response) {
			$("#company_res").html(response);
			},
			 error: function(jqXHR, status, err){
				alert(jqXHR.responseText);
			    }

});
	
	
});


</script>
<script>
$("#submit_company").click(function(){
	
	//$("#product_view2").hide();
	
	var myArray = [];
    $(":checkbox:checked").each(function() {
        myArray.push(this.value);
    });

   var values=myArray.join(",");
   var cust_id = document.cookie;
	
	var valid_cust_id=cust_id.split(";");
	var final_cust_id=valid_cust_id[0];
	
	$.post("ajax.php",  {'cust_id' : final_cust_id , condition_type: '2' , 'countries': values}  , function(response){
		
		//alert(response); return false;
		$("#fields_res").html(response);
		
	})
	
});

</script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCYVYQPAkMd4xAzjUq5UnBIfatKdYE0CCg&extension=.js'></script> 

<script>
$("#submit_field").click(function(){
	
/*	var myArray = [];
    $(":checkbox:checked").each(function() {
        myArray.push(this.value);
    });
*/    
//   var values=myArray.join(",");
  
	var cust_id = document.cookie;
	
	var valid_cust_id=cust_id.split(";");
	var final_cust_id=valid_cust_id[0];
var cheValues =$(':Checkbox:checked').map(function() {return this.value;}).get().join(',');//	alert(cheValues);return false;

	$.post("ajax.php",  {'cust_id' : final_cust_id , condition_type: 3 , 'fields': cheValues}  , function(response){
	 $("#map").append("<b>Appended text</b>");
		var asset_loc_lat = [];
                var asset_loc_long = [];
                var asset_id = [];
		var asset_name = [];
		alert(response);// return false;  
		$("#asset_res").html(response);
		$.each($('#mapForm').serializeArray(), function(index, value){
                    //alert($('[name="' + value.name + '"]').attr('lat') + $('[name="' + value.name + '"]').attr('long'));
                    asset_loc_lat.push($('[name="' + value.name + '"]').attr('lat'));
                    asset_loc_long.push($('[name="' + value.name + '"]').attr('long'));
                    asset_id.push($('[name="' + value.name + '"]').val());
		    asset_name.push($('[name="' + value.name + '"]').attr('asset_name'));
                });
                console.log(asset_loc_lat);
                console.log(asset_loc_long);
                console.log(asset_id);
load(asset_id,asset_loc_lat,asset_loc_long,asset_name) ;
          
 
		//callMapFunction(asset_id,asset_loc_lat,asset_loc_long,asset_name);

	});
	
});

var markers = [];
/*
setInterval(function () {

var condition_type =3;
	//var fields = $.cookie('storeAssets');
	//alert('<?php print_r($_SESSION["question"]) ?>');

	var values = '<?php print_r($_SESSION["question"]) ?>';
	
	var cust_id = document.cookie;
	
	var valid_cust_id=cust_id.split(";");
	var final_cust_id=valid_cust_id[0];
	
	
		$.ajax({
			type:'POST',
			data:{
				cust_id: final_cust_id,
				condition_type : 3,
				fields: values			
			},
			url:'ajax.php',
			success:function(response){
				//$("#asset_res").html(response);
				var asset_loc_lat = [];
				var asset_loc_long = [];
				var asset_id = [];
				var asset_name = [];
				$.each($('#mapForm').serializeArray(), function(index, value){
				    //alert($('[name="' + value.name + '"]').attr('lat') + $('[name="' + value.name + '"]').attr('long'));
				    asset_loc_lat.push($('[name="' + value.name + '"]').attr('lat'));
				    asset_loc_long.push($('[name="' + value.name + '"]').attr('long'));
				    asset_id.push($('[name="' + value.name + '"]').val());
				    asset_name.push($('[name="' + value.name + '"]').attr('asset_name'));
				});
				console.log(asset_loc_lat);
				console.log(asset_loc_long);
				console.log(asset_id);
				DeleteMarkers(asset_id,asset_loc_lat,asset_loc_long,asset_name);
				BindMarker(asset_id,asset_loc_lat,asset_loc_long,asset_name);
				//callMapFunction(asset_id,asset_loc_lat,asset_loc_long,asset_name);
				load(asset_id,asset_loc_lat,asset_loc_long,asset_name) ;

			}
		});
	}

    
}, 25000);
*/	
function DeleteMarkers() {
    //Loop through all the markers and remove
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }


    markers = [];
};

var map = null;
var infoWindow = null;

function load(asset_id,asset_loc_lat,asset_loc_long,asset_name) {//alert(asset_id.length);
    map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(-29.86519774, 30.98538962),
        zoom: 15,
	mapTypeId: google.maps.MapTypeId.HYBRID, 
        //mapTypeId: 'terrain',
			styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":13}]}
,{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#144b53"},{"lightness":14},{"weight":1.4}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#08304b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#0c4152"},{"lightness":5}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#0b434f"},{"lightness":25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#0b3d51"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"transit","elementType":"all","stylers":[{"color":"#146474"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#021019"}]}]
        
    });


    infoWindow = new google.maps.InfoWindow;

    // Change this depending on the name of your PHP file
    BindMarker(asset_id,asset_loc_lat,asset_loc_long,asset_name);
}


function BindMarker(asset_id,asset_loc_lat,asset_loc_long,asset_name) {
var bounds = new google.maps.LatLngBounds();
locations = [];
	for(ass_id = 0;ass_id < asset_id.length;ass_id++){
		locations.push([asset_name[ass_id], 'undefined', 'Latitude:'+ asset_loc_lat[ass_id], 'Longitude' + asset_loc_long[ass_id],
	'undefined', asset_loc_lat[ass_id], asset_loc_long[ass_id], 'https://mapbuildr.com/assets/img/markers/solid-pin-blue.png',asset_id[0]]);

	}
console.log(locations);

for (i = 0; i < locations.length; i++) {
			if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
			if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
			if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
		   if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
		   if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
		   if (locations[i][8] =='undefined'){ asset_id ='';} else { asset_id = locations[i][8];}
			// Let's also add a marker while we're at it
			var marker = new google.maps.Marker({
			    icon: markericon,
				position: new google.maps.LatLng(locations[i][5], locations[i][6]),
				map: map,
				title: locations[i][0],
				desc: description,
				tel: telephone,
				email: email,

				web: web,

				asset_id:asset_id

			});
				markers.push(marker);
				link = '';      
				bounds.extend(marker.position);      
				bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link,asset_id);
				

		}
map.fitBounds(bounds);

}


function bindInfoWindow(marker, map, title, desc, telephone, email, web, link,asset_id) {

				

	var infoWindowVisible = (function () {

		  var currentlyVisible = false;

		  return function (visible) {

			  if (visible !== undefined) {

				  currentlyVisible = visible;

			  }

			  return currentlyVisible;

		   };

	   }());

	   iw = new google.maps.InfoWindow();

	   google.maps.event.addListener(marker, 'click', function() {

		   if (infoWindowVisible()) {

			   iw.close();

			   infoWindowVisible(false);

		   } else {

			   var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><h4>"+title+"</h4><p>"+desc+"<p><p>"+telephone+"<p>"+email+"<br><a href='javascript:void(0);' onclick='comcheck( " + asset_id + " )'>Go To...</a></div>";

			   iw = new google.maps.InfoWindow({content:html});

			   iw.open(map,marker);

			   infoWindowVisible(true);

			   

		   }

		});

			

	google.maps.event.addListener(iw, 'closeclick', function () {

		infoWindowVisible(false);

	});



 	}

function doNothing() { }

function comcheck(asset_id){
//alert(asset_id);

$.getJSON("linegraph.php", { id: 1 }, function(json) {
                var chart;
                 $(document).ready(function(){
                
                    chart = new Highcharts.Chart({
                        chart: {
                            renderTo: 'mygraph',
                            type: 'line'
                            
                        },
                        title: {
                            text: 'Line Graph'
                            
                        },
                        subtitle: {
                            text: 'Frequency'
                        
                        },
                        xAxis: {
                            categories: json[0]['hour'],
                             title: {
                                text: 'Time(24 hrs Format)'
                            },
                        },
                        yAxis: {
                            title: {
                                text: 'Frequency'
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            formatter: function() {
                                    return '<b>'+ this.series.name +'</b><br/>'+
                                    this.x +': '+ this.y;
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                            x: -10,
                            y: 120,
                            borderWidth: 0
                        },
                        series: json
                    });
                });
            
            });


}

</script>
