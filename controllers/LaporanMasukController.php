<?php

namespace app\controllers;

use app\models\SuratMasuk;
use yii\web\Controller;
use Yii;

class LaporanMasukController extends Controller
{
    public function actionIndex()
    {
        $model = new \app\models\SuratMasuk();

        $data =Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post())) {
            $bul_awal = $data['SuratMasuk']['bulan_awal'];
            $bul_akhir = $data['SuratMasuk']['bulan_akhir'];

            return $this->redirect(['result', 'awal' => $bul_awal, 'akhir' => $bul_akhir]);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }


    public function actionResult()
    {
        $model = new SuratMasuk();

        $tgl_awal = Yii::$app->getRequest()->getQueryParam('awal');
        $tgl_akhir = Yii::$app->getRequest()->getQueryParam('akhir');

        $data= (new \yii\db\Query());
        $data
            ->select(['tb_surat_masuk.*'])
            ->from('tb_surat_masuk')
            ->where('tanggal_surat between "'.$tgl_awal.'" AND "'.$tgl_akhir.'" ');
        $command = $data->createCommand();
        $modelasset = $command->queryAll();


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetTitle('Laporan Surat Masuk');
        $stylesheet = file_get_contents('http://localhost/sistem-surat-sekolah/web/files/css/reportstyles.css');
        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($this->renderPartial('result',[
                'model' => $model,
                'modelasset' => $modelasset,
            ]
        ));
        $mpdf->Output('laporan-surat-masuk.pdf','I');
        exit;
    }
}

