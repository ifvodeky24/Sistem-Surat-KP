<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */

$this->title = 'Perbarui Surat Keluar: ' . $model->nomor_surat;
$this->params['breadcrumbs'][] = ['label' => 'Surat Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomor_surat, 'url' => ['view', 'id' => $model->id_surat_keluar]];
$this->params['breadcrumbs'][] = 'Perbarui';
?>
<div class="surat-keluar-update">
    <br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
