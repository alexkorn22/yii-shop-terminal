<?php

/* @var $this yii\web\View */
/* @var $pagination \yii\data\Pagination*/
/* @var $products \app\models\Product[] */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Каталог товаров';
$count = 0;
?>

<?foreach ($products as $product):?>
    <?
    $count++;
    if ($count == 1):
    ?>
    <div class="row row_products">
    <?endif;?>

    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <div class="img_prod">
                <img src="<?=$product->getImage()?>" class="img-responsive " alt="...">
            </div>
            <div class="caption caption_product">
                <div class="name_product">
                    <h3><?=$product->name?></h3>
                </div>
                <div class="desc">
                    <p><?=$product->description?></p>
                </div>
                <p>
                    <a href="<?=Url::to(['cart/buy','id' => $product->id])?>" data-productid="<?=$product->id?>" class="btn btn-primary" role="button">В корзину</a>
                    <span class="pull-right list_price"><?=$product->price?> грн</span>
                </p>
            </div>
        </div>
    </div>

    <? if ($count == 4): ?>
        </div>
        <?
        $count = 0;
        ?>
    <?endif;?>
<?endforeach;?>
<? if ($count != 0): ?>
    </div>
<?endif;?>
<?php
echo LinkPager::widget([
    'pagination' => $pagination,
]);
?>

<?
if (Yii::$app->session->getFlash('addToCart')) {
    echo $this->render('msgAddToCart');
}
?>

