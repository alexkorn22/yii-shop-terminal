<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">


    <?php $form = ActiveForm::begin(); ?>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#main" aria-controls="main" role="tab" data-toggle="tab">
                    Основные данные
                </a>
            </li>
            <li role="presentation">
                <a href="#addData" aria-controls="addData" role="tab" data-toggle="tab">
                    Дополнительные данные
                </a>
            </li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="main">
                <?= $form->field($model, 'name')->textInput() ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="addData">
                <?= $form->field($model, 'price')->textInput() ?>
                <?= $form->field($model, 'balance')->textInput() ?>
                <?= $form->field($model, 'guid')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'popular')->checkbox() ?>
            </div>

        </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
