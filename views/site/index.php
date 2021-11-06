<?php

/* @var $this yii\web\View */
use scotthuangzl\googlechart\GoogleChart;
$this->title = 'Sistem Pengarsipan Surat';
?>
<div class="site-index">
    <div class="jumbotron">
        <h3>Selamat Datang</h3>
        <h4>Di Sistem Pengarsipan Surat</h4>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <?php
            $suratMasuk = \app\models\SuratMasuk::find()->count();;
            $suratKeluar = \app\models\SuratKeluar::find()->count();;
            echo GoogleChart::widget(array('visualization' => 'PieChart',
                'data' => array(
                    array('Task', 'Hours per Day'),
                    array('Jumlah Surat Masuk', $suratMasuk),
                    array('Jumlah Surat Keluar', $suratKeluar),
                ),
                'options' => array('title' => 'Grafik Surat Masuk')));
            ?>
        </div>
    </div>


</div>
