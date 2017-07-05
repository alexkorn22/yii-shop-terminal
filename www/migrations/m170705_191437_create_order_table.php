<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m170705_191437_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'guid' => $this->string(),
            'number' => $this->string(),
            'sum' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order');
    }
}
