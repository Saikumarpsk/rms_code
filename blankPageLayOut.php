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
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>RMSS | Dashboard</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="dist/css/Rmss.min.css">
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header"> <a href="home.php" class="logo"> <span class="logo-mini"><b>R</b>MSS</span> <span class="logo-lg"><b>RMSS </b> </span> </a>
    <nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> </a>
      <div class="navbar-custom-menu">
	<button id="logout" class="logout-btn"><i class="fa fa-power-off"></i></button>
        <ul class="nav navbar-nav">
         <li class="dropdown notifications-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-align-justify"></i>             
            </a>
            <ul class="dropdown-menu">              
              <li>
               
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-gears text-aqua"></i>Setting one
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Setting Two
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> Setting There
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> Setting Four
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> Setting Five
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-bell-o"></i> <span class="label label-warning">10</span></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <?php include('sideMenu.php');?>
      <div class="nav-divider"></div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"> <i class="fa fa-search"></i> </button>
          </span> </div>
      </form>
	<form id="mapForm">
	<div id = "checkDiv"></div>
	<div class="asset-list"   id="asset_res">
		
	</div>
	<div class="bottom-icons">
		  <ul>
		    <li> <i class="fa fa-dot-circle-o"></i></li>
		    <li> <i class="fa fa-star-o"></i></li>
		    <li> <i class="fa fa-ban"></i></li>
		  </ul>
		</div>
	</form>
      <!--<ul class="sidebar-menu" data-widget="tree">
        <li><a href="#"><i class="fa fa-book"></i> <span>LABELS</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Asset 1</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Asset 2</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Asset 3</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Asset 4</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Asset 5</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Asset 6</span></a></li>
        <div class="bottom-icons">
          <ul>
            <li> <i class="fa fa-dot-circle-o"></i></li>
            <li> <i class="fa fa-star-o"></i></li>
            <li> <i class="fa fa-ban"></i></li>
          </ul>
        </div>
      </ul>-->
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-body no-padding">
            <div class="row">
              <div class="col-lg-12">
                <div id="map"></div>
		
              </div>
                
                  <?php
                 
                 $scrollingalaram =  "select * from assets_alarams where user_id = 1 order by id desc limit 10";
                      $resultscrollingalaram = mysql_query($scrollingalaram, $link);
                
                      ?>
                 
                 
<!--/*scrolling alarams*/-->
               <div class="col-lg-12">
                <div class="allarm-events">
                  <ul>
                   
                    <li>
                      <marquee scrollamount="10" scrolldelay="2" direction="left" behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start();">
                     <?php
                          while($scrolingalaramval = mysql_fetch_assoc($resultscrollingalaram))
                            {
                          ?>
                         
<!--                          Allarm Events Screoll Here.....-->
                        <b> AsseetId : </b>  <?php echo $scrolingalaramval['asset_id']; ?>
                        <b> TIME : </b><?php echo $scrolingalaramval['time']; ?> 
                        <b>Parameeter </b><?php echo $scrolingalaramval['Alarm_Parameter'];?>
                        <b> Type : </b><?php echo $scrolingalaramval['Alarm_Type'];?> ----/
                         
                        <?php } ?>
                      </marquee>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
            
        </div>
      </div>
<?php include('popup.php');?>
	

    </section>
  </div>
  <footer class="main-footer"> <strong>Copyright &copy; 2017 <a href="#">RMSS</a>.</strong> All rights
    reserved. </footer>
  <aside class="control-sidebar control-sidebar-dark">
	<?php 
           /*For total count */ 
             $total =  "select count(*) as count from assets_alarams where user_id = 1 "; 
             $resulttotal = mysql_query($total, $link);
            /*For total count */
                      
            /*For $dischsrgepressure count */ 
             $dischsrgepressure =  "select Alarm_Parameter,count(*) as count1 from assets_alarams where user_id = 1 group by Alarm_Parameter "; 
             $resultdischsrgepressure = mysql_query($dischsrgepressure, $link);
            /*For total count */ 
                      
            
            ?>
    <div class="tab-content">
     
        </div>
        <div class="clearfix"></div>
	  
        
	
	

      </div>
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script> 
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="bower_components/fastclick/lib/fastclick.js"></script> 
<script src="dist/js/Rmss.min.js"></script> 
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> 
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> 
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> 
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> 
<script src="bower_components/chart.js/Chart.js"></script> 
<script src="dist/js/demo.js"></script> 
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="bower_components/jquery-knob/js/jquery.knob.js"></script> 
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
	 $("#map").show();  
  $("#mygraph").hide();  
		var asset_loc_lat = [];
                var asset_loc_long = [];
                var asset_id = [];
		var asset_name = [];
		//alert(response);// return false;  
		$("#checkDiv").append("<li><div class='check-selectall'> <input id='checkbox' type='checkbox' disabled checked ='checked'/> <label for='checkbox'> Select All </label></div></li>	"); 
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
	streetViewControl: false,
	//mapTypeId: google.maps.MapTypeId.HYBRID, 
//        mapTypeId: 'terrain',
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	panControl: false,
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
		locations.push([asset_name[ass_id], 'undefined', 'Latitude:'+ asset_loc_lat[ass_id], 'Longitude:' + asset_loc_long[ass_id],
	'undefined', asset_loc_lat[ass_id], asset_loc_long[ass_id], 'images/marker-icon-green.png',asset_id[ass_id]]);

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

			   var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><h4>"+title+"</h4><img class='image-iconalign' src='images/popup-icon.png'><p>"+desc+"<p><p>"+telephone+"<p>"+email+"<br><a href='javascript:void(0);' onclick='comcheck( " + asset_id + " )'><h4>Details</h4></a></div>";

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

//var values = '<?php print_r($_SESSION["question"]) ?>';
//alert(values);
//return false;
//alert(asset_id);
window.location.href = "charts.php?asset_id="+asset_id;
}

</script>
<script>
$("#showmap").click(function(){
    $("#map").show();  
    $("#mygraph").hide();
}); 

$("#logout").click(function(){
	window.location.href = "logout.php";
});
</script>

<script> /*for alram functionality */
    $(function(){
      function loadNum()
      { 
        $('.tab-content').load('autoalarams.php');
        setTimeout(loadNum, 30000); // makes it reload every 10 sec
      }
      loadNum(); // start the process...
    });
     /*for alram functionality */
 </script>

</body>
</html>
