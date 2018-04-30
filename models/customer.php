<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "tb_m_customer".
 *
 * @property int $id_customer
 * @property string $kode_customer
 * @property string $nama_customer
 * @property string $alamat_customer
 * @property string $telp_customer
 * @property string $telp2_customer
 * @property string $no_ktp
 * @property string $email_customer
 * @property string $stat
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 */
class customer extends \yii\db\ActiveRecord
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
                'value' => new Expression('getdate()'),

                // if you're using datetime instead of UNIX timestamp:
               ],
        ];
    }
    public static function tableName()
    {
        return 'tb_m_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_customer', 'alamat_customer', 'telp_customer', 'no_ktp', 'email_customer', 'stat'], 'required'],
            [['alamat_customer', 'stat', 'ket'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_customer', 'nama_customer', 'telp_customer', 'telp2_customer', 'no_ktp', 'email_customer'], 'string', 'max' => 50],
            [['kode_customer'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => Yii::t('app', 'Id Customer'),
            'kode_customer' => Yii::t('app', 'Kode Customer'),
            'nama_customer' => Yii::t('app', 'Nama Customer'),
            'alamat_customer' => Yii::t('app', 'Alamat Customer'),
            'telp_customer' => Yii::t('app', 'Telp Customer'),
            'telp2_customer' => Yii::t('app', 'Telp2 Customer'),
            'no_ktp' => Yii::t('app', 'No Ktp'),
            'email_customer' => Yii::t('app', 'Email Customer'),
            'stat' => Yii::t('app', 'Stat'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getDataBrowseCustomer()
    {        
     return ArrayHelper::map(
                     customer::find()
                                        ->select([
                                                'id_customer','ket_customer' => "[kode_customer]+' - '+[nama_customer]"
                                        ])
                                        ->asArray()
                                        ->all(), 'id_customer', 'ket_customer');
    }
}
