<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m170705_191340_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'guid' => $this->string(),
            'name' => $this->integer(),
            'description'=>$this->text(),
            'image'=>$this->string(),
            'popular'=>$this->integer(),
            'price'=>$this->integer(),
            'balance'=>$this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product');
    }
}
