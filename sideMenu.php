<?php 
   
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



