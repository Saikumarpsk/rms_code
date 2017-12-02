<!DOCTYPE html>

<?php
	
    
    include './db_check.php';
    
    include './db_connect.php';
    
    $user_id=$_SESSION["user_id"];    
		
    $sql = "select * from user_mapping where user_id = '$user_id' "; 
    $result = mysql_query($sql, $link);

    while($row4 = mysql_fetch_array($result))
    {
            $customer_id = $row4["customer_id"];
    }

    $cus_sql = "select * from customer where customer_id = '$customer_id' "; 
    $cus_result = mysql_query($cus_sql , $link);
	
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RMSS</title>
<!-- Base Styles -->
<!-- AnimationCSS -->
<link rel="stylesheet" href="css/animate.min.css">
<link href="css/animate.css" rel="stylesheet" >

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<!-- Theme Styles -->
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<link rel="stylesheet" href="css/gs.min.css">
<link rel="stylesheet" href="css/gs-skins.min.css">
<link rel="stylesheet" href="css/datepicker3.css">
<!-- Fontawesome -->
<link href="css/font-awesome.min.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
            /* Set a size for our map container, the Google Map will take up 100% of this container */
            #map {
                width: 750px;
                height: 500px;
            }
        </style>
        
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header"> 
    <!--<a href="#" class="logo" > <span class="logo-mini"><b>KHive</b></span> <span class="logo-lg"><b>KloudHive</b></span> </a>-->
    <nav class="navbar navbar-static-top">
      <div class="row">
        <div class="col-md-2 col-xs-5"> <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> </div>
        <div class="col-md-8 col-xs-5">
          <h1 class="logo-txt hidden-xs "> Remote Monitoring & Surveillance System </h1>
        </div>
        <div class="col-md-2 col-xs-2">
          <div class="pull-right"> <span class="nav_trigger_rmss"><i class="fa fa-navicon"></i></span> </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- ============sidebar start here=================================== -->
  <aside class="main-sidebar" >
    <section class="sidebar">
      <div class="user-panel">
        <div><a href="../Dashboard.html"><img style="margin: 0 auto; text-align: center;" src="images/home-icon.png" class="img-responsive" width="25px" alt=""> </a> </div>
      </div>
      <div>
        <ul class="sidebar-menu" >
          <li><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#product_view"><img src="images/li-icon1.png"></a></li>
          <li><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#product_view2"><img src="images/li-icon2.png"></a></li>
          <li><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#product_view3"><img src="images/li-icon3.png"></a></li>
          <li><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#product_view4"><img src="images/li-icon4.png"></a></li>
        </ul>
      </div>
      <div class="clearfix"></div>
      <form>
      <div class="asset-list"   id="asset_res">
        <!--ul>
          <li><a href="#">Asset 1</a></li>
          <li><a href="#">Asset 2</a></li>
          <li><a href="#">Asset 3</a></li>
          <li><a href="#">Asset 4</a></li>
          <li><a href="#">Asset 5</a></li>
          <li><a href="#">Asset 6</a></li>
          <li><a href="#">Asset 7</a></li>

        </ul-->
      </div>
          </form>
    </section>
  </aside>
  <!-- =========== Content wrapper start here==================================== -->
  <div class="content-wrapper" id="wrapper_rmss"> 
    <!-- <section class="content-header">
      <h1> Remote Monitoring & Surveillance System </h1>     
    </section>--> 
    
    <!-- =========== Content start here==================================== -->
    <section  class="content">
        
        
       <div id="successcheck"></div>
        <div id="map"></div>
      <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.720151017677!2d78.40704611443944!3d17.425212688055957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91351865fc65%3A0x98527a16d03c171a!2sKellton+Tech!5e0!3m2!1sen!2sin!4v1511936152905" width="100%" height="520" frameborder="0" style="border:0; bottom: 0px;" allowfullscreen></iframe>-->
      <div id="push_sidebar" class="pushsidebar">
        <div class="allaram-set">
          <h4 class="text-center">Alarm total = 90</h4>
          <div class="row">
            <div class="col-lg-6"><p><img src="images/moto-temp.png">&nbsp; Motor temp = 15 </p></div>
            <div class="col-lg-6"><p><img src="images/deishcharge-press.png">&nbsp; Discharge Pres= 15</p></div>
            <div class="col-lg-6"><p><img src="images/intake-press.png">&nbsp; Intake Pres = 30</p></div>
            <div class="col-lg-6"><p><img src="images/other-circle.png">&nbsp; Other = 30</p></div>
          </div>
        </div>
        <hr>
        <div class="table-list">
          <div class="row">
            <div class="table-responsive col-md-12">
              <table id="sort2" class="table table-hover table-striped table-bordered  table-responsive">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Title</th>
                    <th>Title</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <hr>
        <div class="allaram-status">
          <h4 class="text-center">Status</h4>
          <div class="row">
            <div class="col-lg-6">
              <p><img src="images/faild-icon.png">&nbsp; Failed = </p>
              <p><img src="images/stopped-icon.png">&nbsp; Stopped = </p>
              <p><img src="images/running-icon.png">&nbsp; Running = </p>
            </div>
            <div class="col-lg-6">
              <p> <img src="images/woopt-iocn.png">&nbsp; WO Opt = </p>
              <p> <img src="images/woinstalation-icon.png">&nbsp; WO Installation = </p>
              <p> <img src="images/wopull-icon.png">&nbsp; WO Pull = </p>
            </div>
          </div>
        </div>
      </div>
    </section>
   <div class="modal fade product_view" id="product_view">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"> <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
            <h3 class="modal-title">Customers</h3>
          </div>
          <div class="modal-body">
            <div class="row">
             
            <div class="col-md-4">
			<?php
				//print_r($cus_result);die;
			while($val1 = mysql_fetch_array($cus_result))
			{
				
				
				?>
		      
                <div>
                  
				  <a href="#product_view2" data-toggle="modal" data-dismiss="modal">  <input type="checkbox" name="checkbox" id="checkbox1"  value="<?=$val1["customer_id"]?>" ></a>
                  <label for="checkbox1"><?=isset($val1["cust_name_parent"])?$val1["cust_name_parent"]:'None'?></label>
				  
                </div>
			<?php }
				?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<div class="modal fade product_view" id="product_view2">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"> <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
            <h3 class="modal-title">Countries</h3>
          </div>
          <div class="modal-body">
            <div class="row">
             
            <div class="col-md-4">
                <div id="company_res">
                  <!--input type="checkbox" name="checkbox" id="checkbox1" checked="">
                  <label for="checkbox1">First Option default 2</label-->
                </div>
				 <a href="#product_view3" data-toggle="modal" data-dismiss="modal"><input type="button" id="submit_company"  value="submit"></a>
               
				
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<div class="modal fade product_view" id="product_view3">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"> <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
            <h3 class="modal-title">Fields</h3>
          </div>
          <div class="modal-body">
            <div class="row">
             
            <div class="col-md-4">
                <div id="fields_res">
                  <!--input type="checkbox" name="checkbox" id="checkbox1" checked="">
                  <label for="checkbox1">First Option default 3</label-->
                </div>
              
			   <a href="#" data-toggle="modal" data-dismiss="modal"> </a>
<input type="button" id="submit_field"  value="submit">
				
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	
	<!--<div class="modal fade product_view" id="product_view4">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"> <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
            <h3 class="modal-title">Assets</h3>
          </div>
          <div class="modal-body">
            <div class="row">
             
            <div class="col-md-4">
                <div>
                  <input type="checkbox" name="checkbox" id="checkbox1" checked="">
                  <label for="checkbox1"></label>
                </div>
              
				
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->
	<div class="panel-body">
         <div id ="mygraph"></div>
    </div>
  </div>
  
  <!-- ==========footer start here ===================================== --> 
  
</div>
<script src="js/jquery-2.2.3.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/app.min.js"></script> 
<script>
$(".nav_trigger_rmss").click(function() {
	$(".content-wrapper").toggleClass("show_sidebar_rmss");

});
</script>
<script>
$("#checkbox1").click(function(){
	
	var cust_id =$("#checkbox1").val();
	document.cookie = cust_id;
	//style="display: none;
	
	$("#product_view2").hide();
	
	$.post("ajax.php",  {'cust_id' : cust_id , condition_type: '1' }  , function(response){
		
		$("#company_res").html(response);
		
	})
	
	
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
		
		
		$("#fields_res").html(response);
		
	})
	
});

</script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCYVYQPAkMd4xAzjUq5UnBIfatKdYE0CCg&extension=.js'></script> 
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
    
$("#submit_field").click(function(){
	
	var myArray = [];
    $(":checkbox:checked").each(function() {
        myArray.push(this.value);
    });
    
   var values=myArray.join(",");
  
	var cust_id = document.cookie;
	
	var valid_cust_id=cust_id.split(";");
	var final_cust_id=valid_cust_id[0];
	
	$.post("ajax.php",  {'cust_id' : final_cust_id , condition_type: '3' , 'fields': values}  , function(response){
		var asset_loc_lat = [];
                var asset_loc_long = [];
                var asset_id = [];
		//alert(response);
		$("#asset_res").html(response);
		$.each($('form').serializeArray(), function(index, value){
                    //alert($('[name="' + value.name + '"]').attr('lat') + $('[name="' + value.name + '"]').attr('long'));
                    asset_loc_lat.push($('[name="' + value.name + '"]').attr('lat'));
                    asset_loc_long.push($('[name="' + value.name + '"]').attr('long'));
                    asset_id.push($('[name="' + value.name + '"]').val());
                });
                console.log(asset_loc_lat);
                console.log(asset_loc_long);
                console.log(asset_id);

		callMapFunction(asset_id,asset_loc_lat,asset_loc_long);

	})
	
});

function callMapFunction(asset_id,asset_loc_lat,asset_loc_long){
var conLoaded = document.getElementById('submit_field');
google.maps.event.addDomListener(conLoaded, 'click', init);

function init(){
		var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 5,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(20.5937, 78.9629), // New York
					mapTypeId: google.maps.MapTypeId.ROADMAP,
                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":13}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#144b53"},{"lightness":14},{"weight":1.4}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#08304b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#0c4152"},{"lightness":5}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#0b434f"},{"lightness":25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#0b3d51"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"transit","elementType":"all","stylers":[{"color":"#146474"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#021019"}]}]
                };

locations = [];
	for(ass_id = 0;ass_id < asset_id.length;ass_id++){
		locations.push(['Headquarter', '<address>Via Ottavio Assarotti, 10 - Torino <br /> 10122 Italy</address>', 'Phone: +39 011 549444', 'undefined',
	'undefined', asset_loc_lat[ass_id], asset_loc_long[ass_id], 'https://mapbuildr.com/assets/img/markers/solid-pin-blue.png',asset_id[0]]);

	}

	console.log(locations);

	var mapElement = document.getElementById('map');
var bounds = new google.maps.LatLngBounds();
                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
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
				link = '';      
				bounds.extend(marker.position);      
				bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link,asset_id);
		}
		map.fitBounds(bounds);
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
			   var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><h4>"+title+"</h4><p>"+desc+"<p><p>"+telephone+"<p><a href='mailto:"+email+"' >"+email+"</a><a href='javascript:void(0);' onclick='comcheck( " + asset_id + " )'>google</a></div>";
			   iw = new google.maps.InfoWindow({content:html});
			   iw.open(map,marker);
			   infoWindowVisible(true);
			   
		   }
		});
			
	google.maps.event.addListener(iw, 'closeclick', function () {
		infoWindowVisible(false);
	});

 	}
}

}

function comcheck(asset_id){
//alert(asset_id);
 $.getJSON("linegraph.php", { id: asset_id }, function(json) {
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


</body>
</html>

