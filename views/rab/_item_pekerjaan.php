<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pekerjaan;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use mdm\widgets\TabularInput;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Pekerjaan */
/* @var $form yii\widgets\ActiveForm */
$data = ArrayHelper::map(
    Pekerjaan::find()
        ->select([
            'id_Pekerjaan', "ket" => "[nama_jenis_pekerjaan] +' : '+[kode_Pekerjaan]+' - '+[nama_pekerjaan]"
        ])
        ->innerJoin("tb_m_jenis_pekerjaan", "tb_m_jenis_pekerjaan.id_jenis_pekerjaan = tb_m_pekerjaan.id_jenis_pekerjaan")
        ->asArray()
        ->all(),
    'id_Pekerjaan',
    'ket'
        );


/* @var $this yii\web\View */
/* @var $model app\models\RAB */
/* @var $form yii\widgets\ActiveForm */
?>

<td>
    <?= $form->field($model,"[$key]id_pekerjaan")->widget(Select2::className(), [
        'data' => $data,
        'options' => ['placeholder' => 'Pilih Pekerjaan...',
            'onChange' => "$.post( '" . Url::to(['rab/satuan-pekerjaan']) . "?id=' +$(this).val(), function(data) {

                                                  data1 = JSON.parse(data)
                                                  $( '#d_rab-$key-satuan' ).val(data1.satuan);
            })
"

    ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label(false) ?>
</td>
<td>
<?= $form->field($model, "[$key]qty")->textInput()->label(false); ?>
</td>
<td>
<?= $form->field($model, "[$key]satuan")->textInput()->label(false); ?>
</td>

<td>
<?= $form->field($model, "[$key]hari_kerja")->textInput()->label(false); ?>

</td>
<td>
<?= $form->field($model, "[$key]status_pekerjaan")->dropDownList(["Internal" => "Internal", "Subkon" => "Subkon"])->label(false); ?>

</td>

  <td>

    <a data-action="delete"><span class="glyphicon glyphicon-trash">

<?=$form->field($model, "[$key]id_d_rab")->hiddenInput()->label(false); ?>

</td>