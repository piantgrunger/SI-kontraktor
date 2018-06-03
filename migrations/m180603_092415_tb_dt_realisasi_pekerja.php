<?php

use yii\db\Migration;

/**
 * Class m180603_092415_tb_dt_realisasi_pekerja
 */
class m180603_092415_tb_dt_realisasi_pekerja extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_dt_realisasi_pekerja', [
            'id_d_realisasi' => $this->primaryKey(),
            'id_realisasi' => "integer not null FOREIGN KEY  REFERENCES  tb_mt_realisasi (id_realisasi)  ON UPDATE CASCADE   ON DELETE CASCADE",
            'id_sd_rab' => "integer not null FOREIGN KEY  REFERENCES  tb_sdt_rab_pekerja (id_sd_rab)  ",
            'id_karyawan' => "integer not null FOREIGN KEY  REFERENCES  tb_m_karyawan (id_karyawan)  ",
            'gaji' => "decimal(19,2) not null default 0",
            'sub_total' => "decimal(19,2) not null default 0",
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180603_092415_tb_dt_realisasi_pekerja cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180603_092415_tb_dt_realisasi_pekerja cannot be reverted.\n";

        return false;
    }
    */
}
