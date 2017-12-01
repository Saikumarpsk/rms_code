<?php
    define('APP_PATH', realpath('..'));
    session_start();
    //echo "<pre>";print_r(APP_PATH);die();
    
    if(empty($_SESSION['user_id'])){
        header('Location:index.php');
    }
?>