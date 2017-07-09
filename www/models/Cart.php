<?php


namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\Session;

/**
 * Class Cart
 * @package app\models
 */
class Cart extends Model{

    public function __construct($config = []){
        parent::__construct($config);
        if (!Yii::$app->session->isActive) {
            Yii::$app->session->open();
        }
        if (!Yii::$app->session->has('cart')) {
            Yii::$app->session->set('cart',[]);
        }

    }
    public function saveProduct($id) {
        $product = Product::findOne($id);
        $cart = Yii::$app->session->get('cart');
        $count = 0;
        if (isset($cart[$id])) {
            $count += $cart[$id]['count'];
        }
        $rowCart = [
            'product_id' => $id,
            'count' => $count + 1,
            'price' => $product->price
        ];
        $cart[$id] = $rowCart;
        Yii::$app->session->set('cart',$cart);
    }


    public function deleteProduct($id) {
        $cart = Yii::$app->session->get('cart');
        unset($cart[$id]);
        Yii::$app->session->set('cart',$cart);
    }

    public function getProducts() {
        $cartItems = Yii::$app->session->get('cart');
        $products = Product::find()->where(['id' => array_keys($cartItems)])->all();
        foreach ($products as $product){
            $cartItems[$product->id]['product'] = $product;
        }
        return $cartItems;
    }

    public static function getCount() {
        return count(Yii::$app->session['cart']);
    }
}