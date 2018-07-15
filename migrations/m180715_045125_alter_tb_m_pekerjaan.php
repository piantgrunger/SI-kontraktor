<?php

use yii\db\Migration;

/**
 * Class m180715_045125_alter_tb_m_pekerjaan
 */
class m180715_045125_alter_tb_m_pekerjaan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->alterColumn('tb_m_pekerjaan','id_jenis_pekerjaan','integer null');
        $this->alterColumn('tb_m_pekerjaan', 'id_pekerjaan_parent', 'integer null');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180715_045125_alter_tb_m_pekerjaan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180715_045125_alter_tb_m_pekerjaan cannot be reverted.\n";

        return false;
    }
    */
}
