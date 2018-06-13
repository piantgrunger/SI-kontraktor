<?php

use yii\db\Migration;

/**
 * Class m180613_040950_alter_user.
 */
class m180613_040950_alter_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('[user]', 'auth_key', 'varchar(64) null');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180613_040950_alter_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180613_040950_alter_user cannot be reverted.\n";

        return false;
    }
    */
}
