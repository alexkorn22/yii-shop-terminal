<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\PublicAsset;

PublicAsset::register($this);
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
                <li role="presentation" class="active"><a href="#">Популярные товары</a></li>
                <li role="presentation"><a href="#">Все товары</a></li>
                <li role="presentation" ><a href="#">Корзина (0)</a></li>
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
