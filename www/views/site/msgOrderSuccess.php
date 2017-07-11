<?php

/* @var $this yii\web\View */
/* @var $numberOrder integer */
use yii\bootstrap\Modal;

?>
<?
Modal::begin([
    'id' => 'modal',
    'header' => 'Сообщение',
]);
?>
<p>Ваш заказ успешно создан. Номер заказа <?=$numberOrder?></p>
<div class="text-center">
    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
</div>

<?
Modal::end();
$JS = <<<JS
$('#modal').modal('show');
JS;
$this->registerJs($JS);
?>

