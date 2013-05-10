<?php

class Controller_Index extends Controller
{

	public function action_index()
	{
            (Auth::instance()->check()) and Response::redirect('/user');
            return View_Smarty::forge('index/index');
        }

        public function action_login()
        {
            (Input::method()!=='POST') and Response::redirect('/');
            (!\Security::check_token()) and Response::redirect(\Uri::create('index'));
            $auth   = Auth::instance();
            if($auth->login(Input::post('user'),Input::post('password')))
            {
                Response::redirect('user');
            }
            else
            {
                Session::set_flash('error','ユーザー名かパスワードが間違っています');
                Response::redirect('/');
            }
        }

        public function action_logout()
        {
            $auth   = Auth::instance();
            $auth->logout();
            Response::redirect('/');
        }
        public function action_404()
        {
            return View_Smarty::forge('index/404');
        }
}
