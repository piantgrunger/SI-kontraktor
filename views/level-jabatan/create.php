<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LevelJabatan */

$this->title = Yii::t('app', 'Level Jabatan Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Level Jabatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-jabatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
