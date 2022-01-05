<?php

/* @var $this yii\web\View */
use scotthuangzl\googlechart\GoogleChart;
$this->title = 'Sistem Pengarsipan Surat';
?>


<html>
<head>
    <style>
        .welcome {
            background-color: white;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        #barchart_material {
            padding: 100px 600px 50px 600px;
        }

    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
                <?php
                   $suratMasuk = \app\models\SuratMasuk::find()->count();
                   $suratKeluar = \app\models\SuratKeluar::find()->count();
                ?>
               function drawChart() {
                   var data = google.visualization.arrayToDataTable([
                       ['Surat', 'Surat Keluar', 'Surat Masuk'],
                       ['Surat Masuk dan Keluar', <?= $suratKeluar ?>, <?= $suratMasuk ?>]
                   ]);

                   var options = {
                       bars: 'vertical' // Required for Material Bar Charts.
                   };

                   var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                   chart.draw(data, google.charts.Bar.convertOptions(options));
               }
           </script>
       </head>
       <body>
       <div class="site-index">
           <div class="row">
               <div class="col-sm-12">
                   <div class="welcome">
                       <center>
                       <h3>Selamat Datang</h3>
                       <h4>Di Sistem Pengarsipan Surat</h4>

                       <div id="barchart_material"/>

                       </center>
                   </div>

                </div>
           </div>
        </div>
</body>
</html>
