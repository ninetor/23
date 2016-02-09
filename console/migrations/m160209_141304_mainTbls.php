<?php

use yii\db\Schema;
use yii\db\Migration;

class m160209_141304_mainTbls extends Migration
{
    public function up()
    {
	    $tableOptions = null;
	    if ($this->db->driverName === 'mysql') {
		    // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
		    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	    }

	    //tbl with activities
	    $this->createTable('{{%activity}}', [
		    'id' => $this->primaryKey(),
		    'text' => $this->text()->notNull(),
	    ], $tableOptions);

	    //tbl with users
	    $this->createTable('{{%participant}}', [
		    'id' => $this->primaryKey(),
		    'date' => $this->timestamp()->notNull(),
		    'name' => $this->string()->notNull(),
		    'phone' => $this->string()->notNull(),
		    'activity' => $this->integer()->notNull(),
		    'text' => $this->string(200)->notNull(),
		    'winner' => $this->boolean()->defaultValue(0)->notNull(),
	    ], $tableOptions);

	    //tbl with gifts
	    $this->createTable('{{%gift}}', [
		    'id' => $this->primaryKey(),
		    'date' => $this->timestamp()->notNull(),
		    'from' => $this->string()->notNull(),
		    'to' => $this->string()->notNull(),
		    'gift_code' => $this->string()->notNull(),
	    ], $tableOptions);
    }

    public function down()
    {
        echo "m160209_141304_mainTbls cannot be reverted.\n";

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
