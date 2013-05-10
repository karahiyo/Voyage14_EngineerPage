<?php

class Controller_User_Base extends Controller
{

    public function before()
    {
        Session::set_flash('error','ログイン出来ていません');
        (!Auth::instance()->check()) and Response::redirect('/');
    }

}
