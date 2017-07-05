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
            [[ 'popular', 'price', 'balance'], 'integer'],
            [['description','name'], 'string'],
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
            'name' => 'Наименование',
            'description' => 'Описание',
            'image' => 'Картинка',
            'popular' => 'Отображать в популярных товарах',
            'price' => 'Цена',
            'balance' => 'Остаток',
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
