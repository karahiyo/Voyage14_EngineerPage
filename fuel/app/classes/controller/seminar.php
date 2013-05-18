<?php

class Controller_Seminar extends Controller
{
    public function before()
    {
        \Lib_Security::check_auth();
    }

    public function action_index($seminar_id=null)
    {
        (null === $seminar_id) and Response::redirect('user');
        $seminar    = \Model_Seminar::find($seminar_id);

        $data   = array(
            'seminar'   => $seminar,
        );
        return View_Smarty::forge('seminar/index',$data);
    }

    public function action_new()
    {
        $data   = array();
        $data['sem_cnt']    = \Model_Seminar::count(array('where'=>array('del_flg'=>0)))+1;
        return View_Smarty::forge('seminar/content',$data);
    }
    public function action_edit($id)
    {
        $data   = array();
        $seminar= \Model_Seminar::find($id);
        $data   = array(
            'sem_cnt'       => $id,
            'seminar_id'    => $id,
            'seminar'       => $seminar,
        );
        return View_Smarty::forge('seminar/content',$data);
    }
    public function action_confirm()
    {
        (Input::method()!=='POST') and Response::redirect('seminar/new');
        $seminar_id = Input::post('seminar_id');
        if($seminar_id)$seminar     = \Model_Seminar::find($seminar_id);
        else $seminar    = \Model_Seminar::forge();

        /* Validation */
        $validation = \Model_Seminar::validate();
        if(!$validation->run(Input::post()))
        {
            \View_Smarty::set_global('errors',$validation->error());
            $data   = array(
                'sem_cnt'   => $seminar_id,
                'seminar_id'=> $seminar_id,
                'seminar'   => Input::post(),
            );
            return View_Smarty::forge('seminar/content',$data);
        }

        $seminar->set(Input::post());
        $data   = array(
            'sem_cnt'   => $seminar_id,
            'seminar_id'=> $seminar_id,
            'seminar'   => $seminar,
        );

        return View_Smarty::forge('seminar/content_confirm',$data);
    }
    public function action_execute()
    {

        if(Security::check_token())
        {
            Session::set_flash('message','不正なページ遷移です');
            Response::redirect(Uri::create('user'));
        }
        (Input::method()!=='POST') and Response::redirect('seminar/new');
        $seminar_id = Input::post('seminar_id');
        if($seminar_id)$seminar     = \Model_Seminar::find($seminar_id);
        else $seminar    = \Model_Seminar::forge();

        $validation = \Model_Seminar::validate();
        if(!$validation->run(Input::post()))
        {
            \View_Smarty::set_global('errors',$validation->error());
            $data   = array('seminar'   => Input::post());
            return View_Smarty::forge('seminar/content',$data);
        }
        $input  = Input::post();
        $seminar->set(Input::post());
        if($seminar->save())Session::set_flash('message','勉強会を保存しました');
        else Session::set_flash('message','勉強会の保存に失敗しました');
        Response::redirect(Uri::create('user'));
    }

}
