<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_surat_keluar".
 *
 * @property int $id_surat_keluar
 * @property string $nomor_surat
 * @property string $tanggal_surat
 * @property string $tanggal_keluar
 * @property string $tujuan_surat
 * @property string $perihal
 * @property string $file_surat
 * @property string $penerima
 * @property string $createdAt
 * @property string $updatedAt
 */
class SuratKeluar extends \yii\db\ActiveRecord
{

    public $bulan_awal;
    public $bulan_akhir;
    public $jenis_surat;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_surat_keluar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomor_surat', 'tujuan_surat', 'perihal', 'penerima'], 'required'],
            [['tanggal_surat', 'tanggal_keluar', 'createdAt', 'updatedAt'], 'safe'],
            [['perihal'], 'string'],
            [['nomor_surat', 'tujuan_surat', 'file_surat', 'penerima'], 'string', 'max' => 50],
            [['file_surat'],'file','skipOnEmpty'=>true,'extensions'=>'doc, docx, pdf']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_surat_keluar' => 'Id Surat Keluar',
            'nomor_surat' => 'Nomor Surat',
            'tanggal_surat' => 'Tanggal Surat',
            'tanggal_keluar' => 'Tanggal Keluar',
            'tujuan_surat' => 'Tujuan/Alamat',
            'perihal' => 'Perihal/Keringkasan Isi',
            'file_surat' => 'File Surat',
            'penerima' => 'Catatan',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }
}
