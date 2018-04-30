<?php

use yii\db\Migration;

class m170925_013736_create_table_tb_m_setting extends Migration
{
        const TABLE_NAME = 'tb_m_setting';
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id_setting' => $this->primaryKey(),   
            'nama_perusahaan' => $this->string(50)->notNull(),
            'alamat_perusahaan' => $this->text()->notNull(),
            'telp_perusahaan1' => $this->string(50),
            'telp_perusahaan2' => $this->string(50),
            'email_perusahaan' => $this->string(50),
            'website_perusahaan' => $this->string(50),
           
            'logo_perusahaan' => $this->string(50),
            
            
            'ket' => $this->text(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
            
        ]);
        $this->insert(self::TABLE_NAME,[
             'nama_perusahaan' => 'Piant Tour And Travel',
            'alamat_perusahaan' => 'Jl Jawa 12 Surabaya',
            
            'ket' => '',
          
            
            
        ]);

    }

    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
        
       // echo "m170925_013736_create_table_tb_m_setting cannot be reverted.\n";

       // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_013736_create_table_tb_m_setting cannot be reverted.\n";

        return false;
    }
    */
}
