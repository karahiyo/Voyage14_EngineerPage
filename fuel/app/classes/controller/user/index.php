<?php

class Controller_User_Index extends Controller_User_Base
{
        public function before()
        {
            parent::before();
        }

	public function action_index()
	{
            $seminar    = \Model_Seminar::find('all');
            $data       = array(
                'seminars'  => $seminar,
            );
            return View_Smarty::forge('user/index',$data);

	}
        public function action_edit()
        {
            if(Input::method()==='POST')
            {
                $input  = Input::post();
                if(!\Security::check_token())Response::redirect(\Uri::create('index'));
                $val    = \Model_User::validate('password');
                if(!$val->run($input))
                {
                    \View_Smarty::set_global('errors',$val->error());
                    return View_Smarty::forge('user/edit');
                }
                $newpassword    = $input['password'];
                if(!isset($newpassword))Response::redirect('user');

                $user   = \Model_User::find('first',array('where' => array('username' => Auth::get_screen_name())));
                $auth   = Auth::instance();
                $user->password     = $auth->hash_password($newpassword);

                if(!$user->save())
                {
                    \Session::set_flash('error','パスワードの保存に失敗しました');
                }
                \Session::set_flash('message','パスワード変更に成功しました');
                Response::redirect(\Uri::create('user'));
            }
            return View_Smarty::forge('user/edit');
        }

}
