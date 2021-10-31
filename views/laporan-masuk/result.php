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
            LAPORAN SURAT MASUK<br>
            PER <?= tanggal_indo($bulan_awal, $bulan_akhir) ?> <?= $split_awal[0] ?>
        </h1>
    </b>
</div>

<table>
    <tr>
        <th>Nomor<br>berikut</th>
        <th>SI PENGIRIM</th>
        <th>Tanggal</th>
        <th>Nomor</th>
        <th>KERINGKASAN ISI</th>
        <th>Pertalian No.</th>
    </tr>
    <?php

    $no=1; foreach ($modelasset as $value) {?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $value['tanggal_surat']?></td>
            <td><?php echo $value['asal_surat']?></td>
            <td><?php echo $value['nomor_surat']?></td>
            <td><?php echo $value['perihal']?></td>
            <td></td>
        </tr>
        <?php
        $no++; }
    ?>

</table>
