<?php


class SessionRouter extends Session
{
    public function __construct()
    {

        if (Session::exists("EHS_PERSONAL_ID")) {

            self::Redirect(DASHBOARD);
        } else {
            self::Redirect(URL_ROOT);
        }
    }

    public static function Redirect($URL)
    {
        header("location:{$URL}");

    }

}