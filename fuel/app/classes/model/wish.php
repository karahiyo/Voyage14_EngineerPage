<?php

class Model_Wish extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'detail',
		'related_seminar_id',
		'author',
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

//        protected static $_has_many = array(
//                'comments'  => array(
//                    'key_from'  => 'id',
//                    'model_to'  => 'Model_WishComment',
//                    'key_to'    => 'wish_id',
//                    'caccade_save'  => false,
//                    'cascade_delete'=> true,
//                    )
//                );
        public static function validate()
        {
            $val    = \Validation::forge();
            $val->add_field('title', 'タイトル', 'required');
            $val->add_field('detail','詳細','required');
            return $val;
        }


}
