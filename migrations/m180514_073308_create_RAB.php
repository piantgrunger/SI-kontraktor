<?php

use yii\db\Migration;

/**
 * Class m180514_073308_create_RAB
 */
class m180514_073308_create_RAB extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_mt_rab', [
            'id_rab' => $this->primaryKey(),
            'id_proyek' => "integer not null FOREIGN KEY  REFERENCES  tb_mt_proyek (id_proyek)  ON UPDATE CASCADE",
            'no_rab' => "varchar(50) not null unique",
            'tgl_rab' => "date not null ",
            'total_biaya_material' => "money not null default 0",
             'total_biaya_pekerja' => "money not null default 0",
            'total_biaya_peralatan' => "money not null default 0",
            'margin' => "money not null default 0",
            'dana_cadangan' => "money not null default 0",
            'total_rab' => "money not null default 0",

            'keterangan' => ' TEXT ',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180514_073308_create_RAB cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_073308_create_RAB cannot be reverted.\n";

        return false;
    }
    */
}
