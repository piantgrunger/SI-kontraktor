<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Json;


/**
 * This is the model class for table "tb_m_kendaraan".
 *
 * @property int $id_kendaraan
 * @property int $id_jns_kendaraan
 * @property string $no_plat_kendaraan
 * @property string $no_rangka_kendaraan
 * @property string $no_mesin_kendaraan
 * @property int $tahun_pembuatan
 * @property string $merk_kendaraan
 * @property string $pabrikan_kendaraan
 * @property string $pemilik_kendaraan
 * @property string $kapasitas_penumpang
 * @property string $status
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMJnsKendaraan $jnsKendaraan
 */
class kendaraan extends \yii\db\ActiveRecord
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
                 'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function tableName()
    {
        return 'tb_m_kendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jns_kendaraan', 'no_plat_kendaraan', 'no_rangka_kendaraan', 'no_mesin_kendaraan', 'tahun_pembuatan', 'merk_kendaraan', 'pabrikan_kendaraan', 'pemilik_kendaraan', 'kapasitas_penumpang', 'status'], 'required'],
            [['id_jns_kendaraan', 'tahun_pembuatan'], 'integer'],
            [['ket'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['no_plat_kendaraan', 'no_rangka_kendaraan', 'no_mesin_kendaraan', 'merk_kendaraan', 'pabrikan_kendaraan', 'pemilik_kendaraan', 'kapasitas_penumpang'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10],
            [['id_jns_kendaraan'], 'exist', 'skipOnError' => true, 'targetClass' => JnsKendaraan::className(), 'targetAttribute' => ['id_jns_kendaraan' => 'id_jns_kendaraan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kendaraan' => Yii::t('app', 'Id Kendaraan'),
            'id_jns_kendaraan' => Yii::t('app', 'Id Jns Kendaraan'),
            'no_plat_kendaraan' => Yii::t('app', 'No Plat Kendaraan'),
            'no_rangka_kendaraan' => Yii::t('app', 'No Rangka Kendaraan'),
            'no_mesin_kendaraan' => Yii::t('app', 'No Mesin Kendaraan'),
            'tahun_pembuatan' => Yii::t('app', 'Tahun Pembuatan'),
            'merk_kendaraan' => Yii::t('app', 'Merk Kendaraan'),
            'pabrikan_kendaraan' => Yii::t('app', 'Pabrikan Kendaraan'),
            'pemilik_kendaraan' => Yii::t('app', 'Pemilik Kendaraan'),
            'kapasitas_penumpang' => Yii::t('app', 'Kapasitas Penumpang'),
            'status' => Yii::t('app', 'Status'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJnsKendaraan()
    {
        return $this->hasOne(jnskendaraan::className(), ['id_jns_kendaraan' => 'id_jns_kendaraan']);
    }
    
    public function getNama_jns_kendaraan()
    {
        if ($this->jnsKendaraan !== null )
        {
            return $this->jnsKendaraan->nama_jns_kendaraan;
        }    
        else
        {
            return '';
        }    
    }    
    
    public function getDataKendaraan($id_jns_kendaraan)
    {        
          $out=[];
            $data=kendaraan::find()
                    ->select([
                'id'=>'id_kendaraan','name'=>"[merk_kendaraan]+' - '+[no_plat_kendaraan]"
                ])
                ->where(['id_jns_kendaraan'=>$id_jns_kendaraan])
                ->asArray()      
                ->all();
            foreach ($data as $i => $list) 
            {
                $out[] = ['id' => $list['id'], 'name' => $list['name']];
            }
            return $out;  
    }
   
}
