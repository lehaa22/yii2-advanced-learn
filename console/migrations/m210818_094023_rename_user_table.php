<?php

use yii\db\Migration;

/**
 * Class m210818_094023_rename_user_table
 */
class m210818_094023_rename_user_table extends Migration
{
    public function up()
    {
        $this->renameTable('{{%user}}', '{{%users}}');
    }

    public function down()
    {
        $this->renameTable('{{%users}}', '{{%user}}');
    }
}
