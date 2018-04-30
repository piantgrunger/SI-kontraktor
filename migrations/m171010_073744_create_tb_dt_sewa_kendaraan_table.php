<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tb_dt_sewa_kendaraan`.
 */
class m171010_073744_create_tb_dt_sewa_kendaraan_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tb_dt_sewa_kendaraan', [
            'id_dt_sewa' => $this->primaryKey(),
            'id_sewa' => $this->integer()->notNull(),
            'id_jns_kendaraan' => $this->integer()->notNull(),
            'id_kendaraan' => $this->integer()->notNull(),
            'id_paket' => $this->integer()->notNull(),
            'jenis_sewa' => $this->string(50)->notNull() ,
            'sub_tot' => $this->money(19,2)->notNull(),
            

        ]);

            $this->addForeignKey(
            'fk-tb_dt_sewa_kendaraan-id_jns_kendaraan',
            'tb_dt_sewa_kendaraan',
            'id_jns_kendaraan',
            'tb_m_jns_kendaraan',
            'id_jns_kendaraan'
        );
          $this->addForeignKey(
            'fk-tb_dt_sewa_kendaraan-id_kendaraan',
            'tb_dt_sewa_kendaraan',
            'id_kendaraan',
            'tb_m_kendaraan',
            'id_kendaraan'
        );
            $this->addForeignKey(
            'fk-tb_dt_sewa_kendaraan-id_paket',
            'tb_dt_sewa_kendaraan',
            'id_paket',
            'tb_m_paket',
            'id_paket'
        );
          
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tb_dt_sewa_kendaraan');
    }
}
