<?php

/* @var $this yii\web\View */

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
        <tr>
            <td class="col_img"><img src="http://dummyimage.com/100x100.jpg/cc0000/ffffff" alt=""></td>
            <td>
                <h4>Название товара</h4>
                <p>Описание</p>
            </td>
            <td>2</td>
            <td>500 грн</td>
            <td class="col_delete"><a href="#" class="btn btn-danger btn_del"><i class="glyphicon glyphicon-minus"></i></a></td>
        </tr>
        </tbody>
    </table>
</div>


