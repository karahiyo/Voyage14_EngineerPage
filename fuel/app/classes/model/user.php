<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
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

        public static function validate($factory=null)
        {
            $val    = \Validation::forge();
            if($factory==='password')
            {
                $val->add_field('password_current', '現在のパスワード', 'required')
                    ->add_rule(function($val)
                            {
                                $auth   = Auth::instance();
                                $user   = \Model_User::find('first',array('where'=>array('username'=>Auth::get_screen_name())));
                                if($user === null)
                                {
                                    \Validation::active()->set_message('closure', ':labelが不正です');
                                }
                                if($auth->hash_password($val) === $user->password)return true;
                                \Validation::active()->set_message('closure', ':labelが正しくありません');
                                return false;
                            });
                $val->add_field('password', '新しいパスワード', 'required')
                    ->add_rule(function($val)
                            {
                                if($val === \Input::post('password_confirm'))return true;
                                \Validation::active()->set_message('closure', ':labelと確認のパスワードが一致していません');
                                return false;
                            });
                $val->add_field('password_confirm', 'パスワード(確認)', 'required');
            }
            return $val;
        }
}
