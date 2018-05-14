<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Proyek;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use yii\bootstrap\Tabs;

 $form = ActiveForm::begin ();

$item =
    [
    [
        'label' => 'Data R A B',
        'content' => $this->render('_form_RAB', ['model' => $model, 'form' => $form]),
        'active' => true,
    ],



];

/* @var $this yii\web\View */
/* @var $model app\models\Pekerjaan */
/* @var $form yii\widgets\ActiveForm */

/* @var $this yii\web\View */
/* @var $model app\models\RAB */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rab-form">

        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
  <?= Tabs::widget([
    'items' =>$item]);
?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
