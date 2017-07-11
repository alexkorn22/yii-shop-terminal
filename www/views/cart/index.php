<?php

/* @var $this yii\web\View */
/* @var $products array */
/* @var $cart \app\models\Cart */

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


$this->title = 'Корзина';

?>

<div class="cart">
    <table class="table table-bordered table-hover">
        <!--Header-->
        <thead>
        <tr>
            <th>Картинка</th>
            <th>Наименование</th>
            <th>Количество</th>
            <th>Сумма</th>
            <th>Удалить</th>
        </tr>
        </thead>

        <tbody>
        <? foreach ($products as $product):?>
        <tr>
            <td class="col_img"><img src="<?=$product['product']->getImage()?>" alt=""></td>
            <td>
                <h4><?=$product['product']->name?></h4>
                <p><?=$product['product']->description?></p>
            </td>
            <td><?=$product['count']?></td>
            <td><?=$product['price']?> грн</td>
            <td class="col_delete">
                <a href="<?=Url::to(['cart/delete','id' => $product['product_id']])?>" class="btn btn-danger btn_del">
                    <i class="glyphicon glyphicon-minus"></i>
                </a>
            </td>
        </tr>
        <? endforeach;?>
        </tbody>
    </table>

    <div>
        <div class="row">
            <div class="col-md-12">
                <?php $form = ActiveForm::begin(['id' => 'makeOrder']); ?>
                <input type="hidden" name="makeOrder" value="true">
                <button type="submit" class="btn btn-primary">Оформить заказ на сумму <?=$cart->getSum()?> грн</button>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>


