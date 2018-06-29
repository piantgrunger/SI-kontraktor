
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RAB;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\web\View;

$this->registerCSSFile('js/gantt/codebase/dhtmlxgantt.css');

$this->registerJSFile(Yii::$app->homeUrl.'js/gantt/codebase/dhtmlxgantt.js', ['position' => View::POS_HEAD]);

$data = ArrayHelper::map(
  RAB::find()
    ->select([
      'id_RAB', 'ket' => "[no_RAB]+' - '+[nama_customer]",
    ])
    ->innerJoin('tb_mt_proyek', 'tb_mt_proyek.id_proyek=tb_mt_RAB.id_proyek')
    ->innerJoin('tb_m_customer', 'tb_m_customer.id_customer=tb_mt_proyek.id_customer')
    ->asArray()
    ->all(),
  'id_RAB',
  'ket'
);

$form = ActiveForm::begin();

?>





<div class="site-index">

    <?= $form->field($model, 'id_rab')->widget(Select2::className(), [
      'data' => $data,
      'options' => ['placeholder' => 'Pilih RAB...'],
      'pluginOptions' => [
        'allowClear' => true,
      ],
    ])->label('RAB'); ?>


       <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>
<div id="report" style='width:100%; height:800px;'>
    <div id="gantt_here" style='width:100%; height:100%;'></div>
<script type="text/javascript">
    gantt.init("gantt_here");
    gantt.load("laporan-realisasi/data?id_rab=4");
</script>
</div>