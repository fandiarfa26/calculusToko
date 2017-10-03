<div id="divPesan" class="col s12">
    <div class="card-panel grey darken-3">
        <span class="white-text" id="isiPesan">
        <?php
        if(isset($_SESSION['idTrans'])){
            if($_SESSION['idTrans'] == "#"){
                echo "Berhasil disimpan, cek di List";
            }else{
                echo "#Transaksi Berhasil<h3>ID Transaksi : ".$_SESSION['idTrans']."</h3>";
            }
        }
        ?>
        </span>
    </div>
</div>

<div id="form" class="col s12">
    <br><br>
    <div class="row">
        <div class="col s12 m6 offset-m3">
        <form action="pages/pemesanan/simpanPesanan.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <label for="idBrg">Masukkan ID barang</label>
                    <input type="number" min=1 name="idBrg" id="idBrg" class="inputnyaMobile" autofocus required>
                </div>
                <div class="input-field col s12">
                    <label for="jmlBrg">Jumlah Barang</label>
                    <input type="number" min=1 name="jmlBrg" id="jmlBrg" required  class="inputnyaMobile" >
                </div>
                <div class="col s12" align="center">
                    <button type="reset" id="btnSimpan" class="waves-effect waves-light btn-large" width="100%">Simpan</button>
                </div>
            </div>
        </form>
        
        </div>
    </div>
    
</div>
<div id="list" class="col s12" align="center">
    <h4>Keranjang</h4>
    <table border=1 width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody id="loadPesanan"></tbody>
    </table>
    <br><br>
    <form action="pages/pemesanan/kirimPesanan.php" method="post">
        <input type="hidden" name="pesananAll" id="pesananAll" value="<?= $_SESSION['pesanan'] ?>">
        <button type="submit" class="waves-effect waves-light btn-large">Kirim</button>
    </form>
</div>

            



<script>
$(document).ready(function(){
    function showPesan(){
        $('#divPesan').show();
        setTimeout(function() { 
            $('#divPesan').hide(); 
        }, 5000);
    }
    showPesan()
    function loadPesanan(){
        var all = $("#pesananAll").val();
        $.ajax({
            url: "pages/pemesanan/loadPesanan.php",
            type: "POST",
            data: {'all':all},
            success: function(data){
                $("#loadPesanan").html(data);
            },
            error: function(xhr){
                alert("error");
            }
        });
    }
    loadPesanan();
    function simpanPesanan(){
        var id = $("#idBrg").val();
        var jml = $("#jmlBrg").val();
        var all = $("#pesananAll").val();
        $.ajax({
            url: "pages/pemesanan/simpanPesanan.php",
            type: "POST",
            data: {'idBrg':id,'jmlBrg':jml,'all':all},
            success: function(result){
                if(result.substring(0,1) == "#"){
                    
                    $("#isiPesan").html(result);
                    showPesan();
                }else{
                    location.reload();
                }
            },
            error: function(xhr){
                alert("error");
            }
        });
    }
    $("#btnSimpan").click(function(){
        simpanPesanan();
    });

});
</script>