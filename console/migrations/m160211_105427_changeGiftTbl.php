<?php

use yii\db\Schema;
use yii\db\Migration;

class m160211_105427_changeGiftTbl extends Migration
{
    public function up()
    {
		$this->addColumn('{{%gift}}', 'validation_code', $this->string());
	    $this->alterColumn('{{%gift}}', 'to', $this->string());
    }

    public function down()
    {
        echo "m160211_105427_changeGiftTbl cannot be reverted.\n";

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
