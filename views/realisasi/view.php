<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Realisasi */

$this->title = $model->no_realisasi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Realisasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realisasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_realisasi], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_realisasi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_d_rab',
            'no_realisasi',
            'tgl_aw_realisasi',
            'tgl_ak_realisasi',
            'total_biaya_material',
            'total_biaya_pekerja',
            'total_biaya_peralatan',
            'keterangan:ntext',
        ],
    ]) ?>


<div class="panel panel-primary"   >
<div class="panel-heading"> Data Realisasi

</div>
<div style ="margin-top:10px;margin-bottom:10px;margin-left:10px">

<h4> Data Material</h4>
<table class="table table-condensed table-striped table-hover table-bordered">
<thead>
<tr>

            <th>Material</th>
            <th align="right">Qty</th>
           <th align="right">Harga</th>
           <th align="right">Sub Total</th>
        </tr>
 </thead>
 <tbody>
      <?php
        foreach ($model->det_realisasi_material as $material) {
            echo "<tr>";
            echo "<td>$material->nama_material </td>";
            echo "<td>$material->qty </td>";
            echo "<td>$material->harga </td>";
            echo "<td>$material->sub_total </td>";

            echo "</tr>";

        }

        ?>
 </tbody>
 <tfoot>
 <tr>
 <td></td>
 <td></td>
 <th>Total</th>
 <th><?= $model->total_biaya_material ?></th>

 </tr>
 </tfoot>

</table>

<h4> Data Peralatan</h4>
<table class="table table-condensed table-striped table-hover table-bordered">
<thead>
<tr>

            <th>Peralatan</th>
            <th align="right">Qty</th>
           <th align="right">Harga</th>
           <th align="right">Sub Total</th>
        </tr>
 </thead>
 <tbody>
      <?php
        foreach ($model->det_realisasi_peralatan as $material) {
            echo "<tr>";
            echo "<td>$material->nama_material </td>";
            echo "<td>$material->qty </td>";
            echo "<td>$material->harga </td>";
            echo "<td>$material->sub_total </td>";

            echo "</tr>";

        }

        ?>
 </tbody>
 <tfoot>
 <tr>
 <td></td>
 <td></td>
 <th>Total</th>
 <th><?= $model->total_biaya_peralatan ?></th>

 </tr>
 </tfoot>

</table>

</div>


</div>

</div>
