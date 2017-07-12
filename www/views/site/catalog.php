<?php

/* @var $this yii\web\View */
/* @var $pagination \yii\data\Pagination*/
/* @var $products \app\models\Product[] */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Каталог товаров';
?>
<div class="row row_search">
<div class="col-md-10">
    <input type="text"  class="form-control" id="searchProduct" placeholder="Поиск">
</div>
<div class="col-md-2">
    <button type="button" id="btn_search" class="btn btn-primary">Поиск</button>
</div>
</div>

<div id="block_list_prods">
    <? echo $this->render('tpl/list_prods',compact('pagination','products')); ?>
</div>


<?
if (Yii::$app->session->getFlash('addToCart')) {
    echo $this->render('msgAddToCart');
}
?>

