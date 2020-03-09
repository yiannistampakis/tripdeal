<?php

use yii\db\Migration;

/**
 * Class m200309_080812_create_table_user
 */
class m200309_080812_create_table_user extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey()->unsigned(),
            'uid' => $this->string(60)->unique()->notNull(),
            'username' => $this->string(45)->notNull(),
            'email' => $this->string(255)->unique()->notNull(),
            'password' => $this->string(60)->notNull(),
            'status' => $this->integer(4)->notNull()->defaultValue(0),
            'contact_email' => $this->boolean()->notNull()->defaultValue(false),
            'contact_phone' => $this->boolean()->notNull()->defaultValue(false),
            'auth_key' => $this->string(60)->notNull(),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated' => $this->timestamp()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
