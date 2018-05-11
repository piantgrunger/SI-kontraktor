
<?php
use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;

use yiimetroui\Tile;

/* @var $this yii\web\View */


?>
<div class="site-index">
<div class="row">
<div class="col-md-4">

<?php
echo Tile::widget(array(
    'items' => array(
        array(
            'content' => '<i class="fa fa-user"></i>',
            'brand' => '<div class="name">Role</div>',
        ),

    ),
    'options' => array('class' => 'icon bg-color-green'),
    'url' => ['/mimin/role']

));

echo Tile::widget(array(
    'items' => array(
        array(
            'content' => '<i class="fa fa-user"></i>',
            'brand' => '<div class="name">User</div>',

        ),

    ),
    'options' => array('class' => 'icon bg-color-orange'),
    'url' => ['/mimin/user']
));

?>
</div>
<div class="col-md-4">

<?php
echo Tile::widget(array(
    'items' => array(
        array(
            'content' => '<i class="fa fa-unsorted"></i>',
            'brand' => '<div class="name">Level Jabatan</div>',
        ),

    ),
    'options' => array('class' => 'icon bg-color-purple'),
    'url' => ['/level-jabatan/index']

));

echo Tile::widget(array(
    'items' => array(
        array(
            'content' => '<i class="fa fa-users"></i>',
            'brand' => '<div class="name">Karyawan</div>',

        ),

    ),
    'options' => array('class' => 'icon bg-color-pink'),
    'url' => ['/karyawan/index']
));

?>
</div>
<div class="col-md-4">

<?php

echo Tile::widget(array(
    'items' => array(
        array(
            'content' => '<i class="fa fa-folder"></i>',
            'brand' => '<div class="name">Jenis Pekerjaan</div>',

        ),

    ),
    'options' => array('class' => 'icon bg-color-red'),
    'url' => ['/jenis-pekerjaan/index']
));



echo Tile::widget(array(
    'items' => array(
        array(
            'content' => '<i class="fa fa-gavel"></i>',
            'brand' => '<div class="name">Pekerjaan</div>',
        ),

    ),
    'options' => array('class' => 'icon bg-color-grey'),
    'url' => ['/pekerjaan/index']

));


echo Tile::widget(array(
    'items' => array(
        array(
            'content' => '<i class="fa fa-cubes"></i>',
            'brand' => '<div class="name">Material / Peralatan</div>',

        ),

    ),
    'options' => array('class' => 'icon bg-color-green'),
    'url' => ['/material/index']
));
echo Tile::widget(array(
    'items' => array(
        array(
            'content' => '<i class="fa fa-address-book-o"></i>',
            'brand' => '<div class="name">Customer</div>',

        ),

    ),
    'options' => array('class' => 'icon bg-color-blue'),
    'url' => ['/customer/index']
));


?>


<?php
echo Tile::widget(array(
    'items' => array(
        array(
            'content' => '<i class="fa fa-building"></i>',
            'brand' => '<div class="name">Proyek</div>',

        ),

    ),
    'options' => array('class' => 'icon bg-color-blue'),
    'url' => ['/proyek/index']
));

?>
</div>
</div>
