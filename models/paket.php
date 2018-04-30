<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_paket".
 *
 * @property int $id_paket
 * @property string $kode_paket
 * @property string $nama_paket
 * @property string $jenis_paket
 * @property int $id_jns_kendaraan
 * @property string $jenis_biaya
 * @property string $biaya_rp
 * @property string $denda_rp
 * @property string $stat
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMJnsKendaraan $jnsKendaraan
 */
class paket extends \yii\db\ActiveRecord
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
                    'value' => new Expression('getdate()'),            ],
        ];
    }
    public static function tableName()
    {
        return 'tb_m_paket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_paket', 'nama_paket', 'jenis_paket', 'jenis_biaya', 'stat'], 'required'],
            [['jenis_paket', 'jenis_biaya', 'stat', 'ket'], 'string'],
            [['id_jns_kendaraan'], 'integer'],
            [['biaya_rp', 'denda_rp'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_paket', 'nama_paket'], 'string', 'max' => 255],
            [['kode_paket'], 'unique'],
            [['id_jns_kendaraan'], 'exist', 'skipOnError' => true, 'targetClass' => jnskendaraan::className(), 'targetAttribute' => ['id_jns_kendaraan' => 'id_jns_kendaraan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_paket' => Yii::t('app', 'Id Paket'),
            'kode_paket' => Yii::t('app', 'Kode Paket'),
            'nama_paket' => Yii::t('app', 'Nama Paket'),
            'jenis_paket' => Yii::t('app', 'Jenis Paket'),
            'id_jns_kendaraan' => Yii::t('app', 'Id Jns Kendaraan'),
            'jenis_biaya' => Yii::t('app', 'Jenis Biaya'),
            'biaya_rp' => Yii::t('app', 'Biaya Rp'),
            'denda_rp' => Yii::t('app', 'Denda Rp'),
            'stat' => Yii::t('app', 'Stat'),
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
    public function getDataPaket($id_jns_kendaraan)
    {        
          $out=[];
            $data=Paket::find()
                    ->select([
                'id'=>'id_paket','name'=>"[kode_paket]+' - '+[nama_paket]"
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
