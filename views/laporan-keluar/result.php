<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        /*text-align: left;    */
    }
    table {
        width: 100%;
    }

</style>

<!-- <label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
	Barang atau pekerjaan tersebut telah diterima dan diselesaikan dengan baik oleh :
</label> -->

<?php

$bulan_awal = Yii::$app->getRequest()->getQueryParam('awal');
$bulan_akhir = Yii::$app->getRequest()->getQueryParam('akhir');
$split_awal = explode('-', $bulan_awal);

function tanggal_indo($tanggal_awal, $tanggal_akhir)
{
    $bulan = array (1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split_awal = explode('-', $tanggal_awal);
    $split_akhir = explode('-', $tanggal_akhir);
    if ((int)$split_awal[1] == (int)$split_akhir[1] ) {
        return $bulan[(int)$split_awal[1]];

    }else{

        return $bulan[(int)$split_awal[1]]. "-".$bulan[(int)$split_akhir[1]];
    }
}


?>

<div id="centrar">
    <b>
        <h1 style="text-align: center;font-size:14px;">
            LAPORAN SURAT KELUAR<br>
            PER <?= tanggal_indo($bulan_awal, $bulan_akhir) ?> <?= $split_awal[0] ?>
        </h1>
    </b>
</div>

<table>
    <tr>
        <th rowspan="2">No.</th>
        <th rowspan="2">Tanggal</th>
        <th rowspan="2">ALAMAT</th>
        <th rowspan="2">Nomor</th>
        <th rowspan="2">KERINGKASAN<br>ISI</th>
        <th colspan="2">Pertalian No.</th>
        <th rowspan="2">CATATAN</th>
    </tr>
    <tr>
        <th>Terdahulu</th>
        <th>Berikut</th>
    </tr>
    <?php

    $no=1; foreach ($modelasset as $value) {?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $value['tanggal_surat']?></td>
            <td><?php echo $value['tujuan_surat']?></td>
            <td><?php echo $value['nomor_surat']?></td>
            <td><?php echo $value['perihal']?></td>
            <td></td>
            <td></td>
            <td><?php echo $value['penerima']?></td>
        </tr>
        <?php
        $no++; }
    ?>

</table>