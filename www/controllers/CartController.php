<?php

namespace app\controllers;

use app\models\Cart;
use Yii;
use yii\helpers\Url;

class CartController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $cart = new Cart();
        $products = $cart->getProducts();
        return $this->render('index',compact('products','cart'));
    }

    public function actionDelete($id){
        $cart = new Cart();
        $cart->deleteProduct($id);
        return $this->redirect(['index']);
    }

    public function actionBuy($id) {
        $cart = new Cart();
        $cart->saveProduct($id);
        Yii::$app->session->setFlash('addToCart',true);
        return  $this->redirect(Yii::$app->request->referrer);
    }

}
