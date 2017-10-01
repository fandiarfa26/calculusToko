<?php
    session_start();
    require_once('../../configDB.php');
    //-----------------------------------
    $idBrg = $_POST['idBrg'];
    $jmlBrg = $_POST['jmlBrg'];
    $all = $_POST['all'];

    //cek sisa
    $qBrg = $conn->query("SELECT sisa FROM barang WHERE id='$idBrg'");
    $rSisa = $qBrg->fetch(PDO::FETCH_OBJ);
    if($rSisa->sisa < $jmlBrg){
        echo "#Mohon maaf, barang yang tersedia tidak cukup.<br>Tersedia : ".$rSisa->sisa;
    }else{
        if($all == ""){
            $data = $idBrg."*".$jmlBrg." ";
        }else{
            $data = $_SESSION['pesanan'].$idBrg."*".$jmlBrg." ";
        }
        $_SESSION['pesanan'] = $data;
        $_SESSION['idTrans'] = "#";
        echo $data;
    }

    
    //header('location: ../../index.php?m=pemesanan&p=form');
    
    