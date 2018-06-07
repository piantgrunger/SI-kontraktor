<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\RAB */

$this->title = $model->no_rab;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar R A B'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


 Yii::$app->params ['jenis_pekerjaan'] = "";

?>
<div class="rab-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_proyek',
            'no_rab',
            'tgl_rab:date',
        ],
    ]) ?>


<table class="table">
    <thead>
        <tr>

            <th colspan=2>Pekerjaan</th>

            <th>Volume</th>
            <th>Satuan</th>

            <th>Harga</th>

            <th>Sub Total</th>

        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid2',
        'allModels' => $model->detailRab,
        'model' => \app\models\d_RAB::className(),
        'tag' => 'tbody',
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_pekerjaan_rekap',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add2',
        ]
    ]);
    ?>
    </table>

</div>
 <?= DetailView::widget([
    'model' => $model,
    'attributes' => [

        'total_dpp',
        'ppn_rp',

        'total_rab'

    ],
]) ?>



</div>
