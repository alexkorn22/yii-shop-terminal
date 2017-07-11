<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use Yii;
use yii\helpers\Url;

class CartController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $cart = new Cart();
        if ($this->isCheckout()) {
            $numberOrder = $this->checkout($cart);
            if ($numberOrder) {
                $cart->clear();
                Yii::$app->session->setFlash('numberOrderSuccess',$numberOrder);
                return $this->redirect(['site/index']);
            }
        }
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

    public function isCheckout() {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if (isset($post['makeOrder']) && $post['makeOrder'] == 'true') {
                return true;
            }
        }
        return  false;
    }

    public function checkout($cart) {
        $order = new Order();
        if ($order->checkout($cart)){
            return $order->number;
        }
    }
}
