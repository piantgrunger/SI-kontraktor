<?php

use yii\db\Migration;
use app\models\jnskendaraan;
use Faker\Factory;
use yii\helpers\ArrayHelper;
/**
 * Handles the creation of table `tb_m_paket`.
 */
class m171004_073146_create_tb_m_paket_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tb_m_paket', [
            'id_paket' => $this->primaryKey(),
            'kode_paket' => $this->string()->unique()->notNull(),
            'nama_paket' => $this->string()->notNull(),
            'jenis_paket' => $this->string(50)->notNull(),
            'id_jns_kendaraan' => $this->integer(),
            'jenis_biaya' => $this->string(50)->notNull() ,
            'biaya_rp' => $this->money(19,2),
            'denda_rp' => $this->money(19,2),
            'stat' =>$this->string(50)->notNull() ,
            
            
            
               'ket' => $this->text(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),

            
        ]);
        
          $this->addForeignKey(
            'fk-tb_m_paket-id_jns_kendaraan',
            'tb_m_paket',
            'id_jns_kendaraan',
            'tb_m_jns_kendaraan',
            'id_jns_kendaraan'
        );
          
          
                
         
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tb_m_paket');
    }
}
