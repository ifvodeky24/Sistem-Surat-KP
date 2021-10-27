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
            [['nomor_surat', 'tujuan_surat', 'perihal', 'file_surat', 'penerima'], 'required'],
            [['tanggal_surat', 'tanggal_keluar', 'createdAt', 'updatedAt'], 'safe'],
            [['perihal'], 'string'],
            [['nomor_surat', 'tujuan_surat', 'file_surat', 'penerima'], 'string', 'max' => 50],
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
            'tujuan_surat' => 'Tujuan Surat',
            'perihal' => 'Perihal',
            'file_surat' => 'File Surat',
            'penerima' => 'Penerima',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }
}
