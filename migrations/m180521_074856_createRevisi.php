<?php

use yii\db\Migration;

/**
 * Class m180521_074856_createRevisi
 */
class m180521_074856_createRevisi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_mt_rab_history', [
            'id_rab' => $this->primaryKey(),
            'id_proyek' => "integer not null FOREIGN KEY  REFERENCES  tb_mt_proyek (id_proyek)  ON UPDATE CASCADE",
            'no_rab' => "varchar(50) not null unique",
            'tgl_rab' => "date not null ",
            'total_biaya_material' => "decimal(19,2) not null default 0",
            'total_biaya_pekerja' => "decimal(19,2) not null default 0",
            'total_biaya_peralatan' => "decimal(19,2) not null default 0",
            'margin' => "decimal(19,2) not null default 0",
            'dana_cadangan' => "decimal(19,2) not null default 0",
            'total_rab' => "decimal(19,2) not null default 0",

            'keterangan' => ' TEXT ',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
        $this->createTable('tb_dt_rab_history', [
            'id_d_rab' => $this->primaryKey(),
            'id_rab' => "integer not null FOREIGN KEY  REFERENCES  tb_mt_rab_history (id_rab)  ON UPDATE CASCADE   ON DELETE CASCADE",
            'id_pekerjaan' => "integer not null FOREIGN KEY  REFERENCES  tb_m_pekerjaan (id_pekerjaan)  ON UPDATE CASCADE   ON DELETE CASCADE",

            'total_biaya_material' => "decimal(19,2) not null default 0",
            'total_biaya_pekerja' => "decimal(19,2) not null default 0",
            'total_biaya_peralatan' => "decimal(19,2) not null default 0",

        ]);
        $this->createTable('tb_sdt_rab_history_material', [
            'id_sd_rab' => $this->primaryKey(),
            'id_d_rab' => "integer not null FOREIGN KEY  REFERENCES  tb_dt_rab_history (id_d_rab)  ON UPDATE CASCADE   ON DELETE CASCADE",
            'id_material' => "integer not null FOREIGN KEY  REFERENCES  tb_m_material (id_material)  ON UPDATE CASCADE   ON DELETE CASCADE",

            'harga' => "decimal(19,2) not null default 0",

            'qty' => "decimal(19,2) not null default 0",
            'sub_total' => "decimal(19,2) not null default 0",

        ]);
        $this->createTable('tb_sdt_rab_history_peralatan', [
            'id_sd_rab' => $this->primaryKey(),
            'id_d_rab' => "integer not null FOREIGN KEY  REFERENCES  tb_dt_rab_history (id_d_rab)  ON UPDATE CASCADE   ON DELETE CASCADE",
            'id_material' => "integer not null FOREIGN KEY  REFERENCES  tb_m_material (id_material)  ON UPDATE CASCADE   ON DELETE CASCADE",

            'harga' => "decimal(19,2) not null default 0",

            'qty' => "decimal(19,2) not null default 0",
            'sub_total' => "decimal(19,2) not null default 0",

        ]);
                $this->createTable('tb_sdt_rab_history_pekerja', [
            'id_sd_rab' => $this->primaryKey(),
            'id_d_rab' => "integer not null FOREIGN KEY  REFERENCES  tb_dt_rab_history (id_d_rab)  ON UPDATE CASCADE   ON DELETE CASCADE",
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
        echo "m180521_074856_createRevisi cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180521_074856_createRevisi cannot be reverted.\n";

        return false;
    }
    */
}
