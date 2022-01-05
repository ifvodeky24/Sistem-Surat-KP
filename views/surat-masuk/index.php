<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-masuk-index">
    <p>
        <?= Html::a('Buat Surat Masuk', ['create'], ['class' => 'btn btn-success']) ?>
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
                                <div style="text-align: center;">Tanggal Terima</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Asal Surat</div>
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
                                    <div style="text-align: center;"> <?= $db['tanggal_terima']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;"> <?= $db['asal_surat']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;"> <?= $db['penerima']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?= Html::a('<i class="fa fa-search"></i>', ['/surat-masuk/view', 'id' => $db['id_surat_masuk']], ['class' => 'btn btn-warning btn-xs']) ?>
                                        <?= Html::a('<i class="fa fa-pencil"></i>', ['/surat-masuk/update', 'id' => $db['id_surat_masuk']], ['class' => 'btn btn-info btn-xs']) ?>
                                        <?= Html::a('<i class="fa fa-trash"></i>', ['/surat-masuk/delete', 'id' => $db['id_surat_masuk']], [
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
