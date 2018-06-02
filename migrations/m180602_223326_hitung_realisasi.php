<?php

use yii\db\Migration;

/**
 * Class m180602_223326_hitung_realisasi
 */
class m180602_223326_hitung_realisasi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    { $this->execute("update tb_mt_realisasi
set total_biaya_material =
isnull((select SUM(sub_total) from tb_dt_realisasi_material where id_realisasi=m.id_realisasi ),0),
total_biaya_peralatan =
isnull((select SUM(sub_total) from tb_dt_realisasi_peralatan where id_realisasi=m.id_realisasi ),0)

from tb_mt_realisasi m");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180602_223326_hitung_realisasi cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180602_223326_hitung_realisasi cannot be reverted.\n";

        return false;
    }
    */
}
