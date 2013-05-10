<?php

class Model_Comment extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'seminar_id',
		'comment_keep',
		'comment_problem',
		'comment_try',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
}
