<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m200309_083555_add_auth_key_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'auth_key', $this->string(60)->notNull());
    }

    public function down()
    {
        $this->dropColumn('user', 'auth_key');
    }
}
