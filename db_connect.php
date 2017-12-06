<?php
            $server_name = $_SERVER['SERVER_NAME'];
            
            if($server_name == 'localhost'){
                
                if (!$link = mysql_connect('localhost', 'root', 'root123')) 
                {
                    echo 'Could not connect to mysql';
                    exit;
                }

                if (!mysql_select_db('demo_suneel1', $link)) {
                    echo 'Could not select database';
                    exit;
                }
            }else if($server_name == "119.235.51.66"){
                if (!$link = mysql_connect('localhost', 'root', 'K@#L&*!)%')) 
                {
                    echo 'Could not connect to mysql';
                    exit;
                }

                if (!mysql_select_db('demo_rmss_new', $link)) {
                    echo 'Could not select database';
                    exit;
                }
            }
	
	    
?>
