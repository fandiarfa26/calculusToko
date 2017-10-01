
<?php
    if(!isset($_REQUEST['p'])){
        $panel = "";
    }else{
        $panel = $_REQUEST['p'];
    }

    if($panel == "" || $panel == "form"){
        require("pages/kasir/formTrans.php");
    }else if($panel == "bayar"){
        require_once("pages/kasir/pembayaran.php");
    }else{
        echo "<h2>404 : Halaman tidak ditemukan.</h2>";
    }