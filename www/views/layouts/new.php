<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\PublicAsset;
PublicAsset::register($this);
$curRoute = Yii::$app->controller->route;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <div class="container">
        <h3>Терминал для заказа</h3>
        <div class="nav_tabs">
            <ul class="nav nav-tabs">
                <li role="presentation" class="<?if ($curRoute == 'site/index'){echo 'active';}?>">
                    <a href="<?= Url::to(['site/index'])?>">
                        Популярные товары
                    </a>
                </li>
                <li role="presentation" class="<?if ($curRoute == 'site/catalog'){echo 'active';}?>">
                    <a href="<?= Url::to(['site/catalog'])?>">
                        Все товары
                    </a>
                </li>
                <li role="presentation" class="<?if ($curRoute == 'cart/index'){echo 'active';}?>">
                    <a href="<?= Url::toRoute('cart/index')?>">
                        Корзина (<span id="cartCounter"><?=\app\models\Cart::getCount()?></span>)
                    </a>
                </li>
            </ul>
        </div>
        <?=$content?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Artorg <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
