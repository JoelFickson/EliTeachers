<?php

require_once "../vendor/autoload.php";
require_once "../Core/Util/Constants.php";
require_once "../Core/Partials/SessionManager.php";
if (!Session::exists("eliTeacherID")) {

    SessionRouter::Redirect(URL_ROOT);
    Session::flash("LOGGED_IN_STATUS", "You are not logged in. Please login to continue");


} else {

    session_destroy();



    Session::delete("eliTeacherEmail");
    Session::delete("eliTeacherFName");
    Session::delete("eliTeacherLName");
    Session::delete("eliTeacherID");

    SessionRouter::Redirect(URL_ROOT);
}