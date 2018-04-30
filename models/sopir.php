<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;



/**
 * This is the model class for table "tb_m_sopir".
 *
 * @property int $id_sopir
 * @property string $nama_sopir
 * @property string $alamat_sopir
 * @property string $telp_sopir
 * @property string $no_ktp
 * @property string $jns_SIM
 * @property string $no_SIM
 * @property string $tgl_berlaku_SIM
 * @property string $stat
 * @property string $persentase
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 */
class sopir extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => new Expression('getdate()'),
            ],
        ];
    }
    public static function tableName()
    {
        return 'tb_m_sopir';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_sopir', 'alamat_sopir', 'telp_sopir', 'no_ktp', 'jns_SIM', 'no_SIM', 'tgl_berlaku_SIM', 'stat', 'persentase'], 'required'],
            [['alamat_sopir', 'jns_SIM', 'stat', 'ket'], 'string'],
            [['tgl_berlaku_SIM', 'created_at', 'updated_at'], 'safe'],
            [['persentase'], 'number'],
            [['nama_sopir', 'telp_sopir', 'no_ktp', 'no_SIM'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sopir' => Yii::t('app', 'Id Sopir'),
            'nama_sopir' => Yii::t('app', 'Nama Sopir'),
            'alamat_sopir' => Yii::t('app', 'Alamat Sopir'),
            'telp_sopir' => Yii::t('app', 'Telp Sopir'),
            'no_ktp' => Yii::t('app', 'No Ktp'),
            'jns_SIM' => Yii::t('app', 'Jns  Sim'),
            'no_SIM' => Yii::t('app', 'No  Sim'),
            'tgl_berlaku_SIM' => Yii::t('app', 'Tgl Berlaku  Sim'),
            'stat' => Yii::t('app', 'Stat'),
            'persentase' => Yii::t('app', 'Persentase'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    public function getDataBrowsesopir()
    {        
     return ArrayHelper::map(
                     sopir::find()
                                        ->select([
                                                'id_sopir','ket_sopir' => 'nama_sopir'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_sopir', 'ket_sopir');
    }



}
