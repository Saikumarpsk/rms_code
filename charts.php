<?php 
include './db_check.php';
    
    include './db_connect.php';
//print_r($_SESSION);die();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>RMSS | Graphs</title>
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
  <nav class="navbar navbar-static-top"> <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> </a>
    <div class="navbar-custom-menu">
	<button id="logout" class="logout-btn"><i class="fa fa-power-off"></i></button>
      <ul class="nav navbar-nav">
        <li class="dropdown notifications-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-align-justify"></i> </a>
          <ul class="dropdown-menu">
            <li>
              <ul class="menu">
                <li> <a href="#"> <i class="fa fa-gears text-aqua"></i>Setting one </a> </li>
                <li> <a href="#"> <i class="fa fa-warning text-yellow"></i> Setting Two </a> </li>
                <li> <a href="#"> <i class="fa fa-users text-red"></i> Setting There </a> </li>
                <li> <a href="#"> <i class="fa fa-shopping-cart text-green"></i> Setting Four </a> </li>
                <li> <a href="#"> <i class="fa fa-user text-red"></i> Setting Five </a> </li>
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
        <li> <a href="#" data-toggle="control-sidebar"><i class="fa fa-bell-o"></i> <span class="label label-warning">10</span></a> </li>
      </ul>
    </div>
  </nav>
</header>
<aside class="main-sidebar">
  <section class="sidebar">
   
<div class="user-panel">
        <div class="pull-left image">
          <div class="main-nav">
            <ul class="">
              <li><a href="blankPageLayOut.php" data-toggle="" data-container="body" title="Assets" data-target="#product_view"><img src="dist/img/li-icon1.png" class="img-circle" alt="User Image"></a> </li>
              <li><a href="#" data-toggle="modal" data-container="body" title="Locations" data-target="#product_view2"><img src="dist/img/li-icon2.png" class="img-circle" alt="User Image"></a> </li>
              <li><a href="#" data-toggle="modal" data-container="body" title="Filelds" data-target="#product_view3"><img src="dist/img/li-icon3.png" class="img-circle" alt="User Image"></a> </li>
              <li><a href="#" data-toggle="modal" data-container="body" title="Borewells" data-target="#product_view4"><img src="dist/img/li-icon4.png" class="img-circle" alt="User Image"></a> </li>
              <li class="nav-divider"> </li>
            </ul>
          </div>
        </div>
      </div>
    <div class="nav-divider"></div>
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"> <i class="fa fa-search"></i> </button>
        </span> </div>
    </form>
	<form id="mapForm">
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
    <!--ul class="sidebar-menu" data-widget="tree">
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
    </ul-->

	<form id="mapForm">
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
  </section>
</aside>

<?php 
$totala = "select * from assets_monitor_data as A,assets_alarams as B," . "asset_id_list as C where " . "A.Assets_id=C.asset_id and " . "B.asset_id=asset_short_name and " . "A.user_id = 1 and " . "B.asset_id ='A329'" . " order by A.id desc limit 1 "; $resulttotala = mysql_query($totala, $link); 
$fetresulttotala = mysql_fetch_array($resulttotala); 
?>

<div class="content-wrapper">
<section class="content">
<div class="row">
  <!--<button id="hide">HIDE</button>
  <button id="show">SHOW</button>-->
    <div class="row">
      <div class="col-lg-12">
        <div class="test col-md-9">
          <div class="box">
<div id="map"></div>
		<!--<div class="panel-body">
			
			<input type="button" id="showmap" value="Back">
		    </div>-->
	 <div id ="mygraph"></div>
           </div>
	 <div class="box">
           <div class="box-body"></div>
            <div id="container" style="min-width: 100%; height:250px; margin: 0 auto"></div>
            <div class="graphchat">
              <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox">
                    Vibration </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox">
                    Intake Pressure </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox">
                    Discharge Pressure </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox">
                    Input Voltage </label>
                </div>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3"> </div>
              <div class="col-xs-3">
                <div class="col-xs-3"> <span class="graphchat-datetext">From &nbsp;</span> </div>
                <div class="col-xs-9">
                  <input type="text" class="form-control graphchat-datefield" placeholder="12-12-2017">
                </div>
              </div>
              <div class="col-xs-3">
                <div class="col-xs-1"> <span class="graphchat-datetext">To &nbsp;</span></div>
                <div class="col-xs-9">
                  <input type="text" class="form-control graphchat-datefield" placeholder="12-12-2017">
                </div>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="box-body"></div>
            <div id="container2" style="min-width: 310px; height:250px; margin: 0 auto"></div>
            <div class="graphchat">
              <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="radio">
                    Vibration </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="checkbox">
                    Intake Pressure </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="radio">
                    Discharge Pressure </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="radio">
                    Input Voltage </label>
                </div>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3"> </div>
              <div class="col-xs-3">
                <div class="col-xs-3"> <span class="graphchat-datetext">From &nbsp;</span> </div>
                <div class="col-xs-9">
                  <input type="text" class="form-control graphchat-datefield" placeholder="12-12-2017">
                </div>
              </div>
              <div class="col-xs-3">
                <div class="col-xs-1"> <span class="graphchat-datetext">To &nbsp;</span></div>
                <div class="col-xs-9">
                  <input type="text" class="form-control graphchat-datefield" placeholder="12-12-2017">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua text-center temparature_min">
                <div class="form-group">
                  <select class="form-control">
                    <option><h5>Pressure</h5></option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                <div class="inner knob-pad">
                  <input type="text" class="knob text-white" value="<?php echo $fetresulttotala['Motor_Temperature'].'%'; ?>" data-width="90" data-height="90" data-fgColor="#3c8dbc">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua text-center temparature_min">
                <div class="form-group">
                  <select class="form-control">
                    <option><h5>Volume</h5></option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                <div class="inner knob-pad">
                  <input class="knob" data-width="90" data-height="90" data-angleOffset=-125 data-angleArc=250 data-fgColor="#66EE66" data-rotation="clockwise" value="<?php echo $fetresulttotala['Discharge_Pressure']; ?>">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua temparature_min">
                <div class="form-group">
                  <select class="form-control">
                    <option><h5>Temparature</h5></option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                    
                    
                    Asset Status
                  
                  
                  
                  </select>
                </div>
                <div class="temparature"> <i class="fa fa-thermometer-empty" > </i>
                  <label> <?php echo $fetresulttotala['Discharge_Temperature']; ?>


 C</label>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua  temparature_min">
                <h5>Messages</h5>
                <div class="allarm_latest_info">
                  <ul>
                    <li><?php echo $fetresulttotala['Message']; ?></li>
                  
                  </ul>
                </div>
              </div>
            </div>
            <!--<div class="col-lg-3 col-xs-6">
          <div class="small-box temparature_min">
            <div class="allarm-notificationList"><div class="alert alert-success"> <strong>Success!</strong> </div>
            <div class="alert alert-info"> <strong>Info!</strong> </div>
            <div class="alert alert-warning"> <strong>Warning!</strong> </div>
            <div class="alert alert-danger"> <strong>Danger!</strong> </div></div>
          </div>
        </div>--> 
            
          </div>
        </div>
        <div class="remove col-md-3">
        <div class="box allam-pump">
          <h3> Asset Status</h3>
          <div class="allam-total">
            <ul class="">
              <li><i class="fa fa-circle text-aqua"></i> <span> Current Run</span> <span class="pull-right-container"> <span class="label label-primary pull-right">20</span> </span></li>
              <li><i class="fa fa-circle text-orange"></i> <span>Asset Life</span> <span class="pull-right-container"> <span class="label label-primary pull-right">10</span> </span></li>
              <li><i class="fa fa-circle text-purple"></i> <span>Last Downtime</span> <span class="pull-right-container"> <span class="label label-primary pull-right">40</span> </span></li>
              <li><i class="fa fa-circle text-blue"></i> <span>Total Downtime</span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
            </ul>
          </div>
          <br>
          <div class="row" >
            <div class="col-sm-4">
              <div class="pump-meter">
			<div class="inner knob-pad">
                  <input class="knob" data-width="60" data-height="60" data-angleOffset=-125 data-angleArc=250 data-fgColor="#66EE66" data-rotation="clockwise" value="<?php echo $fetresulttotala['Motor_Temperature']; ?>">
                </div>
                <div class="inner knob-pad">
                  <input class="knob" data-width="60" data-height="60" data-angleOffset=-125 data-angleArc=250 data-fgColor="#66EE66" data-rotation="clockwise" value="<?php echo $fetresulttotala['Discharge_Pressure']; ?>">
                </div>
                <div class="inner knob-pad">
                  <input class="knob" data-width="60" data-height="60" data-angleOffset=-125 data-angleArc=250 data-fgColor="#66EE66" data-rotation="clockwise" value="<?php echo $fetresulttotala['Discharge_Temperature']; ?>">
                </div>
                <div class="inner knob-pad">
                  <input class="knob" data-width="60" data-height="60" data-angleOffset=-125 data-angleArc=250 data-fgColor="#66EE66" data-rotation="clockwise" value="<?php echo $fetresulttotala['Intake_Pressure']; ?>">
                </div>
                <div class="inner knob-pad">
                  <input class="knob" data-width="60" data-height="60" data-angleOffset=-125 data-angleArc=250 data-fgColor="#66EE66" data-rotation="clockwise" value="<?php echo $fetresulttotala['Motor_Temperature']; ?>">
                </div>

                </div>
            </div>
            <div class="col-sm-8">
              <div class="pump">
                <div class="thermometer-noconfig" data-percent="55" data-orientation="vertical"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <?php include('popup.php');?>
    </div>
    </section>
  </div>
  <footer class="main-footer"> <strong>Copyright &copy; 2017 <a href="#">RMSS</a>.</strong> All rights reserved. </footer>
  <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">

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
<!--script src="bower_components/Chart.js"></script--> 
<script src="bower_components/jquery-knob/js/jquery.knob.js"></script> 
<script src="bower_components/chart.js/highcharts.js"></script> 
<script src="bower_components/chart.js/data.js"></script> 
<script src="bower_components/chart.js/exporting.js"></script> 
<script src="dist/js/jquery.thermometer.js"></script> 
<?php include('mapscript.php');?>
<script>
$(document).ready(function(){
var cust_id = document.cookie;
	
	var valid_cust_id=cust_id.split(";");
	var final_cust_id=valid_cust_id[0];
var values = '<?php print_r($_SESSION["question"]) ?>';
console.log(values);
	$.ajax({
	    type: "POST",
	    url: 'ajax.php',
	    data: {
		cust_id:final_cust_id,
		condition_type: 3, 
		fields: values
		},
	
	    success: function (response) {//alert(response);
		$("#asset_res").html(response);
		$("#map").hide();
		$("#charts").show();
		},
		 error: function(jqXHR, status, err){
			alert(jqXHR.responseText);
		    }

	});
});

</script>

<script>
$(function(){

	var asset_id = '<?php echo $_GET["asset_id"] ?>';//alert(asset_id);
	$.getJSON("linegraph.php", { id: asset_id }, function(json) {
               var chart;
                 $(document).ready(function(){
                
                    chart = new Highcharts.Chart('container',{
                      
                        chart: {
                            renderTo: 'mygraph',
                            type: 'spline'
                            
                        },
                        title: {
                            text: json[0]['asset_name']
                            
                        },
                        subtitle: {
                            text: ''
                        
                        },
                        xAxis: {
                            categories: json[0]['hour'],
                             title: {
                                text: 'Time(24 hrs Format)'
                            },
                        },
                         yAxis: {
                            title: {
                                text: ''
                            },
                            labels: {
                                formatter: function () {
                                    return this.value + '';
                                }
                            }
                        },
                        tooltip: {
                            crosshairs: true,
                            shared: true
                        },
                        plotOptions: {
                            spline: {
                                marker: {
                                    radius: 4,
                                    lineColor: '#666666',
                                    lineWidth: 1
                                }
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


});
 
	
	 Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: 'Sub Text'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: ''
        },
        labels: {
            formatter: function () {
                return this.value + '';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Flowrate',
        marker: {
            symbol: 'square'
        },
        data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, {
            y: 26.5,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/.png)'
            }
        }, 23.3, 18.3, 13.9, 9.6]

    } ]
});
	
	
	
$(".knob").knob({
      
      draw: function () {
        if (this.$.data('skin') == 'tron') {
          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;
          this.g.lineWidth = this.lineWidth;
          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
	
 $('.thermometer-noconfig').thermometer();
	
</script> 
<script> /*for alram functionality */
    $(function(){
	var asset_id = '<?php echo $_GET["asset_id"] ?>';
	//alert(asset_id);
      function loadNums()
      { //alert(asset_id);
	
	//alert(asset_id);
        $('.tab-content').load('autoalarams-inner.php?asset_id=5');
        setTimeout(loadNums, 30000); // makes it reload every 10 sec
      }
      loadNums(); // start the process...
    });
     /*for alram functionality */
 </script>

<script>
	  $('#hide').click(function(){
		  
		  $(".test").addClass('col-md-12');
		  $(".test").removeClass('col-md-9');
		  $(".remove").hide();
		  $('#show').show();
	  });
	$('#show').click(function(){
		  
		  $(".test").addClass('col-md-9');
			 $(".test").removeClass('col-md-12');
		$(".remove").show();
		  $('#hide').show();
	  });
	$("#logout").click(function(){
	window.location.href = "logout.php";
});
	  </script>
</body>
</html>
