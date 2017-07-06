<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

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

    public function getImage() {
        if ($this->image) {
            if (strrpos ($this->image,'//') !== false){
                return $this->image;
            }
        } else {
            return '/image/no-image.png';
        }
        return '/uploads/image/' . $this->image;
    }

    public function saveImage($image){
        $this->image = $image;
        return $this->save(false);
    }

    protected function deleteImage() {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete(){
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public static function getListPopular($pageSize = 12){
        $query = Product::find()->where(['popular' => 1]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $products = $query->select(['id','name','description','image','price'])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return compact('products','pagination');

    }

    public static function getListAll($pageSize = 12){
        $query = Product::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $products = $query->select(['id','name','description','image','price'])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return compact('products','pagination');

    }
}
