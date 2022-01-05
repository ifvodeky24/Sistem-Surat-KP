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
            echo GoogleChart::widget(array('visualization' => 'BarChart',
                'data' => array(
                    array('Task', 'Jumlah'),
                    array('Jumlah Surat Masuk', (int) $suratMasuk),
                    array('Jumlah Surat Keluar', (int) $suratKeluar),
                ),
                'options' => array('title' => 'Grafik Surat Masuk')));
            ?>
        </div>
    </div>


</div>
