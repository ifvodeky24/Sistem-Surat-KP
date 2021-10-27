<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = 'Update Surat Masuk: ' . $model->id_surat_masuk;
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_surat_masuk, 'url' => ['view', 'id' => $model->id_surat_masuk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="surat-masuk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
