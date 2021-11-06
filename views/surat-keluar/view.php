<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */

$this->title = $model->nomor_surat;
$this->params['breadcrumbs'][] = ['label' => 'Surat Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="surat-keluar-view">

    <p>
        <?= Html::a('Perbarui', ['update', 'id' => $model->id_surat_keluar], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_surat_keluar], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah kamu ingin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
        <a href="http://localhost/sistem-surat-sekolah/uploads/docs/<?= $model->file_surat ?>" class="btn btn-warning" target="_blank">Download Surat</a>
    </p>

    <br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'id_surat_masuk',
                            'nomor_surat',
                            'tanggal_surat',
                            'tanggal_keluar',
                            'tujuan_surat',
                            'perihal:ntext',
                            'penerima',
                            //s'createdAt',
                            //'updatedAt',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>
