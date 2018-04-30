<?php

use yii\db\Migration;
use Faker\Factory;

class m171003_091447_create_tb_m_customer extends Migration
{
      const TABLE_NAME = 'tb_m_customer';
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id_customer' => $this->primaryKey(),   
           'kode_customer' => $this->string(50)->notnull()->unique(),   
             
            'nama_customer' => $this->string(50)->notNull(),
            'alamat_customer' => $this->text()->notNull(),
            'telp_customer' => $this->string(50)->notNull(),
            'telp2_customer' => $this->string(50),
            'no_ktp'=> $this->string(50)->notNull(),
            
            'email_customer' => $this->string(50)->notNull(),
            'stat' =>$this->string(50)->notNull(),
            
            
            
            
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
        echo "m170926_045527_create_tb_m_customer cannot be reverted.\n";

        return false;
    }
    */
}
