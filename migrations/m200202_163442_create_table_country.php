<?php

use yii\db\Migration;

/**
 * Class m200202_163442_create_table_country
 */
class m200202_163442_create_table_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('country', [
            'id' => $this->primaryKey()->unsigned(),
            'code' => $this->string(2)->unique(),
            'name'=> $this->string(80),
            'phonecode' => $this->string(45)->notNull(),
            'lat' => $this->string(45)->notNull(), 
            'lng' => $this->string(45)->notNull(),
        ]);

        // $this->insert('country', [
        //     'code' => 'DE',
        //     'name' => 'Germany',
        //     'phonecode' => '49',
        //     'lat' => '1111111111',
        //     'lng' => '2222222222',
        // ]);

        // $this->batchInsert('country', ['id', 'code', 'name', 'phonecode', 'lat', 'lng'], [
        //     []
        // ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('country');
        // $this->delete('country', ['code' => 'DE']);
        
        $this->dropTable('country');
        // echo "m200202_163442_create_table_country cannot be reverted.\n";
        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200202_163442_create_table_country cannot be reverted.\n";

        return false;
    }
    */
}
