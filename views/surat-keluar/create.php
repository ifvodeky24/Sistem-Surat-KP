<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */

$this->title = 'Tambah Surat Keluar';
$this->params['breadcrumbs'][] = ['label' => 'Surat Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-keluar-create">
    <br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
