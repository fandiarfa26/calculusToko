
<?php
    if(!isset($_REQUEST['p'])){
        $panel = "";
    }else{
        $panel = $_REQUEST['p'];
    }

    if($panel == "" || $panel == "table"){
        require("pages/barang/tableBarang.php");
    }else if($panel == "form"){
        require_once("pages/barang/formBarang.php");
    }else if($panel == "detail"){
        require_once("pages/barang/detailBarang.php");
    }else{
        echo "<h2>404 : Halaman tidak ditemukan.</h2>";
    }