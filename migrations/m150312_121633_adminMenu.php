<?php

use yii\db\Migration;
use yii\db\Schema;
use cyneek\yii2\menu\models\MenuItems;

class m150312_121633_adminMenu extends Migration
{

	private function tableName()
	{
		return '{{%' . MenuItems::tableName() . '}}';
	}

	public function safeUp()
	{

		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable($this->tableName(), [
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING . '(50) NOT NULL',
			'label' => Schema::TYPE_STRING . '(50) NOT NULL',
			'icon' => Schema::TYPE_STRING . '(25)',
			'url' => Schema::TYPE_STRING,
			'visible' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT 1',
			'options' => Schema::TYPE_TEXT,
			'parent_id' => Schema::TYPE_INTEGER
		], $tableOptions);

		// add indexes for performance optimization
		$this->createIndex('{{%menuItems_name}}', $this->tableName(), 'name', true);
		$this->createIndex('{{%menuItems_visible}}', $this->tableName(), 'visible');

	}

	public function safeDown()
	{
		$this->dropTable($this->tableName());
	}
}