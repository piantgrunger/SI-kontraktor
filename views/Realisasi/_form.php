<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Realisasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="realisasi-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_d_rab')->textInput() ?>

    <?= $form->field($model, 'no_realisasi')->textInput() ?>

    <?= $form->field($model, 'tgl_aw_realisasi')->textInput() ?>

    <?= $form->field($model, 'tgl_ak_realisasi')->textInput() ?>

    <?= $form->field($model, 'total_biaya_material')->textInput() ?>

    <?= $form->field($model, 'total_biaya_pekerja')->textInput() ?>

    <?= $form->field($model, 'total_biaya_peralatan')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
