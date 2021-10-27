<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keluar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_surat')->textInput() ?>

    <?= $form->field($model, 'tanggal_keluar')->textInput() ?>

    <?= $form->field($model, 'tujuan_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perihal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penerima')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
