<?php

 include './db_connect.php';

	include './db_check.php';
        
        $asset_id = 5;

            $shortID =  "select asset_short_name as SID from asset_id_list where asset_id  = '$asset_id'"; 
             $resultshortID = mysql_query($shortID, $link);
             while($fetresultshortID = mysql_fetch_array($resultshortID)){
		$finalid = $fetresultshortID['SID'];
		}
	
              /*For total count */ 
              $totala =  "select * from assets_monitor_data as A,assets_alarams as B,"
                     . "asset_id_list as C where "
                     . "A.Assets_id=C.asset_id and "
                     . "B.asset_id=asset_short_name and "
                     . "A.user_id = 1 and "
                     . "B.asset_id ='$finalid'"
                     . " order by A.id desc limit 1 ";
             
              $resulttotala = mysql_query($totala, $link);
              $fetresulttotala = mysql_fetch_array($resulttotala);
            /*For total count */
                      
            /*For $dischsrgepressure count */ 
              $dischsrgepressure =  "select Alarm_Parameter,count(*) as count1 from assets_alarams where user_id = 1 and asset_id ='$finalid'    group by Alarm_Parameter "; 
             $resultdischsrgepressure = mysql_query($dischsrgepressure, $link);
            /*For total count */ 
               
             /*For Total alaram count */ 
              $indalaramcount =  "select count(*) as count123 from assets_alarams where user_id = 1 and asset_id ='$finalid' "; 
             $resultindalaramcount = mysql_query($indalaramcount, $link);
             $fetresultindalaramcount = mysql_fetch_array($resultindalaramcount);
            /*For Total alaram count */ 
             
            ?>
<div class="tab-content">
      <h3 class="control-sidebar-heading" style="padding-top: 0px; margin-top: 0px;">Allarm Total = <?php echo $fetresultindalaramcount['count123']; ?></h3>
      <div class="tab-pane active" id="control-sidebar-settings-tab">
        <div class="allam-total">
          <ul class="">
            <li><i class="fa fa-circle text-aqua"></i> <span> Motor Temp</span> <span class="pull-right-container"> <span class="label label-primary pull-right"><?php echo $fetresulttotala['Motor_Temperature']; ?></span> </span></li>
            <li><i class="fa fa-circle text-orange"></i> <span> Discharge</span> <span class="pull-right-container"> <span class="label label-primary pull-right"><?php echo $fetresulttotala['Discharge_Pressure']; ?></span> </span></li>
            <li><i class="fa fa-circle text-purple"></i> <span> Intake Pres</span> <span class="pull-right-container"> <span class="label label-primary pull-right"><?php echo $fetresulttotala['Intake_Pressure']; ?></span> </span></li>
            <li><i class="fa fa-circle text-blue"></i> <span> Discharge Temperature</span> <span class="pull-right-container"> <span class="label label-primary pull-right"><?php echo $fetresulttotala['Discharge_Temperature']; ?></span> </span></li>
          </ul>
        </div>
        <div class="allarm-notification">
          <h3 class="control-sidebar-heading">Alarm Notifications</h3>
          <div class="table-scroll">
            <div class="box-body table-responsive no-padding">
              <table class="table_custom">
                  <thead>
			<tr>
                     <th>AssetID/type</th>       
                    <th>Date/time</th>
                    <th>Status</th>                    
                    <th>Parameter</th>
                    <th>value</th>
                    <th>Notified</th>
                    <th>Acknowledged By</th>
                    <th>Message</th>
                    <th>Event Detection</th>
                    
                  </tr>
		</thead>
                <tbody>
                    <?php 
                       $alaram =  "select * from assets_alarams where user_id = 1 and asset_id = '$finalid' order by id desc limit 10"; 
                      $resultalaram = mysql_query($alaram, $link);
        
			while($alaramval = mysql_fetch_assoc($resultalaram))
			{
				
                            
                         //  echo "<pre>";print_r($alaramval);exit;
		    ?>
                 <tr>
                    <td><?php echo $alaramval['asset_id'] ."/".$alaramval['Alarm_Type']?></td>
                    <td><?php echo $alaramval['time']?></td>
                    <td><?php echo $alaramval['status']?></td>
                    <td><?php echo $alaramval['Alarm_Parameter']?></td>
                    <td><?php echo $alaramval['value']?></td>
                    <td><?php echo $alaramval['notify_status']?></td>
                    <td><?php echo $alaramval['Acknowledged_By']?></td>
                    <td><?php echo $alaramval['Message']?></td>
                    <td><?php echo $alaramval['Event_Detection']?></td>
                   
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
           <?php 
           $statuscount =  "select status,count(*) as count from assets_alarams where user_id = 1 and asset_id='$finalid' group by status"; 
            $resultstatuscount = mysql_query($statuscount, $link);
          
          ?>
          <div class="allam-status">
            <ul class="">
              <?php 
                while($statcount = mysql_fetch_assoc($resultstatuscount))
			{
                ?>
              <li><i class="fa fa-circle text-red"></i> <span> <?php echo $statcount['status'];?> </span> <span class="pull-right-container"> <span class="label label-primary pull-right"><?php echo $statcount['count'];?></span> </span></li>
                        <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
