<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-masuk-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- Form Element sizes -->
            <div class="box box-success">
                <div class="box-body">
                    <?= $form->field($model, 'nomor_surat')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'tanggal_surat')->textInput(['type'=>'date']) ?>

                    <?= $form->field($model, 'tanggal_terima')->textInput(['type'=>'date']) ?>

                    <?= $form->field($model, 'asal_surat')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'perihal')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'file_surat')->fileInput() ?>

                    <?= $form->field($model, 'penerima')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
