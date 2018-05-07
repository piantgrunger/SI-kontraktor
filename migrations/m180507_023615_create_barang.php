<?php

use yii\db\Migration;

/**
 * Class m180507_023615_create_barang
 */
class m180507_023615_create_barang extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
      $this->createTable('tb_m_barang',[
          'id_barang'=>$this->primaryKey(),
          'kode_barang'=>$this->string()->notNull()->unique(),
            'nama_barang' => $this->string()->notNull(),
            'spesifikasi' => $this->string(),
            'keterangan' => $this->text(),
            'created_at'=>$this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),




      ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable(
            'tb_m_barang');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180507_023615_create_barang cannot be reverted.\n";

        return false;
    }
    */
}
