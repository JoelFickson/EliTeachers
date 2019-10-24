<?php

if (!Session::exists("eliTeacherID")) {

    SessionRouter::Redirect(URL_ROOT);
    Session::flash("LOGGED_IN_STATUS", "You are not logged in. Please login to continue");


} else {


    $TeacherEmail = htmlentities($_SESSION['eliTeacherEmail'], ENT_QUOTES, "UTF-8");
    $FName = htmlentities($_SESSION['eliTeacherFName'], ENT_QUOTES, "UTF-8");
    $LName = htmlentities($_SESSION['eliTeacherLName'], ENT_QUOTES, "UTF-8");
    $TeacherID = htmlentities($_SESSION['eliTeacherID'], ENT_QUOTES, "UTF-8");


}
