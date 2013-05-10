<?php

class Controller_User_Base extends Controller
{

    public function before()
    {
        \Lib_Security::check_auth();
    }

}
