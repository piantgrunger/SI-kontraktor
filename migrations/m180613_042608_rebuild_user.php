<?php

use yii\db\Migration;

/**
 * Class m180613_042608_rebuild_user.
 */
class m180613_042608_rebuild_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%user}}');

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'email' => $this->string()->notNull(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->execute('set IDENTITY_INSERT [user] on  INSERT INTO [user] ( id,username, auth_key, password_hash, '
            ."password_reset_token, email, status, created_at, updated_at) VALUES (1 ,'admin', "
            ."'Bj2xEpff-WmRLtY4TyHPHxRp6eAxsNZ0', ".
            '\'$2y$13$lyzLwLoeBeCxjFtGgQVPquL0qaL6F1ygdBgqTnKE22Q2x.dwAaQ9S\''.
            ", NULL, 'piant.grunger@gmail.com', '10', '1485769884', '1488270381')");
        $this->execute('set IDENTITY_INSERT [user] off');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180613_042608_rebuild_user cannot be reverted.\n";

        return false;
    }
    */
}
