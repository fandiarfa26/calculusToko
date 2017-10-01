<?php 
    
    $title = "Toko Bangunan Kalkulus";

    if(!isset($_REQUEST['m'])){
        $menu = "";
    }else{
        $menu = $_REQUEST['m'];
    }
    
    require_once('configDB.php');
    require_once('pages/layout.php'); 

    