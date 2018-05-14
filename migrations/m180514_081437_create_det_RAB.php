<?php

use yii\db\Migration;

/**
 * Class m180514_081437_create_det_RAB
 */
class m180514_081437_create_det_RAB extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_dt_rab', [
            'id_d_rab' => $this->primaryKey(),
            'id_rab' => "integer not null FOREIGN KEY  REFERENCES  tb_mt_rab (id_rab)  ON UPDATE CASCADE   ON DELETE CASCADE",
            'id_pekerjaan' => "integer not null FOREIGN KEY  REFERENCES  tb_m_pekerjaan (id_pekerjaan)  ON UPDATE CASCADE   ON DELETE CASCADE",

            'total_biaya_material' => "money not null default 0",
            'total_biaya_pekerja' => "money not null default 0",
            'total_biaya_peralatan' => "money not null default 0",

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180514_081437_create_det_RAB cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_081437_create_det_RAB cannot be reverted.\n";

        return false;
    }
    */
}
