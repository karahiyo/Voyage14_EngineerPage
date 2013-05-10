<?php

class Controller_Index extends Controller
{

	public function action_index()
	{
		return View_Smarty::forge('index/index');
        }

}
