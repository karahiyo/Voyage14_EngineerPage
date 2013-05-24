<?php

class Controller_Wish extends Controller_Template
{
    public function before()
    {
        \Lib_Security::check_auth();
    }


    public function action_index()
    {
        $wish_lists = \Model_Wish::find('all',array(
            'order_by'  => array('id'=>'desc'),
        
        ));
        $data   = array(
            'wishs' => $wish_lists,
        
        );
        return View_Smarty::forge('wish/index',$data);
    }

    public function action_new()
    {
        if(\Input::method()!=='POST')
        {
            return View_Smarty::forge('wish/new');
        }
    }
    public function action_confirm()
    {
        (\Input::method()!=='POST') and Response::redirect('wish');
        $wish_id        = Input::post('wish_id');
        if($wish_id)$wish     = \Model_Wish::find($wish_id);
        else $wish      = \Model_Wish::forge();

        /* Validation */
        $validation = \Model_Wish::validate();
        if(!$validation->run(Input::post()))
        {
            \View_Smarty::set_global('errors',$validation->error());
            $data   = array(
                'wish'   => Input::post(),
            );
            return View_Smarty::forge('wish/new',$data);
        }

        $wish->set(Input::post());
        $data   = array(
            'wish'   => $wish,
        );
        return View_Smarty::forge('wish/confirm',$data);
    }

    public function action_execute()
    {
        (\Input::method()!=='POST') and Response::redirect('wish');
        if(!Security::check_token())
        {
            Session::set_flash('message','不正なページ遷移です');
            Response::redirect(Uri::create('wish'));
        }

        $wish_id        = Input::post('wish_id');
        if($wish_id)$wish     = \Model_Wish::find($wish_id);
        else $wish      = \Model_Wish::forge();

        /* Validation */
        $validation = \Model_Wish::validate();
        if(!$validation->run(Input::post()))
        {
            \View_Smarty::set_global('errors',$validation->error());
            $data   = array(
                'wish'   => Input::post(),
            );
            return View_Smarty::forge('wish/new',$data);
        }

        $wish->set(Input::post());
        $user   = \Model_User::find('first',array('where' => array('username' => Auth::get_screen_name())));
        $wish->author   = $user->id;

        if($wish->save())Session::set_flash('message','保存しました');
        else Session::set_flash('message','やりたいことの保存に失敗しました');
        Response::redirect(Uri::create('wish'));

    }

    public function action_detail($id)
    {
        return View_Smarty::forge('index/404');
    }

}
