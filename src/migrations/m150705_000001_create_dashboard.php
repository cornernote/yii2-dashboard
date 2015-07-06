<?php

use yii\db\Schema;

class m150705_000001_create_dashboard extends \yii\db\Migration
{
    const TABLE = '{{%dashboard}}';

    public function up()
    {
        $this->createTable(self::TABLE, [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'layout_class' => Schema::TYPE_STRING . ' NOT NULL',
            'sort' => Schema::TYPE_INTEGER . ' NOT NULL',
            'options' => Schema::TYPE_TEXT,
            'enabled' => Schema::TYPE_INTEGER . '(1) DEFAULT 0 NOT NULL',
        ], ($this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB' : null));
    }

    public function down()
    {
        $this->dropTable(self::TABLE);
    }
}
