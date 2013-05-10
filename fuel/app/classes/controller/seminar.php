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

}
