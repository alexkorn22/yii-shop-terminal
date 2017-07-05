<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $guid
 * @property integer $name
 * @property string $description
 * @property string $image
 * @property integer $popular
 * @property integer $price
 * @property integer $balance
 *
 * @property OrderProduct[] $orderProducts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'popular', 'price', 'balance'], 'integer'],
            [['description'], 'string'],
            [['guid', 'image'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'popular' => 'Popular',
            'price' => 'Price',
            'balance' => 'Balance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['product_id' => 'id']);
    }
}
