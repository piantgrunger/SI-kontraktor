<?php

use yii\db\Migration;

/**
 * Class m180526_164256_create_dt_realisasi_peralatan
 */
class m180526_164256_create_dt_realisasi_peralatan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_dt_realisasi_peralatan', [
            'id_d_realisasi' => $this->primaryKey(),
            'id_realisasi' => "integer not null FOREIGN KEY  REFERENCES  tb_mt_realisasi (id_realisasi)  ON UPDATE CASCADE   ON DELETE CASCADE",
            'id_sd_rab' => "integer not null FOREIGN KEY  REFERENCES  tb_sdt_rab_peralatan (id_sd_rab)  ",

            'qty' => "decimal(19,2) not null default 0",

            'harga' => "decimal(19,2) not null default 0",
            'sub_total' => "decimal(19,2) not null default 0",

        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180526_164256_create_dt_realisasi_peralatan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180526_164256_create_dt_realisasi_peralatan cannot be reverted.\n";

        return false;
    }
    */
}
