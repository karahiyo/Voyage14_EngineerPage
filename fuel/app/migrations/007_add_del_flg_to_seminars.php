<?php

namespace Fuel\Migrations;

class Add_del_flg_to_seminars
{
	public function up()
	{
		\DBUtil::add_fields('seminars', array(
			'del_flg' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('seminars', array(
			'del_flg'

		));
	}
}