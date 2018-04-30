<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use mdm\autonumber\NextValueValidator;
use mdm\behaviors\ar\RelationTrait;
use yii\helpers\Json;


/**
 * This is the model class for table "tb_mt_sewa".
 *
 * @property int $id_sewa
 * @property string $no_sewa
 * @property string $tgl_pemesanan
 * @property string $tgl_sewa
 * @property string $jam_sewa
 * @property int $id_customer
 * @property string $tgl_pengembalian
 * @property string $jam_pengembalian
 * @property string $jaminan
 * @property string $ket_jaminan
 * @property string $DP_rp
 * @property string $total_sewa_kendaraan
 * @property string $total_sewa_sopir
 * @property string $total
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 *
 * @property customer $customer
 */
class sewa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     use RelationTrait;
 


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
        return 'tb_mt_sewa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'tgl_pemesanan', 'tgl_sewa', 'jam_sewa', 'id_customer', 'tgl_pengembalian', 'jam_pengembalian', 'jaminan', 'DP_rp', 'total_sewa_kendaraan', 'total_sewa_sopir', 'total'], 'required'],
            [['tgl_pemesanan', 'tgl_sewa', 'jam_sewa', 'tgl_pengembalian', 'jam_pengembalian', 'created_at', 'updated_at'], 'safe'],
            [['id_customer'], 'integer'],
            [['jaminan', 'ket_jaminan', 'ket'], 'string'],
            [['DP_rp', 'total_sewa_kendaraan', 'total_sewa_sopir', 'total'], 'number'],
            [['no_sewa'],'autonumber','format'=>'SW/'.date('Y/m').'/?' ],
            [['no_sewa'], 'string', 'max' => 255],
            [['no_sewa'], 'unique'],
            [['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => customer::className(), 'targetAttribute' => ['id_customer' => 'id_customer']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sewa' => Yii::t('app', 'Id Sewa'),
            'no_sewa' => Yii::t('app', 'No Sewa'),
            'tgl_pemesanan' => Yii::t('app', 'Tgl Pemesanan'),
            'tgl_sewa' => Yii::t('app', 'Tgl Sewa'),
            'jam_sewa' => Yii::t('app', 'Jam Sewa'),
            'id_customer' => Yii::t('app', 'Id Customer'),
            'tgl_pengembalian' => Yii::t('app', 'Tgl Pengembalian'),
            'jam_pengembalian' => Yii::t('app', 'Jam Pengembalian'),
            'jaminan' => Yii::t('app', 'Jaminan'),
            'ket_jaminan' => Yii::t('app', 'Ket Jaminan'),
            'DP_rp' => Yii::t('app', 'Dp Rp'),
            'total_sewa_kendaraan' => Yii::t('app', 'Total Sewa Kendaraan'),
            'total_sewa_sopir' => Yii::t('app', 'Total Sewa Sopir'),
            'total' => Yii::t('app', 'Total'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(customer::className(), ['id_customer' => 'id_customer']);
    }
    public function getDetailSopir()
    {
        return $this->hasMany(d_sewa_sopir::className(), ['id_sewa' =>'id_sewa']);
    }
    public function getDetailKendaraan()
    {
        return $this->hasMany(d_sewa_kendaraan::className(), ['id_sewa' =>'id_sewa']);
    }
    public function setDetailSopir($value)
    {
        return $this->loadRelated('detailSopir',$value);
    }
    public function setDetailKendaraan($value)
    {
        return $this->loadRelated('detailKendaraan',$value);
    }
}

