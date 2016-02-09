<?php

use yii\db\Schema;
use yii\db\Migration;

class m160209_143842_foreignKey4Participant extends Migration
{
    public function up()
    {
	    $this->createIndex('activity_i', '{{%participant}}', 'activity');
	    $this->addForeignKey('participant_activity', '{{%participant}}', 'activity', '{{%activity}}', 'id');

    }

    public function down()
    {
        echo "m160209_143842_foreignKey4Participant cannot be reverted.\n";

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
