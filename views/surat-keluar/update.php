<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */

$this->title = 'Update Surat Keluar: ' . $model->id_surat_keluar;
$this->params['breadcrumbs'][] = ['label' => 'Surat Keluars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_surat_keluar, 'url' => ['view', 'id' => $model->id_surat_keluar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="surat-keluar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
