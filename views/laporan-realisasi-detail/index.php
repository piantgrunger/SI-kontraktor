<?php


use yii\helpers\Html;
use kartik\grid\GridView;

$gridColumns = [['class' => 'kartik\grid\SerialColumn'],
            'no_rab',
            'tgl_rab:date',
            'kode_pekerjaan',
            'nama_pekerjaan',
             'qty',
             'hari_kerja',
            'Total_rp',
             'qty_realisasi',
             'hari_kerja_realisasi',
             'total_rp_realisasi',
    ];

/* @var $this yii\web\View */
/* @var $searchModel app\models\VwRealisasiDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Laporan Progress Detail';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vw-realisasi-detail-index">

    <h1><?= Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped' => false,
        'containerOptions' => [true],
        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,

        'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
           'heading' => '<i class="glyphicon glyphicon-tasks"></i>  <strong> '.'Laporan Progress Detail'.'</strong>',
        ],
        'toolbar' => [
            '{export}',
            '{toggleData}',
        ],

        'resizableColumns' => true,
    ]); ?>
</div>
