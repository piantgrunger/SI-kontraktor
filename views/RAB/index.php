<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
            'id_proyek',
            'no_rab',
            'tgl_rab',
            'total_biaya_material',
            // 'total_biaya_pekerja',
            // 'total_biaya_peralatan',
            // 'margin',
            // 'dana_cadangan',
            // 'total_rab',
            // 'keterangan:ntext',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

         ['class' => 'kartik\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\RABSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar R A B');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rab-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped'=>false,
        'containerOptions'=>[true],
        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,

        'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
           'heading' => '<i class="glyphicon glyphicon-tasks"></i>  <strong> '.Yii::t('app', 'R A B'). '</strong>',

        ],
            'toolbar' => [
        ['content' => ((Mimin::checkRoute($this->context->id . "/create"))) ?         Html::a(Yii::t('app', 'R A B Baru'), ['create'], ['class' => 'btn btn-success']) :""],

        '{export}',
        '{toggleData}'
    ],

         'resizableColumns'=>true,

    ]); ?>
    <?php Pjax::end(); ?>
</div>
