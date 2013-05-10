<?php

namespace Fuel\Migrations;

class Add_email_to_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'email' => array('constraint' => 255, 'type' => 'varchar'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users', array(
			'email'

		));
	}
}