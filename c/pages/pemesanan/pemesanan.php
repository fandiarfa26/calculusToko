<div class="hide-on-med-and-down" class="col s12">
    <div class="card-panel orange">
        <span class="white-text">
            <i class="material-icons">smartphone</i>&nbsp;&nbsp;
            Khusus digunakan melalui mobile !
        </span>
    </div>
</div>
<?php
    if(!isset($_REQUEST['p'])){
        $panel = "";
    }else{
        $panel = $_REQUEST['p'];
    }

    if($panel == "" || $panel == "scan"){
        require("pages/pemesanan/scanQR.php");
    }else if($panel == "form"){
        require_once("pages/pemesanan/formPemesanan.php");
    }else{
        echo "<h2>404 : Halaman tidak ditemukan.</h2>";
    }