<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pekerjaan;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use mdm\widgets\TabularInput;

/* @var $this yii\web\View */
/* @var $model app\models\Pekerjaan */
/* @var $form yii\widgets\ActiveForm */

/* @var $this yii\web\View */
/* @var $model app\models\RAB */
/* @var $form yii\widgets\ActiveForm */
?>
<div style ="margin-top:10px;margin-bottom:10px;margin-left:10px">
<div class="row">
<div class="col-sm-4">
    <?= $model->nama_pekerjaan_detail ?>(  <?= $model->status_pekerjaan ?> )</div>
<div class="col-sm-2">
  Qty :  <?= $model->qty ?> <?= $model->satuan ?> </div>
<div class="col-sm-2">
 Hari Kerja :   <?= $model->hari_kerja ?> Hari</div>

</div>
<table class="table table-condensed table-striped table-hover table-bordered">
<thead>
<tr>

            <th >Item</th>
            <th align="Right">Qty</th>
            <th >Satuan</th>

           <th align="Right">Harga / Upah</th>

           <th align="Right">Sub Total</th>
        </tr>
 </thead>
 <tbody>
      <?php
        foreach ($model->sDetailRabMaterial as $material) {
            echo "<tr>";
            echo "<td>$material->nama_material </td>";
            echo "<td>$material->qty </td>";
            echo "<td>$material->satuan </td>";

            echo "<td>$material->harga </td>";
            echo "<td>$material->sub_total </td>";

            echo "</tr>";

        }

        foreach ($model->sDetailRabPeralatan as $material) {
            echo "<tr>";
            echo "<td>$material->nama_material </td>";

            echo "<td>$material->qty </td>";
            echo "<td>$material->satuan </td>";
            echo "<td>$material->harga </td>";
            echo "<td>$material->sub_total </td>";

            echo "</tr>";

        }
        foreach ($model->sDetailRabPekerja as $material) {
            echo "<tr>";
            echo "<td>$material->nama_level_jabatan </td>";
            echo "<td>$material->qty </td>";
            echo "<td>$material->satuan </td>";
            echo "<td>$material->gaji </td>";
            echo "<td>$material->sub_total </td>";

            echo "</tr>";

        }


        ?>
 </tbody>
 <tfoot>
 <tr>
 <td></td>
 <td></td>
 <td></td>

 <th>Total</th>
 <th><?= $model->total_rab ?></th>

 </tr>
 </tfoot>

</table>
</div>
