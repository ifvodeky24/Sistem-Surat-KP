<?php

namespace app\controllers;

use Yii;
use app\models\SuratKeluar;
use app\models\SuratKeluarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SuratKeluarController implements the CRUD actions for SuratKeluar model.
 */
class SuratKeluarController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SuratKeluar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratKeluarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratKeluar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SuratKeluar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratKeluar();

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file_surat');
            if ($model->validate()){
                if (!empty($file)) {
                    $newFileName = Yii::$app->security->generateRandomString().'.'.$file->extension;
                    $file->saveAs(Yii::$app->basePath.'/uploads/docs/' . $newFileName);
                    $model->file_surat = $newFileName;
                    $model->save(false);
                    return $this->redirect(['view', 'id' => $model->id_surat_keluar]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SuratKeluar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldFile = $model->file_surat;

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file_surat');
            if ($model->validate()){
                if (!empty($file)) {
                    $newFileName = Yii::$app->security->generateRandomString().'.'.$file->extension;
                    $model->file_surat = $newFileName;
                }
                else
                {
                    $model->file_surat = $oldFile;
                }
                if ($model->save())
                {
                    if (isset($file))
                    {
                        $file->saveAs(Yii::$app->basePath.'/uploads/docs/' . $newFileName);
                        unlink(Yii::$app->basePath.'/uploads/docs/'.$oldFile);
                    }
                }
                return $this->redirect(['view', 'id' => $model->id_surat_keluar]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SuratKeluar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink(Yii::$app->basePath.'/uploads/docs/'.$model->file_surat);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SuratKeluar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratKeluar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratKeluar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
