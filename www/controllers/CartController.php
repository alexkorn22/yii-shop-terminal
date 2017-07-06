<?php

namespace app\controllers;

use app\models\Cart;
use Yii;

class CartController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $cart = new Cart();
        debDie(Yii::$app->session['cart']);
        return $this->render('index');
    }

    public function actionDelete($id){
        $cart = new Cart();
        $cart->deleteProduct($id);
        return $this->redirect(['index']);
    }

    public function actionBuy($id) {
        $cart = new Cart();
        $cart->saveProduct($id);
        Yii::$app->session->setFlash('buyProduct',true);
        return $this->goBack();
    }

}
