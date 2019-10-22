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
    <h5>Add Attendance </h5>
    <p>Select class and quarter to add attendance</p>
    <hr>
    <div class="container row">
        <div class="col-sm-6">
            <div class="col-sm-12">
                <h4>All Students In This Quarter</h4>
                <hr>

                <?php


                $ClassID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");

                $PST = "SELECT students.student_id  ,quarters.status, phone, email, first_name,last_name 
            FROM class,quarters,students,attendance WHERE attendance.q_uid=quarters.q_uid and attendance.q_uid='$ClassID' GROUP BY  students.student_id";

                $RST = DSN::getInstance()->CRUD($PST);
                if ($RST->rowCount() > 0) {
                    foreach ($RST as $item) {
                        $Fullname = $item['first_name'] . " " . $item['last_name'];
                        $StudentID = $item['student_id'];
                        echo "<p class=''><a id='StudentLink' href='?stdid=$StudentID'>$Fullname</a></p>";


                    }

                } else {
                    echo "<h5>This class has no quarters. Quarters will appear here when you add them.</h5>";
                }


                ?>


            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-12">
                <h4>Add Attendance Here</h4>
                <hr>

                <div class="AttendanceUI text-center"></div>
                <form method="post" class="col-sm-12" id="Attendance">

                    <div class="form-group row">

                        <div class="col">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Period</label>
                            <select name="period" class="custom-select" id="">
                                <option selected>Period</option>
                                <option value="VC">VC</option>
                                <option value="AB">AB</option>
                                <option value="P14D">P14D</option>
                                <option value="P34D">P34D</option>
                                <option value="P44D">P44D</option>
                                <option value="P54D">P54D</option>
                                <option value="P64D">P64D</option>
                                <option value="P74D">P74D</option>
                                <option value="P24D">P64D</option>
                                <option value="2">P24D</option>
                                <option value="2">P24D</option>
                                <option value="2">P24D</option>
                                <option value="2">P24D</option>
                                <option value="2">P24D</option>


                            </select>
                        </div>
                        <div class="col">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Date</label>
                            <input name="date" type="text" class="form-control" placeholder="">
                        </div>
                    </div>


                    <button id="ButtonAdd" disabled class="btn btn-primary col">Add Attendance</button>

                </form>


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


            AddAttendance(ID, StdID);


        });


    })
</script>
</body>
</html>
