
<?php
    require_once('configDB.php');
    //-----------------------------------
    $id = $_REQUEST['id'];
    $query = $conn->query("SELECT d.idTransaksi,d.idBarang,b.hargaBeli,b.hargaJual,b.nama,d.jumlahHarga,d.qty,t.status FROM detailTransaksi d INNER JOIN barang b ON d.idBarang = b.id INNER JOIN transaksi t ON d.idTransaksi = t.id WHERE d.idTransaksi = $id AND t.status = 'wait'");
    if($query->rowCount() > 0){
        ?>
        <div class="col s12">
        <h3>ID Transaksi : <?= $id ?></h3>
        <table border=1 width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga (Rp)</th>
                    <th>Jumlah</th>
                    <th>Total Harga (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $laba = 0;
                while($row = $query->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tr>
                        <td align="center"><?= $row->idBarang; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td align="right"><?= $row->hargaJual; ?></td>
                        <td align="center"><?= $row->qty; ?></td>
                        <td align="right"><?= $row->jumlahHarga; ?></td>
                    </tr>
                    <?php
                    
                    $laba += (($row->hargaJual - $row->hargaBeli)*$row->qty);
                }
                $query2 = $conn->query("SELECT SUM(jumlahHarga) as totalBelanja FROM detailTransaksi WHERE idTransaksi = $id");
                $r2 = $query2->fetch(PDO::FETCH_OBJ);
                $totalBelanja = $r2->totalBelanja;
                ?>
                <tr>
                    <td colspan=4 align="right">Total Belanja : </td>
                    <td align="right">Rp <?= $totalBelanja ?></td>
                </tr>
            </tbody>
        </table>
        </div>
    <div class="col s12 m4 offset-m8">
        <form action="" method="post">
            <div>
                <label for="uang">Uang Pembeli</label><br>
                <input type="number" name="uang" id="uang" autofocus>
            </div>            
            <button type="submit" name="hitung" class="btn waves-effect waves-light">Hitung</button>
        </form>
        <?php
        if(isset($_POST['hitung'])){
            $uang = $_POST['uang'];
            ?>
            <div class="card-panel white">
                <span>
                <?php
                echo "Kembalian : Rp ".($uang - $totalBelanja);
                ?>
                </span>
            </div>
            <?php
            
            $query3 = $conn->prepare("UPDATE transaksi SET status='complete',totalHarga=:tH,laba=:laba WHERE id ='$id'");
            $query3->bindParam(':tH',$totalBelanja);
            $query3->bindParam(':laba',$laba);
            $query3->execute();
        }
    ?></div>
    <?php
    }else{
        echo "#ID Transaksi tidak ada";
    }