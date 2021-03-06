<?php

namespace app\controllers;

use Yii;
use app\models\SuratMasuk;
use app\models\SuratMasukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SuratMasukController implements the CRUD actions for SuratMasuk model.
 */
class SuratMasukController extends Controller
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
     * Lists all SuratMasuk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model= (new \yii\db\Query())
            ->select('*')
            ->from('tb_surat_masuk')
            ->all();

        return $this->render('index', [
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single SuratMasuk model.
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
     * Creates a new SuratMasuk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratMasuk();

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file_surat');
            if ($model->validate()){
                if (!empty($file)) {
                    $newFileName = Yii::$app->security->generateRandomString().'.'.$file->extension;
                    $file->saveAs(Yii::$app->basePath.'/uploads/docs/' . $newFileName);
                    $model->file_surat = $newFileName;
                    $model->save(false);
                    return $this->redirect(['view', 'id' => $model->id_surat_masuk]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SuratMasuk model.
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
                return $this->redirect(['view', 'id' => $model->id_surat_masuk]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SuratMasuk model.
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
     * Finds the SuratMasuk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratMasuk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratMasuk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
