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
      <div class="user-panel">
        <div class="pull-left image">
          <div class="main-nav">
            <ul class="">
              <li><a href="#" data-toggle="modal" data-container="body" title="Assets" data-target="#product_view"><img src="dist/img/li-icon1.png" class="img-circle" alt="User Image"></a> </li>
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
		<div class="panel-body">
			 <div id ="mygraph"></div>
		    </div>
              </div>
              <div class="col-lg-12">
                <div class="allarm-events">
                  <ul>
                    <li>
                      <div > <strong>Allarm Events</strong> </div>
                    </li>
                    <li>
                      <marquee scrollamount="10" scrolldelay="2" direction="left" behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start();">
                      Allarm Events Screoll Here.....
                      </marquee>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

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
              
			   <a href="" data-toggle="modal" data-dismiss="modal"> 
<input type="button" id="submit_field"  value="submit"></a>
				
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
      <h3 class="control-sidebar-heading" style="padding-top: 0px; margin-top: 0px;">Allarm Total =  <?php while($tot = mysql_fetch_array($resulttotal)){ echo $tot['count'];}?></h3>
      <div class="tab-pane active" id="control-sidebar-settings-tab">
        <!--div class="allam-total">
          <ul class="">
            <li><i class="fa fa-circle text-aqua"></i> <span> Motor Temp</span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
            <li><i class="fa fa-circle text-orange"></i> <span> Discharge</span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
            <li><i class="fa fa-circle text-purple"></i> <span> Intake Pres</span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
            <li><i class="fa fa-circle text-blue"></i> <span> Other</span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
          </ul>
        </div-->
	<div class="allam-total">
		 <?php while($individualcount = mysql_fetch_array($resultdischsrgepressure)){?>
			<ul class="">
            <li><i class="fa fa-circle text-aqua"></i> <span> <?php  echo $individualcount['Alarm_Parameter']; ?></span> <span class="pull-right-container"> <span class="label label-primary pull-right"><?php  echo $individualcount['count1']; ?></span> </span></li>
			</ul>
		<?php } ?>
	</div>
        <div class="allarm-notification">
          <h3 class="control-sidebar-heading">Alarm Notifications</h3>
          <div class="table-scroll">
            <div class="box-body table-responsive no-padding">
              <table class="table_custom">
		<thead>
			<tr>
                    <th>Date/time</th>
                    <th>value</th>
                    <th>AssetID/type</th>
                  </tr>
		</thead>
                <tbody>
                  
		<?php 
                      $alaram =  "select * from assets_alarams where user_id = 1 order by id desc limit  10"; 
                      $resultalaram = mysql_query($alaram, $link);
        
			while($alaramval = mysql_fetch_array($resultalaram))
			{
				  
		    ?>
		<tr>
                      <td><?php echo $alaramval['time']?></td>
                    <td><?php echo $alaramval['value']?></td>
                    <td><?php echo $alaramval['asset_id'] ."/".$alaramval['Alarm_Type']?></td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="table-bottom-icons">
            <ul>
              <li> <i class="fa fa-dot-circle-o"></i></li>
              <li> <i class="fa fa-star-o"></i></li>
              <li> <i class="fa fa-ban"></i></li>
            </ul>
          </div>
        </div>
        <div class="clearfix"></div>
	  
        <div class="">
          <h3 class="control-sidebar-heading">Alarm Status</h3>
          <div class="allam-status">
            <ul class="">
              <li><i class="fa fa-circle text-red"></i> <span> Failed </span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
              <li><i class="fa fa-circle text-yellow"></i> <span> Stopped </span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
              <li><i class="fa fa-circle text-green"></i> <span> Running</span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
              <li><i class="fa fa-circle text-red"></i> <span> Failed &lt; TRL </span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
              <li><i class="fa fa-circle text-orange"></i> <span> WO Opt </span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
              <li><i class="fa fa-circle text-lime"></i> <span> WO Installation </span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
              <li><i class="fa fa-circle text-aqua"></i> <span> WO Pull </span> <span class="pull-right-container"> <span class="label label-primary pull-right">30</span> </span></li>
            </ul>
          </div>
        </div>
	
	

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
	
	$("#product_view2").hide();
	
	if(cust_id){

	$.ajax({
                    type: "POST",
                    url: 'ajax.php/countries',
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
}	
	
});


</script>


</body>
</html>
