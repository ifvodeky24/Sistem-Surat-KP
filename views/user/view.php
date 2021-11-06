<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <p>
        <?= Html::a('Perbarui', ['update', 'id' => $model->id_user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_user], [
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
                            //'id_user',
                            'username',
                            //'password',
                            'email:email',
                            [
                                'attribute' => 'photo',
                                'value' => function($model){
                                    //return Html::img(\Yii::$app->params['frontendUrl'] . $model->photo, ['class' => 'img-circle', 'alt' => 'User Image']);
                                }

                            ],
                            'name',
                            //'authkey',
                            //'accesToken',
                            'createdAt',
                            //'updatedAt',
                            [
                                'attribute' => 'id_role',
                                'value' => function($model){
                                    return $model->role->role_name;
                                }

                            ]
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>
