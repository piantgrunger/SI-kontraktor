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
/* @var $model app\models\RAB */
/* @var $form yii\widgets\ActiveForm */
?>

<td>
 <b><?= (Yii::$app->params['jenis_pekerjaan'] === $model->nama_jenis_pekerjaan)?"": $model->nama_jenis_pekerjaan; ?></b>
</td>
<td>
<?=$model->nama_pekerjaan;?>
</td>

<td align="right">
<?= $model->qty; ?>
</td>
<td>
<?= $model->satuan; ?>
</td>
<td align="right">
<?= $model->harga; ?>
</td>
<td align="right">
<?= $model->total_rab; ?>
</td>

<?php Yii::$app->params['jenis_pekerjaan'] = $model->nama_jenis_pekerjaan; ?>