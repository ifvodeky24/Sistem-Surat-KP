<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Role';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <p>
        <?= Html::a('Tambah Role', ['create'], ['class' => 'btn btn-success']) ?>
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
                                <div style="text-align: center;">Role Name</div>
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
                                    <div style="text-align: center;"> <?= $db['role_name']; ?> </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?= Html::a('<i class="fa fa-search"></i>', ['/role/view', 'id' => $db['id_role']], ['class' => 'btn btn-warning btn-xs']) ?>
                                        <?= Html::a('<i class="fa fa-pencil"></i>', ['/role/update', 'id' => $db['id_role']], ['class' => 'btn btn-info btn-xs']) ?>
                                        <?= Html::a('<i class="fa fa-trash"></i>', ['/role/delete', 'id' => $db['id_role']], [
                                            'class' => 'btn btn-danger btn-xs',
                                            'data' => [
                                                'confirm' => 'anda yakin ingin menghapus "' . $db['role_name'] . '"?',
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
