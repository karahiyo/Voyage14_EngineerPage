<?php

class Model_Seminar extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'date',
		'requirements',
		'notes',
		'slides',
		'references',
		'created_at',
		'updated_at',
		'del_flg',
		'sem_number',
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

        public static function validate()
        {
            $val    = \Validation::forge();
            $val->add_field('title', 'タイトル', 'required');
            $val->add_field('date','日時','required')
                ->add_rule(function($val)
                    {
                        if(preg_match('/^([0-9]{4})[\-](0?[0-9]|1[0-2])[\-]([0-2]?[0-9]|3[01])$/u',$val))return true;
                        \Validation::active()->set_message('closure', ':labelの形式が不正です');
                        return false;
                    });
            $val->add_field('slides','発表資料','required|valid_url');

            return $val;
        }
}
