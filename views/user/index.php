<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('Tambah Pengguna', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>
                                <div style="text-align: center;">No.</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Username</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Email</div>
                            </th>
                            <th>
                                <div style="text-align: center;">Aksi</div>
                            </th>
                        </tr>

                        </thead>
                        <tbody>

                        <?php
                        $no = 1;
                        foreach ($model as $db):
                            ?>
                            <tr>
                                <td>
                                    <div style="text-align: center;"> <?= $no; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;"> <?= $db['username']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;"> <?= $db['email']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?= Html::a('<i class="fa fa-search"></i>', ['/user/view', 'id' => $db['id_user']], ['class' => 'btn btn-warning btn-xs']) ?>
                                        <?= Html::a('<i class="fa fa-pencil"></i>', ['/user/update', 'id' => $db['id_user']], ['class' => 'btn btn-info btn-xs']) ?>
                                        <?= Html::a('<i class="fa fa-trash"></i>', ['/user/delete', 'id' => $db['id_user']], [
                                            'class' => 'btn btn-danger btn-xs',
                                            'data' => [
                                                'confirm' => 'anda yakin ingin menghapus "' . $db['username'] . '"?',
                                                'method' => 'post',
                                            ]
                                        ]);
                                        ?>
                                    </div>
                                </td>
                            </tr>

                            <?php $no++;endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
