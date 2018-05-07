<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'kode_material')->textInput() ?>

    <?= $form->field($model, 'nama_material')->textInput() ?>

    <?= $form->field($model, 'spesifikasi')->textInput() ?>

    <?= $form->field($model, 'satuan')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
