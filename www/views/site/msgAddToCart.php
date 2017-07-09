<?php

/* @var $this yii\web\View */
use yii\bootstrap\Modal;

?>
<?
Modal::begin([
    'id' => 'modal',
    'header' => 'Сообщение',
]);
?>
<p>Товар добавлен в корзину</p>
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

