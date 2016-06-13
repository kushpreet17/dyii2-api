<?php

use yii\db\Schema;
use yii\db\Migration;

class m160609_080517_add_new_field extends Migration
{
    public function up()
    {
    $this->addColumn('{{%user}}', 'firstName', Schema::TYPE_STRING);
    $this->addColumn('{{%user}}', 'lastName', Schema::TYPE_STRING);
    $this->addColumn('{{%user}}', 'country', Schema::TYPE_STRING);
    $this->addColumn('{{%user}}', 'address', Schema::TYPE_STRING);
    $this->addColumn('{{%user}}', 'zipcode', Schema::TYPE_INTEGER);
    
    }

    public function down()
    {
        echo "m160609_080517_add_new_field cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
