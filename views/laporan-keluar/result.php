<?php
use yii\helpers\Html;
$bulan_awal = Yii::$app->getRequest()->getQueryParam('awal');
$bulan_akhir = Yii::$app->getRequest()->getQueryParam('akhir');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" context="width=device-width, initial-scale=1">
    <title>Laporan Surat Keluar</title>
</head>
<body>

<div class="kop">
    <img src="http://localhost/sistem-surat-sekolah/web/files/images/riau.png" width="60" height="80" style="margin-left: 7%">
    <h1 class="font-provinsi">PEMERINTAH PROVINSI RIAU</h1>
    <h1 class="font-dinas">DINAS PENDIDIKAN</h1>
    <h1 class="font-sma">SMA NEGERI 1 BAGAN SINEMBAH</h1>

    <table>
        <tr>
            <th> </th>
            <th></th>
        </tr>

        <tr>
            <td>Alamat : Jln. Sisingamangaraja Bagan Batu </td>
            <td>Kode Pos : 28992</td>
        </tr>

        <tr>
            <td>e-mail : <u style="color: #1c00cf">sman1bagansinembah@gmail.com</u></td>
            <td>Telp/Faq : (0765)5650213</td>
        </tr>

    </table>

    <table style="margin-top: -5px">
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>NPSN : 10405546</td>
            <td>NSS : 301091005017</td>
            <td width="36.5%">NIS : 300170 </td>
        </tr>

    </table>

    <h2 style="text-align: center; font-size: 11px;">AKREDITASI : A</h2>

    <hr style="margin-top: -0.5%">
    <div class="box-kop"></div>

</div>

<div class="content">
    <table>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>ALAMAT</th>
            <th>Nomor</th>
            <th>KERINGKASAN<br>ISI</th>
            <th>CATATAN</th>
        </tr>
        <?php

        $no=1; foreach ($modelasset as $value) {?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $value['tanggal_surat']?></td>
                <td><?php echo $value['tujuan_surat']?></td>
                <td><?php echo $value['nomor_surat']?></td>
                <td><?php echo $value['perihal']?></td>
                <td><?php echo $value['penerima']?></td>
            </tr>
            <?php
            $no++; }
        ?>

    </table>
</div>

</body>
</html>
