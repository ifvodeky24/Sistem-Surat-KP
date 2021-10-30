<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Role */

$this->title = 'Update Role: ' . $model->id_role;
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_role, 'url' => ['view', 'id' => $model->id_role]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="role-update">
    <br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
