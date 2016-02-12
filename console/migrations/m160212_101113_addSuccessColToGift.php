<?php

use yii\db\Schema;
use yii\db\Migration;

class m160212_101113_addSuccessColToGift extends Migration
{
    public function up()
    {
		$this->addColumn('{{%gift}}', 'success', $this->boolean()->defaultValue(0));
    }

    public function down()
    {
        echo "m160212_101113_addSuccessColToGift cannot be reverted.\n";

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
