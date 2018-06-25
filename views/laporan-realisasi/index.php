
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RAB;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\web\View;

$this->registerCSSFile('js/dojotool/dojo/resources/dojo.css');
$this->registerCSSFile('js/dojotool/dojox/gantt/resources/gantt.css');

$this->registerJSFile(Yii::$app->homeUrl.'js/dojotool/dojo/dojo.js', ['position' => View::POS_HEAD]);
$this->registerJSFile(Yii::$app->homeUrl.'js/dojotool/dojox/gantt/GanttChart.js', ['position' => View::POS_HEAD]);
$this->registerJSFile(Yii::$app->homeUrl.'js/dojotool/dojox/gantt/GanttProjectItem.js', ['position' => View::POS_HEAD]);
$this->registerJSFile(Yii::$app->homeUrl.'js/dojotool/dojox/gantt/GanttTaskItem.js', ['position' => View::POS_HEAD]);

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
    ]); ?>


       <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>

<div id="gantt"></div>
</div>
