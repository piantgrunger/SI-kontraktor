<?php

use yii\db\Migration;

/**
 * Class m180515_094015_tb_sdt_RAB_bahan
 */
class m180515_094015_tb_sdt_RAB_bahan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_sdt_rab_material', [
            'id_sd_rab' => $this->primaryKey(),
            'id_d_rab' => "integer not null FOREIGN KEY  REFERENCES  tb_dt_rab (id_d_rab)  ON UPDATE CASCADE   ON DELETE CASCADE",
            'id_material' => "integer not null FOREIGN KEY  REFERENCES  tb_m_material (id_material)  ON UPDATE CASCADE   ON DELETE CASCADE",

            'Qty' => "money not null default 0",
            'sub_total' => "money not null default 0",

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180515_094015_tb_sdt_RAB_bahan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180515_094015_tb_sdt_RAB_bahan cannot be reverted.\n";

        return false;
    }
    */
}
