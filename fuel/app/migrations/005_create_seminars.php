<?php

namespace Fuel\Migrations;

class Create_seminars
{
	public function up()
	{
		\DBUtil::create_table('seminars', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'date' => array('type' => 'date', 'null' => true),
			'requirements' => array('type' => 'text', 'null' => true),
			'notes' => array('type' => 'text', 'null' => true),
			'slides' => array('type' => 'text'),
			'references' => array('type' => 'text', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('seminars');
	}
}
