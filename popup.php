<?php 
include './db_check.php';
    
    include './db_connect.php';
//print_r($_SESSION);die();

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
