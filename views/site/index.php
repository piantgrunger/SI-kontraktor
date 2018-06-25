
<?php
use yii\helpers\Html;
use hscstudio\mimin\components\Mimin;

$this->registerCSSFile('css/metro-all.css');

$this->registerJSFile(Yii::$app->homeUrl.'js/metro.min.js', ['depends' => [yii\web\JqueryAsset::className()]]);

/* @var $this yii\web\View */
$js = "
    if ($.trim($('#authetication').text()) == '')
    $('#authetication').remove();
        if ($.trim($('#master').text()) == '')
    $('#master').remove();
            if ($.trim($('#transaction').text()) == '')
    $('#transaction').remove();
";
$this->registerJS($js);

?>
<script type="text/javascript">
setTimeout(function(){
require(["dojo","dojox/gantt/GanttChart", "dojox/gantt/GanttProjectItem", "dojox/gantt/GanttTaskItem"],function(dojo, GanttChart, GanttProjectItem, GanttTaskItem){
  // Declare gantt chart.
  var ganttChart = new GanttChart({
    readOnly: false,        // optional: determine if gantt chart is editable
    dataFilePath: "gantt_default.json",    // optional: json data file path for load and save, default is "gantt_default.json"
    height: 400,            // optional: chart height in pixel, default is 400px
    width: 1200,            // optional: chart width in pixel, default is 600px
    withResource: true      // optional: display the resource chart or not
  }, "gantt");              //"gantt" is the node container id of gantt chart widget

  // Add project with tasks.

  var project = new GanttProjectItem({
    id: 1,
    name: "Development Project",
    startDate: new Date(2006, 5, 11)
  });
  var taskRequirement = new GanttTaskItem({
    id: 1,
    name: "Requirement",
    startTime: new Date(2006, 5, 11),
    duration: 50,
    percentage: 50,
    taskOwner: "Jack"
  });
  var taskAnalysis = new GanttTaskItem({
    id: 2,
    name: "Analysis",
    startTime: new Date(2006, 5, 18),
    duration: 40,
    percentage: 0,
    previousTaskId: "1",
    taskOwner: "Michael"
  });

  project.addTask(taskRequirement);
  project.addTask(taskAnalysis);

  ganttChart.addProject(project);

  // Initialize and Render
  ganttChart.init();
});
},0);
</script>

<div class="site-index">

<div class="tiles-grid tiles-group size-2" id="authetication" >
    <?= (Mimin::checkRoute('mimin/route')) ? Html::a("

        <span class='mif-user icon'></span>
        <span class='branding-bar'>Route</span>
         ", ['/mimin/route'], ['data-role' => 'tile', 'class ' => 'bg-indigo']) : ''; ?>
    <?= (Mimin::checkRoute('mimin/role')) ? Html::a("

        <span class='mif-user icon'></span>
        <span class='branding-bar'>Role</span>
         ", ['/mimin/role'], ['data-role' => 'tile', 'class ' => 'bg-cyan']) : ''; ?>
    <?= (Mimin::checkRoute('mimin/user')) ? Html::a("

        <span class='mif-user icon'></span>
        <span class='branding-bar'>User</span>
         ", ['/mimin/user'], ['data-role' => 'tile', 'class ' => 'bg-red', 'data-size' => 'wide']) : ''; ?>

</div>

<div class="tiles-grid tiles-group size-2" data-group-title="" id="master" >
    <?= (Mimin::checkRoute('level-jabatan/index')) ? Html::a("

        <span class='mif-flow-tree icon'></span>
        <span class='branding-bar'>Level Jabatan</span>
         ", ['/level-jabatan'], ['data-role' => 'tile', 'class ' => 'bg-pink']) : ''; ?>
    <?= (Mimin::checkRoute('karyawan/index')) ? Html::a("

        <span class='mif-users icon'></span>
        <span class='branding-bar'>Karyawan</span>
         ", ['/karyawan'], ['data-role' => 'tile', 'class ' => 'bg-cyan']) : ''; ?>
    <?= (Mimin::checkRoute('jenis-pekerjaan/index')) ? Html::a("

        <span class='mif-folder icon'></span>
        <span class='branding-bar'>Jenis-Pekerjaan</span>
         ", ['/jenis-pekerjaan'], ['data-role' => 'tile', 'class ' => 'bg-blue']) : ''; ?>
 <?= (Mimin::checkRoute('pekerjaan/index')) ? Html::a("

        <span class='mif-hammer icon'></span>
        <span class='branding-bar'>Pekerjaan</span>
         ", ['/pekerjaan'], ['data-role' => 'tile', 'class ' => 'bg-green']) : ''; ?>

<?= (Mimin::checkRoute('rekanan/index')) ? Html::a("

        <span class='mif-loop icon'></span>
        <span class='branding-bar'>Rekanan</span>
         ", ['/rekanan'], ['data-role' => 'tile', 'class ' => 'bg-grey']) : ''; ?>

 <?= (Mimin::checkRoute('material/index')) ? Html::a("

        <span class='mif-layers icon'></span>
        <span class=branding-bar'>Alat dan Material</span>
         ", ['/material'], ['data-role' => 'tile', 'class ' => 'bg-yellow']) : ''; ?>


</div>
<div class="tiles-grid tiles-group size-2" data-group-title="" id = "transaction" >

 <?= (Mimin::checkRoute('customer/index')) ? Html::a("

        <span class='mif-user-check icon'></span>
        <span class='branding-bar'>Customer</span>
         ", ['/customer'], ['data-role' => 'tile', 'class ' => 'bg-red', 'data-size' => 'medium']) : ''; ?>

   <?= (Mimin::checkRoute('proyek/index')) ? Html::a("

        <span class='mif-location-city icon'></span>
        <span class='branding-bar'>Proyek</span>
         ", ['/proyek'], ['data-role' => 'tile', 'class ' => 'bg-pink']) : ''; ?>


  <?= (Mimin::checkRoute('rab/index')) ? Html::a("

        <span class='mif-calculator icon'></span>
        <span class='branding-bar'>R A B</span>
         ", ['/rab'], ['data-role' => 'tile', 'class ' => 'bg-green']) : ''; ?>


  <?= (Mimin::checkRoute('history/index')) ? Html::a("

        <span class='mif-copy icon'></span>
        <span class='branding-bar'>History R A B</span>
         ", ['/history'], ['data-role' => 'tile', 'class ' => 'bg-blue']) : ''; ?>

<?= (Mimin::checkRoute('realisasi/index')) ? Html::a("

        <span class='mif-library icon'></span>
        <span class='branding-bar'>Realisasi</span>
         ", ['/realisasi'], ['data-role' => 'tile', 'class ' => 'bg-purple', 'data-size' => 'wide']) : ''; ?>


</div>

</div>
