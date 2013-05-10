<?php

class Lib_Security
{
    public static function check_auth()
    {
        Session::set_flash('error','ログイン出来ていません');
        (!Auth::instance()->check()) and Response::redirect('/');
        return true;
    }
}
