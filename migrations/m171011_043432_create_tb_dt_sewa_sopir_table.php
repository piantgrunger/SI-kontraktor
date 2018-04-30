<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tb_dt_sewa_sopir`.
 */
class m171011_043432_create_tb_dt_sewa_sopir_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tb_dt_sewa_sopir', [
            'id_dt_sewa' => $this->primaryKey(),
            'id_sewa' => $this->integer()->notNull(),
            'id_sopir' => $this->integer()->notNull(),
            'id_paket' => $this->integer()->notNull(),
            'jenis_sewa' => $this->string(50)->notNull(),
            'sub_tot' => $this->money(19,2)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-tb_dt_sewa_sopir-id_sopir',
            'tb_dt_sewa_sopir',
            'id_sopir',
            'tb_m_sopir',
            'id_sopir'
        );
            $this->addForeignKey(
            'fk-tb_dt_sewa_sopir-id_paket',
            'tb_dt_sewa_sopir',
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
        $this->dropTable('tb_dt_sewa_sopir');
    }
}
