<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_surat_masuk".
 *
 * @property int $id_surat_masuk
 * @property string $nomor_surat
 * @property string $tanggal_surat
 * @property string $tanggal_terima
 * @property string $asal_surat
 * @property string $perihal
 * @property string $file_surat
 * @property string $penerima
 * @property string $createdAt
 * @property string $updatedAt
 */
class SuratMasuk extends \yii\db\ActiveRecord
{

    public $bulan_awal;
    public $bulan_akhir;
    public $jenis_surat;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_surat_masuk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomor_surat', 'asal_surat', 'perihal', 'penerima'], 'required'],
            [['tanggal_surat', 'tanggal_terima', 'createdAt', 'updatedAt'], 'safe'],
            [['perihal'], 'string'],
            [['nomor_surat', 'asal_surat', 'file_surat', 'penerima'], 'string', 'max' => 50],
            [['file_surat'],'file','skipOnEmpty'=>true,'extensions'=>'doc, docx, pdf']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_surat_masuk' => 'Id Surat Masuk',
            'nomor_surat' => 'Nomor Surat',
            'tanggal_surat' => 'Tanggal Surat',
            'tanggal_terima' => 'Tanggal Terima',
            'asal_surat' => 'Asal Surat/Pengirim',
            'perihal' => 'Perihal/Keringkasan Isi',
            'file_surat' => 'File Surat',
            'penerima' => 'Penerima',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }
}
