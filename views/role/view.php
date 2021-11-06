<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Role */

$this->title = $model->role_name;
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="role-view">

    <p>
        <?= Html::a('Perbarui', ['update', 'id' => $model->id_role], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_role], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah kamu ingin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id_role',
                            'role_name',
                            'createdAt',
                            'updatedAt',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>
