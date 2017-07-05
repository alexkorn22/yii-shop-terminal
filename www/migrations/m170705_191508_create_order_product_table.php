<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_product`.
 */
class m170705_191508_create_order_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_product', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'count' => $this->integer()->notNull(),
            'price' => $this->integer(),
            'sum' => $this->integer(),
        ]);

        $this->createIndex(
            'tag_order_id',
            'order_product',
            'order_id'
        );

        $this->addForeignKey(
            'fk_order_id',
            'order_product',
            'order_id',
            'order',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'tag_product_id',
            'order_product',
            'product_id'
        );

        $this->addForeignKey(
            'fk_product_id',
            'order_product',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order_product');
    }
}
