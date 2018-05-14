<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model app\models\Pekerjaan */
/* @var $form yii\widgets\ActiveForm */
$data = ArrayHelper::map(
    Proyek::find()
        ->select([
            'id_Proyek', "ket" => "[no_Proyek]+' - '+[nama_customer]"
        ])
        ->innerJoin('tb_m_customer', 'tb_m_customer.id_customer=tb_mt_proyek.id_customer')
        ->asArray()
        ->all(),
    'id_Proyek',
    'ket'
        );

/* @var $this yii\web\View */
/* @var $model app\models\RAB */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rab-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_proyek')->widget(Select2::className(), [
        'data' => $data,
        'options' => ['placeholder' => 'Pilih Proyek...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>


    <?= $form->field($model, 'no_rab')->textInput() ?>

    <?= $form->field($model, 'tgl_rab')->widget(DateControl::className()) ?>

    <?= $form->field($model, 'total_biaya_material')->textInput() ?>

    <?= $form->field($model, 'total_biaya_pekerja')->textInput() ?>

    <?= $form->field($model, 'total_biaya_peralatan')->textInput() ?>

    <?= $form->field($model, 'margin')->textInput() ?>

    <?= $form->field($model, 'dana_cadangan')->textInput() ?>

    <?= $form->field($model, 'total_rab')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
