<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tb_mt_sewa`.
 */
class m171010_071143_create_tb_mt_sewa_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
               
       $this->createTable('tb_mt_sewa', [
            'id_sewa' => $this->primaryKey(),
            'no_sewa' => $this->string()->notNull()->unique(),
            'tgl_pemesanan' => $this->date()->notNull(),
            'tgl_sewa' => $this->date()->notNull(),
            'jam_sewa' => $this->time()->notNull(),
            'id_customer' => $this->integer()->notNull(),
           
            
            'tgl_pengembalian' => $this->date()->notNull(),
            'jam_pengembalian' => $this->time()->notNull(),
            'jaminan' =>$this->string(50)->notNull(),
            'ket_jaminan' =>  $this->text(),
            'DP_rp' => $this->money(19,2)->notNull(),  
            'total_sewa_kendaraan' => $this->money(19,2)->notNull(

            ),  
            'total_sewa_sopir' => $this->money(19,2)->notNull(),  
            'total' => $this->money(19,2)->notNull(),  

            
            
             
            'ket' => $this->text(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
       ]);
          $this->addForeignKey(
            'fk-tb_mt_sewa-id_customer',
            'tb_mt_sewa',
            'id_customer',
            'tb_m_customer',
            'id_customer'
          );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tb_mt_sewa');
    }
}
