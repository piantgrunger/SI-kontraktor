<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_barang".
 *
 * @property int $id_barang
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string $spesifikasi
 * @property string $keterangan
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Barang extends \yii\db\ActiveRecord
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
                    [
                'class' => BlameableBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
                ],

            ],
        ];
    }
    public static function tableName()
    {
        return 'tb_m_barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_barang', 'nama_barang'], 'required'],
            [['kode_barang', 'nama_barang', 'spesifikasi', 'keterangan'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['kode_barang'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => Yii::t('app', 'Id Barang'),
            'kode_barang' => Yii::t('app', 'Kode Barang'),
            'nama_barang' => Yii::t('app', 'Nama Barang'),
            'spesifikasi' => Yii::t('app', 'Spesifikasi'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
