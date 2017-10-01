<?php
    session_start();
    require_once('../../configDB.php');
    //-----------------------------------

    $all = $_POST['all'];
    if($all == ""){
        echo "<tr><td colspan=3>Belum Ada Pesanan..</td></tr>";
    }else{
        $pesanan = explode(" ",trim($all));
        foreach ($pesanan as $p) {
            $data = explode("*",$p);
            $query = $conn->query("SELECT nama FROM barang WHERE id='$data[0]'");
            $r = $query->fetch(PDO::FETCH_OBJ);
            $nama = $r->nama;
            echo "<tr>
                    <td>".$data[0]."</td>
                    <td>".$nama."</td>
                    <td>".$data[1]."</td>
                </tr>";
        }
    }
            