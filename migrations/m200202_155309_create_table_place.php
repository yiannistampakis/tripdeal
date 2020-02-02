<?php

use yii\db\Migration;

/**
 * Class m200202_155309_create_table_place
 */
class m200202_155309_create_table_place extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->createTable('place', [
                'id' => $this->primaryKey()->unsigned(),
                'place_id' => $this->string(45)->notNull(),
                'lat' => $this->string(45)->notNull(),
                'lng' => $this->string(45)->notNull(),
                'country_code' => $this->string(2)->notNull(),
                'is_country' => $this->boolean()->notNull(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('place');
        // echo "m200202_155309_create_table_place cannot be reverted.\n";
        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200202_155309_create_table_place cannot be reverted.\n";

        return false;
    }
    */
}
