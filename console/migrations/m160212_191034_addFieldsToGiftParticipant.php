<?php

use yii\db\Schema;
use yii\db\Migration;

class m160212_191034_addFieldsToGiftParticipant extends Migration
{
    public function up()
    {
	    $this->addColumn('{{%gift}}', 'order_id', $this->string());
	    $this->addColumn('{{%activity}}', 'cause', $this->string()->notNull());
	    $this->addColumn('{{%activity}}', 'example', $this->text()->notNull());
    }

    public function down()
    {
        echo "m160212_191034_addFieldsToGiftParticipant cannot be reverted.\n";

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
