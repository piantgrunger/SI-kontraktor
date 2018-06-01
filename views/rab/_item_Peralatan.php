<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Material;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use mdm\widgets\TabularInput;

/* @var $this yii\web\View */
/* @var $model app\models\Material */
/* @var $form yii\widgets\ActiveForm */
$data = ArrayHelper::map(
    Material::find()
        ->select([
            'id_Material', "ket" => "[kode_Material]+' - '+[nama_Material]"
        ])
        ->where("jenis='Peralatan'")
        ->asArray()
        ->all(),
    'id_Material',
    'ket'
        );

/* @var $this yii\web\View */
/* @var $model app\models\rab */
/* @var $form yii\widgets\ActiveForm */
?>
<?= $form->field($model, "[$key]id_sd_rab")->hiddenInput()->label(false); ?>

<td>

    <?= $form->field($model, "[$key]id_material")->widget(Select2::className(), [
        'data' => $data,
        'options' => ['placeholder' => 'Pilih Peralatan...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label(false) ?>
</td>
<td>
<?= $form->field($model, "[$key]qty")->textInput([

    'onChange' => ' var total =  parseFloat($(this).val())*parseFloat($("#sd_rab_peralatan-' . $key . '-harga").val()) ; $("#sd_rab_peralatan-' . $key . '-sub_total").val(total)   ',

])->label(false) ?>

</td>

<td>
<?= $form->field($model, "[$key]harga")->textInput([

    'onChange' => ' var total =  parseFloat($(this).val())*parseFloat($("#sd_rab_peralatan-' . $key . '-qty").val()) ; $("#sd_rab_peralatan-' . $key . '-sub_total").val(total)   ',

])->label(false) ?>

</td>
<td>
<?= $form->field($model, "[$key]sub_total")->textInput(['readOnly' => true])->label(false)  ?>

</td>

    <td>
    <a data-action="delete" id='delete1'><span class="glyphicon glyphicon-trash">
</td>