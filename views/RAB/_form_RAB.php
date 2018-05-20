<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use mdm\widgets\TabularInput;

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


    <?= $form->field($model, 'id_proyek')->widget(Select2::className(), [
        'data' => $data,
        'options' => ['placeholder' => 'Pilih Proyek...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>


    <?= $form->field($model, 'no_rab')->textInput() ?>

    <?= $form->field($model, 'tgl_rab')->widget(DateControl::className()) ?>

    <?= $form->field($model, 'margin')->textInput() ?>
    <?= $form->field($model, 'dana_cadangan')->textInput() ?>



<div class="panel panel-primary"   >
<div class="panel-heading"> Data Pekerjaan

</div>
<table class="table">
    <thead>
        <tr>

            <th>Pekerjaan</th>

            <th><a id="btn-add2" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid2',
        'allModels' => $model->detailRab,
        'model' => \app\models\d_RAB::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_pekerjaan',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add2',
        ]
    ]);
    ?>
    </table>
</div>
