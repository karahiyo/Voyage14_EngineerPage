<?php

namespace Fuel\Migrations;

class Create_wishes
{
	public function up()
	{
		\DBUtil::create_table('wishes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'detail' => array('type' => 'text'),
			'related_seminar_id' => array('constraint' => 11, 'type' => 'int','null'=>true),
			'author' => array( 'constant' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('wishes');
	}
}
