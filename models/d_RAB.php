<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_dt_rab".
 *
 * @property int $id_d_rab
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
            [['id_rab', 'id_pekerjaan'], 'required'],
            [['id_rab', 'id_pekerjaan'], 'integer'],
            [['total_biaya_material', 'total_biaya_pekerja', 'total_biaya_peralatan'], 'number'],
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
            'id_d_rab' => Yii::t('app', 'Id D Rab'),
            'id_rab' => Yii::t('app', 'Id Rab'),
            'id_pekerjaan' => Yii::t('app', 'Pekerjaan'),
            'total_biaya_material' => Yii::t('app', 'Total Biaya Material'),
            'total_biaya_pekerja' => Yii::t('app', 'Total Biaya Pekerja'),
            'total_biaya_peralatan' => Yii::t('app', 'Total Biaya Peralatan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaan()
    {
        return $this->hasOne(Pekerjaan::className(), ['id_pekerjaan' => 'id_pekerjaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRab()
    {
        return $this->hasOne(RAB::className(), ['id_rab' => 'id_rab']);
    }
}
