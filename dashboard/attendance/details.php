<?php
require_once "../../vendor/autoload.php";
require_once "../../Core/Util/Constants.php";

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php require_once "../../Core/Partials/TeacherHeaderInclude.php"; ?>
</head>
<body>
<?php

require_once "../../Core/Partials/MainNav.php"; ?>

<div class="container">

    <br>
    <div class="container row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <h4>View Attendance In This Quarter</h4>
                <hr>

                <?php


                $ClassID = htmlentities($_GET['uid'], ENT_QUOTES, "UTF-8");

                Attendance::GetAttendanceDetails($ClassID);


                ?>


            </div>
        </div>

    </div>

</div>
<?php
require_once "../../Core/Partials/TeachersFooterInclude.php";

require_once "../../Core/Partials/MainFooter.php";
?>

<script src="<?php echo URL_ROOT ?>/Core/Handlers/Classes.js"></script>
<script src="<?php echo URL_ROOT ?>/Core/Handlers/Students.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.js"></script>
<script>
    $(() => {


        const StudentLink = $("#StudentLink");
        const ButtonAdd = $("#ButtonAdd");
        const FormAddAttendance = $("#Attendance");

        let StdID;
        let ID;


        StudentLink.click((event) => {


            event.preventDefault();

            const Data = $(location).attr("href");
            const URL = StudentLink.attr("href");

            ID = getURLParameters(Data, 'id');

            StdID = getURLParameters(URL, 'stdid');
            ButtonAdd.prop('disabled', false);


        });

        $('input[name="date"]').daterangepicker({
            singleDatePicker: true,

            minYear: 2019,
            maxYear: parseInt(moment().format('YYYY'), 10)
        });

        FormAddAttendance.submit((evt) => {

            evt.preventDefault();

            console.log(StdID);
            AddAttendance(ID, StdID);


        });


    })
</script>
</body>
</html>
