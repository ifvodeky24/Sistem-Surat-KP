<?php

namespace app\controllers;

use app\models\SuratKeluar;
use yii\web\Controller;
use Yii;

class LaporanKeluarController extends Controller
{
    public function actionIndex()
    {
        $model = new \app\models\SuratKeluar();

        $data =Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post())) {
            $bul_awal = $data['SuratKeluar']['bulan_awal'];
            $bul_akhir = $data['SuratKeluar']['bulan_akhir'];

            return $this->redirect(['result', 'awal' => $bul_awal, 'akhir' => $bul_akhir]);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }


    public function actionResult()
    {
        $model = new SuratKeluar();

        $tgl_awal = Yii::$app->getRequest()->getQueryParam('awal');
        $tgl_akhir = Yii::$app->getRequest()->getQueryParam('akhir');

        $data= (new \yii\db\Query());
        $data
            ->select(['tb_surat_keluar.*'])
            ->from('tb_surat_keluar')
            ->where('tanggal_surat between "'.$tgl_awal.'" AND "'.$tgl_akhir.'" ');
        $command = $data->createCommand();
        $modelasset = $command->queryAll();


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetTitle('Laporan');
        $mpdf->WriteHTML($this->renderPartial('result',[
                'model' => $model,
                'modelasset' => $modelasset,
            ]
        ));
        $mpdf->Output('laporan-surat-keluar.pdf','I');
        exit;
    }
}

