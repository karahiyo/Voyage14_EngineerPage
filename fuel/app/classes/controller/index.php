<?php

class Controller_Index extends Controller
{

	public function action_index()
	{
		return View_Smarty::forge('index/index');
        }

        public function action_login()
        {
            (Input::method()!=='POST') and Response::redirect('/');

            /* login処理 */


            Response::redirect('user');
        }

}
