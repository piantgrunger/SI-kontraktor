<?php

use yii\db\Migration;
use Faker\Factory;
use app\models\jnskendaraan;
use yii\helpers\ArrayHelper;

class  m170925_075328_create_table_tb_m_kendaraan extends Migration
{
     const TABLE_NAME = 'tb_m_kendaraan';
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id_kendaraan' => $this->primaryKey(),   
            'id_jns_kendaraan' => $this->integer()->notNull(),
            'no_plat_kendaraan' => $this->string(50)->notNull(),
            'no_rangka_kendaraan' => $this->string(50)->notNull(),
            'no_mesin_kendaraan' => $this->string(50)->notNull(),
            'tahun_pembuatan' => $this->integer()->notNull(),
            'merk_kendaraan' => $this->string(50)->notNull(),
            'pabrikan_kendaraan' => $this->string(50)->notNull(),
            'pemilik_kendaraan' => $this->string(50)->notNull(),
            'kapasitas_penumpang' => $this->string(50)->notNull(),
            'status' => $this->string(10)->notNull(),
            
            'ket' => $this->text(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
            
        ]);
    
        $this->addForeignKey(
            'fk-tb_m_kendaraan-id_jns_kendaraan',
            'tb_m_kendaraan',
            'id_jns_kendaraan',
            'tb_m_jns_kendaraan',
            'id_jns_kendaraan'
        );
        
    
     

    }
    
     

    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
        
       // echo "m170925_013736_create_table_tb_m_kendaraan cannot be reverted.\n";

       // return false;
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_072106_create_table_tb_m_kendaraan cannot be reverted.\n";

        return false;
    }
    */
}
