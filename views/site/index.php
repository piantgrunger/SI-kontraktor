
<?php
use yii\helpers\Html;

$this->registerCSSFile('css/metro-all.css');
$this->registerJSFile(Yii::$app->homeUrl.'js/metro.min.js', ['depends' => [yii\web\JqueryAsset::className()]]);
/* @var $this yii\web\View */

?>
<div class="site-index">

<div class="tiles-grid tiles-group size-2"  >
    <?=Html::a("

        <span class='mif-user icon'></span>
        <span class='branding-bar'>Route</span>
         ", ['/mimin/route'], ['data-role' => 'tile', 'class ' => 'bg-indigo']); ?>
    <?= Html::a("

        <span class='mif-user icon'></span>
        <span class='branding-bar'>Role</span>
         ", ['/mimin/role'], ['data-role' => 'tile', 'class ' => 'bg-cyan']); ?>
    <?= Html::a("

        <span class='mif-user icon'></span>
        <span class='branding-bar'>User</span>
         ", ['/mimin/user'], ['data-role' => 'tile', 'class ' => 'bg-red', 'data-size' => 'wide']); ?>

</div>

<div class="tiles-grid tiles-group size-2" data-group-title="" >
    <?= Html::a("

        <span class='mif-flow-tree icon'></span>
        <span class='branding-bar'>Level Jabatan</span>
         ", ['/level-jabatan'], ['data-role' => 'tile', 'class ' => 'bg-pink']); ?>
    <?= Html::a("

        <span class='mif-users icon'></span>
        <span class='branding-bar'>Karyawan</span>
         ", ['/karyawan'], ['data-role' => 'tile', 'class ' => 'bg-cyan']); ?>
    <?= Html::a("

        <span class='mif-folder icon'></span>
        <span class='branding-bar'>Jenis-Pekerjaan</span>
         ", ['/jenis-pekerjaan'], ['data-role' => 'tile', 'class ' => 'bg-blue']); ?>
 <?= Html::a("

        <span class='mif-hammer icon'></span>
        <span class='branding-bar'>Pekerjaan</span>
         ", ['/pekerjaan'], ['data-role' => 'tile', 'class ' => 'bg-green']); ?>

<?= Html::a("

        <span class='mif-loop icon'></span>
        <span class='branding-bar'>Rekanan</span>
         ", ['/rekanan'], ['data-role' => 'tile', 'class ' => 'bg-grey']); ?>

 <?= Html::a("

        <span class='mif-layers icon'></span>
        <span class=branding-bar'>Alat dan Material</span>
         ", ['/material'], ['data-role' => 'tile', 'class ' => 'bg-yellow']); ?>


</div>
<div class="tiles-grid tiles-group size-2" data-group-title="" >

 <?= Html::a("

        <span class='mif-user-check icon'></span>
        <span class='branding-bar'>Customer</span>
         ", ['/customer'], ['data-role' => 'tile', 'class ' => 'bg-red', 'data-size' => 'medium']); ?>

   <?= Html::a("

        <span class='mif-location-city icon'></span>
        <span class='branding-bar'>Proyek</span>
         ", ['/proyek'], ['data-role' => 'tile', 'class ' => 'bg-pink']); ?>


  <?= Html::a("

        <span class='mif-calculator icon'></span>
        <span class='branding-bar'>R A B</span>
         ", ['/rab'], ['data-role' => 'tile', 'class ' => 'bg-green']); ?>


  <?= Html::a("

        <span class='mif-copy icon'></span>
        <span class='branding-bar'>History R A B</span>
         ", ['/history'], ['data-role' => 'tile', 'class ' => 'bg-blue']); ?>

<?= Html::a("

        <span class='mif-library icon'></span>
        <span class='branding-bar'>Realisasi</span>
         ", ['/realisasi'], ['data-role' => 'tile', 'class ' => 'bg-purple', 'data-size' => 'wide']); ?>


</div>
<div class="tiles-grid tiles-group size-1" data-group-title="" >

 <?= Html::a("

        <span class='mif-chart-line icon'></span>
        <span class='branding-bar'>Laporan Realisasi</span>
         ", ['/laporan-realisasi'], ['data-role' => 'tile', 'class ' => 'bg-blue']); ?>


 <?= Html::a("

        <span class='mif-chart-line icon'></span>
        <span class='branding-bar'>Laporan Realisasi Detail</span>
         ", ['/laporan-realisasi-detail'], ['data-role' => 'tile', 'class ' => 'bg-red']); ?>

</div>

</div>
