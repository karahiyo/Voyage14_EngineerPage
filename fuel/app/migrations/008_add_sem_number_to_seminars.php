<?php

namespace Fuel\Migrations;

class Add_sem_number_to_seminars
{
	public function up()
	{
		\DBUtil::add_fields('seminars', array(
			'sem_number' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('seminars', array(
			'sem_number'

		));
	}
}