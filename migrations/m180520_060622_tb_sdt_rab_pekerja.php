<?php

use yii\db\Migration;

/**
 * Class m180520_060622_tb_sdt_rab_pekerja
 */
class m180520_060622_tb_sdt_rab_pekerja extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('tb_sdt_rab_pekerja', [
            'id_sd_rab' => $this->primaryKey(),
            'id_d_rab' => "integer not null FOREIGN KEY  REFERENCES  tb_dt_rab (id_d_rab)  ON UPDATE CASCADE   ON DELETE CASCADE",
            'id_level_jabatan' => "integer not null FOREIGN KEY  REFERENCES  tb_m_level_jabatan (id_level_jabatan)  ON UPDATE CASCADE   ON DELETE CASCADE",
            'gaji' => "decimal(19,2) not null default 0",

            'qty' => "decimal(19,2) not null default 0",
            'sub_total' => "decimal(19,2) not null default 0",

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180520_060622_tb_sdt_rab_pekerja cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180520_060622_tb_sdt_rab_pekerja cannot be reverted.\n";

        return false;
    }
    */
}
