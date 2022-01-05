<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratKeluarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Keluar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-keluar-index">

    <p>
        <?= Html::a('Buat Surat Keluar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>
                                <div style="text-align: center;">No.</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Nomor Surat</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Tanggal Surat</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Tanggal Keluar</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Tujuan Surat</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Penerima</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Aksi</div>
                            </th>
                        </tr>

                        </thead>
                        <tbody>

                        <?php
                        $no = 1;
                        foreach ($model as $db):
                            ?>
                            <tr>
                                <td>
                                    <div style="text-align: center;"> <?= $no; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;"> <?= $db['nomor_surat']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;"> <?= $db['tanggal_surat']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;"> <?= $db['tanggal_keluar']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;"> <?= $db['tujuan_surat']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;"> <?= $db['penerima']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?= Html::a('<i class="fa fa-search"></i>', ['/surat-keluar/view', 'id' => $db['id_surat_keluar']], ['class' => 'btn btn-warning btn-xs']) ?>
                                        <?= Html::a('<i class="fa fa-pencil"></i>', ['/surat-keluar/update', 'id' => $db['id_surat_keluar']], ['class' => 'btn btn-info btn-xs']) ?>
                                        <?= Html::a('<i class="fa fa-trash"></i>', ['/surat-keluar/delete', 'id' => $db['id_surat_keluar']], [
                                            'class' => 'btn btn-danger btn-xs',
                                            'data' => [
                                                'confirm' => 'anda yakin ingin menghapus "' . $db['nomor_surat'] . '"?',
                                                'method' => 'post',
                                            ]
                                        ]);
                                        ?>
                                    </div>
                                </td>
                            </tr>

                            <?php $no++;endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
