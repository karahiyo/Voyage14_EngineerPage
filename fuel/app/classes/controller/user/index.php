<?php

class Controller_User_Index extends Controller_User_Base
{
        public function before()
        {
            parent::before();
        }

	public function action_index()
	{
            return View_Smarty::forge('user/index');
	}

}
