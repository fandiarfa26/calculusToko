<legend>Tabel Barang</legend>
<!-- <a href="index.php?m=barang&p=form">+ Tambah Data</a> -->
<br><br>
<table border=1 width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga Jual(Rp)</th>
            <th>Tersedia</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
    <?php

    $result = $conn->query("SELECT * FROM barang");
    while($row = $result->fetch(PDO::FETCH_OBJ)){
    ?>
        <tr>
            <td align="center"><?= $row->id ?></td>
            <td><?= $row->nama ?></td>
            <td align="right"><?= number_format($row->hargaJual,2,',','.') ?></td>
            <td align="center"><?= $row->sisa ?></td>
            <td align="center">
                <a href="index.php?m=barang&p=detail&id=<?= $row->id ?>" title="Detail Barang">Detail</a>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>