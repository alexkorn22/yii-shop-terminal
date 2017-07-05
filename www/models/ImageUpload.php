<?php
/**
 * Created by PhpStorm.
 * User: korns
 * Date: 30.06.2017
 * Time: 21:54
 */

namespace app\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model {

    public $image;

    public function rules(){
        return [
            [['image'], 'file','skipOnEmpty'=>false,'extensions'=>'jpg,png']
        ];
    }

    public function attributeLabels() {
        return [
        'image' => 'Картинка',
        ];
    }

    public function uploadImage(UploadedFile $file, $currentImage = '') {
        $this->image = $file;
        if ($this->validate()) {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }
    }

    protected function getSubFolder($file) {
        $folder = substr($file, 0, 3);
        return $folder;
    }

    protected function createSubFolder($file) {
        $folder = $this->getSubFolder($file);
        if (!file_exists($this->getFolder() . $folder)) {
            mkdir($this->getFolder() . $folder);
        }
    }

    protected function getFolder() {
        return Yii::getAlias('@web') . 'uploads/image/';
    }

    protected function generateFileName() {
        return strtolower(md5($this->image->baseName . uniqid()) . '.' . $this->image->extension);
    }

    public function deleteCurrentImage($currentImage) {
        if (!empty($currentImage) && $this->fileExist($currentImage)) {
            unlink($this->getFolder() . $currentImage);
        }
    }

    protected function fileExist($image) {
        return file_exists($this->getFolder() . $image);
    }

    protected function saveImage() {
        $fileImage = $this->generateFileName();
        $this->image->saveAs( $this->getFolder() . $fileImage);
        return $fileImage;
    }

}