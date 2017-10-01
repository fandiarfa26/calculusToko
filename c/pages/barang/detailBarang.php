<legend>Detail Barang</legend>
<?php
$id = $_REQUEST['id'];
$result = $conn->query("SELECT * FROM barang WHERE id='$id'");
while($row = $result->fetch(PDO::FETCH_OBJ)){
    ?>
    <table>
        <tr>
            <td>ID</td>
            <td>:</td>
            <td><?= $row->id ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $row->nama ?></td>
        </tr>
        <tr>
            <td>Harga Beli</td>
            <td>:</td>
            <td>Rp <?= $row->hargaBeli ?></td>
        </tr>
        <tr>
            <td>Harga Jual</td>
            <td>:</td>
            <td>Rp <?= $row->hargaJual ?></td>
        </tr>
        <tr>
            <td>Tanggal Masuk</td>
            <td>:</td>
            <td><?= $row->tglMasuk ?></td>
        </tr>
        <tr>
            <td>Tanggal Expired</td>
            <td>:</td>
            <td><?= $row->tglExpired ?></td>
        </tr>
        <tr>
            <td>Stok Masuk</td>
            <td>:</td>
            <td><?= $row->stokMasuk ?></td>
        </tr>
        <tr>
            <td>Sisa Barang</td>
            <td>:</td>
            <td><?= $row->sisa ?></td>
        </tr>
        
    </table>
    <a href="index.php?m=barang&p=table" title="Kembali ke Tabel" class="btn waves-effect waves-light">Kembali</a>
    <?php
} 
?>