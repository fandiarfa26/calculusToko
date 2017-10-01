<?php
    //require_once('../../configDB.php');
    //-----------------------------------
    $id = $_POST['idTrans'];
    header('location: ../../index.php?m=kasir&p=bayar&id='.$id);