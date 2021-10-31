<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Laporan Surat Masuk';
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="laporan-index">
    <?php $form = ActiveForm::begin(['options'=>['action'=>['/tb-asset/hasil-laporan-masuk'],'target'=>'_blank']]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Bulan awal</label>
                                <?= $form->field($model, 'bulan_awal')->textInput(['maxlength' => true, 'type'=>'date'])->label(false) ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Bulan Akhir</label>
                                <?= $form->field($model, 'bulan_akhir')->textInput(['maxlength' => true, 'type'=>'date']) ->label(false) ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group" style="padding-top: 25px">
                                <?= Html::submitButton('Cari', ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

