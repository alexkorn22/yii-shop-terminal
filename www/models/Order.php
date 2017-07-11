<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $guid
 * @property string $number
 * @property integer $sum
 *
 * @property OrderProduct[] $orderProducts
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sum'], 'integer'],
            [['guid', 'number'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guid' => 'Guid',
            'number' => 'Номер заказа',
            'sum' => 'Сумма',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['order_id' => 'id']);
    }

    public function checkout(Cart $cart) {
        $this->number = $this->getRandomNumber();
        $this->guid = $this->getNewGuid();
        $this->sum = $cart->getSum();
        if (!$this->save(false)) {
            return false;
        }
        if (!$this->saveProducts($cart->getProducts())) {
            return false;
        }
        return true;
    }

    public function getRandomNumber() {
        return uniqid();
    }

    public function getNewGuid() {
        return $this->getRandomNumber() . $this->getRandomNumber();
    }

    public function saveProducts($cartProducts){
        if (is_array($cartProducts)) {
            $this->clearCurrentProducts();
            foreach($cartProducts as $product) {
                $link = new OrderProduct();
                $link->product_id = $product->product_id;
                $link->order_id = $this->id;
                $link->count = $product['count'];
                $link->price = $product['price'];
                $link->save();
            }
            return true;
        }
        return false;
    }

    public function clearCurrentProducts()
    {
        OrderProduct::deleteAll(['order_id'=>$this->id]);
    }

}
