<?php
    session_start();
    require_once('../../configDB.php');
    //-----------------------------------
    $all = $_POST['pesananAll'];

    $qID = $conn->query("SELECT MAX(id) as lastID FROM transaksi");
    if($qID->rowCount() > 0){
        $rID = $qID->fetch(PDO::FETCH_OBJ);
        $idTrans = ($rID->lastID) + 1;
    }else{
        $idTrans = 1;
    }
    
    $qDT = $conn->prepare("INSERT INTO detailTransaksi(idTransaksi,idBarang,qty,jumlahHarga) VALUES(:idT,:idB,:q,:j)");
    $pesanan = explode(" ",trim($all));
    foreach ($pesanan as $p) {
        $data = explode("*",$p);
        $qHJ = $conn->query("SELECT hargaJual FROM barang WHERE id='$data[0]'");
        $rHJ = $qHJ->fetch(PDO::FETCH_OBJ);
        $tHrg = $rHJ->hargaJual * $data[1];
        //echo $idTrans."-".$data[0]."-".$data[1]."-".$tHrg."<br>";
        $qDT->bindParam(':idT', $idTrans);
        $qDT->bindParam(':idB', $data[0]);
        $qDT->bindParam(':q', $data[1]);
        $qDT->bindParam(':j', $tHrg);
        $qDT->execute();
    }

    $qTrans = $conn->prepare("INSERT INTO transaksi(id,tgl,status) VALUES('$idTrans',NOW(),'wait')");
    $qTrans->execute();

    $_SESSION['pesanan'] = "";
    $_SESSION['idTrans'] = $idTrans;
    header('location: ../../index.php?m=pemesanan&p=form');