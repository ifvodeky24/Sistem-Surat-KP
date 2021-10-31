<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = $model->id_surat_masuk;
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="surat-masuk-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_surat_masuk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_surat_masuk], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
                            'tanggal_terima',
                            'asal_surat',
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
