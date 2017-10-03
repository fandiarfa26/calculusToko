<br><br>
<div class="col s12">
<canvas id="myChart1" width="100%"></canvas>
</div>
<div class="col s12 m6">
    <div class="card-panel white">
        <h4>Laporan Keuntungan</h4>
        
        <table border=1 width="100%">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Keuntungan(Rp)</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $regression = new PolynomialRegression(2);
            $result = $conn->query("SELECT * FROM laporan_pertahun");
            $arr1th = [];
            $arr1laba = [];
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $x = ($row->tahun)-date('Y');
                $y = (int)$row->laba;
                $regression->addData($x, $y);
                ?>
                <tr>
                    <td align="center"><?= $row->tahun ?></td>
                    <td align="right"><?= number_format($row->laba,2,',','.') ?></td>
                </tr>
                <?php
                array_push($arr1th,$row->tahun);
                array_push($arr1laba,$row->laba);
                $lastTh = $row->tahun;
            }
            
            ?>
            </tbody>
        </table>    
    </div>
</div>
<div class="col s12 m6">
    <div class="card-panel white">
        <h4>Prediksi Keuntungan</h4>
        <table border=1 width="100%">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Keuntungan(Rp)</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $coefficients = $regression->getCoefficients();
                $jmlTh = 5;
                $arr2laba = $arr1laba;
                for($x = 1; $x<=$jmlTh; $x++){
                    $y = $regression->interpolate( $coefficients, $x);
                    array_push($arr1th,$lastTh+$x);
                    array_push($arr2laba,$y);
                    ?>
                    <tr>
                        <td><?= $lastTh+$x ?></td>
                        <td><?= number_format($y,2,',','.') ?></td>
                    </tr>
                    <?php
                }        
            ?>
            </tbody>
        </table>    
    </div>
</div>
<?php
$tarrth = "[".implode(",",$arr1th)."]";
$tarr1laba = "[".implode(",",$arr1laba)."]";
$tarr2laba = "[".implode(",",$arr2laba)."]";
?>
<script>
    var ctx = document.getElementById("myChart1");
    var myChart = new Chart(ctx,{
        "type":"line",
        "data":{
            "labels":<?= $tarrth ?>,
            "datasets":[
                {
                    "label":"Laporan Keuntungan",
                    "data":<?= $tarr1laba ?>,
                    "fill":false,
                    "borderColor":"#2196F3",
                    "lineTension":0
                },
                {
                    "label":"Prediksi Keuntungan",
                    "data":<?= $tarr2laba ?>,
                    "fill":false,
                    "borderColor":"#F44336",
                    "lineTension":0
                }
            ]
        },
        "options":{}
    });
</script>
