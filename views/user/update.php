<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Perbarui Pengguna: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Perbarui';
?>
<div class="user-update">
    <br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
