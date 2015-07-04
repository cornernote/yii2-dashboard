<?php

use yii\db\Schema;

class m150705_000002_create_dashboard_panel extends \yii\db\Migration
{
    const TABLE = '{{%dashboard_panel}}';

    public function up()
    {
        $this->createTable(self::TABLE, [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'panel' => Schema::TYPE_STRING . ' NOT NULL',
            'options' => Schema::TYPE_TEXT,
            'dashboard_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'position' => Schema::TYPE_STRING . ' NOT NULL',
            'sort' => Schema::TYPE_INTEGER . ' NOT NULL',
            'enabled' => Schema::TYPE_INTEGER . '(1) DEFAULT 0 NOT NULL',
        ], ($this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB' : null));
        $this->addForeignKey('fk_dashboard_panel_dashboard_id', self::TABLE, ['dashboard_id'], '{{%dashboard}}', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_dashboard_panel_dashboard_id', self::TABLE);
        $this->dropTable(self::TABLE);
    }
}
