<?php

require_once "../../vendor/autoload.php";
require_once "../Util/Constants.php";
@session_start();
$action = htmlentities($_GET['action'], ENT_QUOTES, "UTF-8");


switch ($action) {
    case "LoadLatestClasses":
        $TeacherID = htmlentities($_SESSION['eliTeacherID'], ENT_QUOTES, "UTF-8");
        Classes::MyClasses($TeacherID);
        break;
    case "LoadAllClasses":
        break;
    case "LoadClassInfo":
        $ID = htmlentities($_REQUEST['id'], ENT_QUOTES, "UTF-8");
        Classes::LoadClassInfo($ID);
        break;
    case "LoadStudentProfile":
        echo "Student Profile";
        break;
    case "NewClass":
        $Level = htmlentities($_POST['level'], ENT_QUOTES, "UTF-8");
        $year = htmlentities($_POST['year'], ENT_QUOTES, "UTF-8");
        Classes::NewClass($Level, $year);
        break;
    case "NewQuarter":
        $Quarter = htmlentities($_POST['quarter'], ENT_QUOTES, "UTF-8");
        $Status = htmlentities($_POST['status'], ENT_QUOTES, "UTF-8");
        $Daily = htmlentities($_POST['daily'], ENT_QUOTES, "UTF-8");
        $Total = htmlentities($_POST['total'], ENT_QUOTES, "UTF-8");
        $Start = htmlentities($_POST['start'], ENT_QUOTES, "UTF-8");
        $Finish = htmlentities($_POST['finish'], ENT_QUOTES, "UTF-8");
        $ClassID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
        $classname = htmlentities($_POST['classname'], ENT_QUOTES, "UTF-8");
        Classes::CreateNewQuarter($ClassID, $classname, $Quarter, $Daily, $Total, $Start, $Status, $Finish);
        break;
    case "LoadQuarters":
        $ClassID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
        Classes::LoadQuarters($ClassID);
        break;
    case "LoadQuarterInfo":
        $ClassID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
        Classes::LoadQuarterInfo($ClassID);
        break;
    case "LoadQuarterStudents":
        $ClassID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
        Classes::LoadQuarterStudents($ClassID);
        break;
    case "loadQuarters":
        $ClassID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
        Classes::LoadClassQuarters($ClassID);
        break;
}