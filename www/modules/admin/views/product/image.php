<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ImageUpload */
/* @var $product app\models\Product */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Изменение картинки товара: ' . $product->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $product->name, 'url' => ['view', 'id' => $product->id]];
$this->params['breadcrumbs'][] = 'Изменение картинки';

?>

<div class="product-form">


    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'image')->fileInput(['accept '=>'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
