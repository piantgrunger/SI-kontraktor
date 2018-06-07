<?php

namespace app\models;

use mdm\behaviors\ar\RelationTrait;


use Yii;

/**
 * This is the model class for table "tb_dt_rab".
 *
 * @property int $id_d_RAB
 * @property int $id_rab
 * @property int $id_pekerjaan
 * @property string $total_biaya_material
 * @property string $total_biaya_pekerja
 * @property string $total_biaya_peralatan
 *
 * @property TbMPekerjaan $pekerjaan
 * @property TbMtRab $rab
 */
class d_RAB extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    use RelationTrait;
    public $nama_jenis_pekerjaan;
    public static function tableName()
    {
        return 'tb_dt_rab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'id_pekerjaan'], 'required'],
            [['id_rab', 'id_pekerjaan', 'hari_kerja'], 'integer'],
            [['total_biaya_material', 'total_biaya_pekerja', 'total_biaya_peralatan','qty','total_rab'], 'number'],
            [['status_pekerjaan','satuan'],'string'],
            [['id_pekerjaan'], 'exist', 'skipOnError' => true, 'targetClass' => Pekerjaan::className(), 'targetAttribute' => ['id_pekerjaan' => 'id_pekerjaan']],
            [['id_rab'], 'exist', 'skipOnError' => true, 'targetClass' => RAB::className(), 'targetAttribute' => ['id_rab' => 'id_rab']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_d_rab' => Yii::t('app', 'Id D RAB'),
            'id_rab' => Yii::t('app', 'Id RAB'),
            'id_pekerjaan' => Yii::t('app', 'Pekerjaan'),
            'total_biaya_material' => Yii::t('app', 'Total Biaya Material'),
            'total_biaya_pekerja' => Yii::t('app', 'Total Biaya Pekerja'),
            'total_biaya_peralatan' => Yii::t('app', 'Total Biaya Peralatan'),
            'qty' =>'Volume'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaan()
    {
        return $this->hasOne(Pekerjaan::className(), ['id_pekerjaan' => 'id_pekerjaan']);
    }

    public function getNama_pekerjaan()
    {
        return is_null($this->pekerjaan) ? "" : $this->pekerjaan ->nama_pekerjaan;
   }
    public function getNama_pekerjaan_detail()
    {
        return is_null($this->pekerjaan) ? "" : $this->pekerjaan->jenisPekerjaan->nama_jenis_pekerjaan .' : '. $this->pekerjaan->nama_pekerjaan;
    }
    public function getNama_jenis_pekerjaan()
    {
        return is_null($this->pekerjaan) ? "" : $this->pekerjaan->jenisPekerjaan->nama_jenis_pekerjaan ;
    }

    public function getSatuan()
    {
        return is_null($this->pekerjaan) ? "" : $this->pekerjaan->satuan;
    }
    /**
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRab()
    {
        return $this->hasOne(RAB::className(), ['id_rab' => 'id_rab']);
    }
    public function getNo_rab()
    {
        return is_null($this->rab) ? "" : $this->rab->no_rab;
    }
    public function getHarga()
    {
        return ($this->qty==0)?0: round($this->total_rab/$this->qty,2);
    }

    public function getSDetailRabMaterial()
    {
        return $this->hasMany(sd_RAB_material::className(), ['id_d_rab' => 'id_d_rab']);
    }
    public function setSDetailRabMaterial($value)
    {
        return $this->loadRelated('sDetailRabMaterial', $value);
    }

    public function getSDetailRabPeralatan()
    {
        return $this->hasMany(sd_RAB_peralatan::className(), ['id_d_rab' => 'id_d_rab']);
    }
    public function setSDetailRabPeralatan($value)
    {
        return $this->loadRelated('sDetailRabPeralatan', $value);
    }
    public function getSDetailRabPekerja()
    {
        return $this->hasMany(sd_RAB_pekerja::className(), ['id_d_rab' => 'id_d_rab']);
    }
    public function setSDetailRabPekerja($value)
    {
        return $this->loadRelated('sDetailRabPekerja', $value);
    }

}
