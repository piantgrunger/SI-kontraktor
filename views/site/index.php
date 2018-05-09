
<?php
use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;

use yiimetroui\Tile;

/* @var $this yii\web\View */


?>
<div class="site-index">
<?php
echo Tile::widget(array(
    'items' => array(
        array(
            'content' => '<i class="fa fa-cubes"></i>',
            'brand' => '<div class="name">Material</div>',

        ),

    ),
    'options' => array('class' => 'icon bg-color-green'),
    'url' => ['/material/index']
));
echo Tile::widget(array(
    'items' => array(
        array(
            'content' =>  '<i class="fa fa-address-book-o"></i>' ,
            'brand' => '<div class="name">Customer</div>',

        ),

    ),
    'options' => array('class' => 'icon bg-color-blue'),
    'url' => ['/customer/index']
));

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

?>


</div>
