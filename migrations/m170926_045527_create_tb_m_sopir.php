<?php

use yii\db\Migration;
use Faker\Factory;

class m170926_045527_create_tb_m_sopir extends Migration
{
        const TABLE_NAME = 'tb_m_sopir';
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id_sopir' => $this->primaryKey(),   
            'nama_sopir' => $this->string(50)->notNull(),
            'alamat_sopir' => $this->text()->notNull(),
            'telp_sopir' => $this->string(50)->notNull(),
            'no_ktp' => $this->string(50)->notNull(),
            'jns_SIM' =>$this->string(3)->notNull() ,
            'no_SIM' => $this->string(50)->notNull(),
            'tgl_berlaku_SIM' => $this->date()->notNull(),
            'stat' =>$this->string(20)->notNull() ,
            'persentase' => $this->money()->notNull(),
            
            
            
            
            
            'ket' => $this->text(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
            
        ]);
         
        
    }
    public function safeDown()
    {
         $this->dropTable(self::TABLE_NAME); 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170926_045527_create_tb_m_sopir cannot be reverted.\n";

        return false;
    }
    */
}
