<?php

require_once "../../vendor/autoload.php";
require_once "../Util/Constants.php";
@session_start();
$action = htmlentities($_GET['action'], ENT_QUOTES, "UTF-8");


switch ($action) {
    case "LoadStudentProfile":
        $ID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
        Students::LoadStudentProfile($ID);
        break;
    case "MyStudents":
        echo "Hello";
        break;
    case "AddAttendance":
        $ID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
        $StudentId = htmlentities($_GET['std'], ENT_QUOTES, "UTF-8");
        $Date = htmlentities($_POST['date'], ENT_QUOTES, "UTF-8");
        $Period = htmlentities($_POST['period'], ENT_QUOTES, "UTF-8");

        Attendance::AddAttendance($ID, $StudentId, $Date, $Period);
        break;

    case "Enroll":
        $ID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
        $StudentId = htmlentities($_GET['cls'], ENT_QUOTES, "UTF-8");

        Students::Enroll($ID, $StudentId);

        break;
}
