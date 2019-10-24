<?php
require_once "../../vendor/autoload.php";
require_once "../../Core/Util/Constants.php";
require_once "../../Core/Partials/SessionManager.php";
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
    <h4>All My Students </h4>
    <p><a href="#" id="backLink">Back</a></p>

    <hr>
    <div class="row">
        <div class="col-sm-8">

            <h4>All Students Pending In Your Classes</h4>
            <?php
            Students::PendingStudents();
            ?>

        </div>
        <div class="col-sm-4">
            <h4>Select Quarter</h4>
            <div class="EnrollUI"></div>
            <form method="post" class="col-sm-12" id="EnrollmentForm">

                <div class="form-group row">

                    <div class="col">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Quarter</label>
                        <select name="period" class="custom-select" id="MyUI">
                            <option selected disabled>Quarter</option>


                        </select>
                    </div>

                </div>


                <button id="ButtonAdd" disabled class="btn btn-primary col">Enroll</button>

            </form>

        </div>
    </div>

</div>

<?php
require_once "../../Core/Partials/TeachersFooterInclude.php";

require_once "../../Core/Partials/MainFooter.php";
?>

<script src="<?php echo URL_ROOT ?>/Core/Handlers/Students.js"></script>
<script>
    $(() => {


        const StudentLink = $(".StudentLink");
        const ButtonAdd = $("#ButtonAdd");
        const EnrollmentForm = $("#EnrollmentForm");
        const UI = $(".EnrollUI");

        let ClassID;
        let ID;


        StudentLink.click((event) => {


            event.preventDefault();


            const URL = StudentLink.attr("href");

            ID = getURLParameters(URL, 'id');
            ClassID = getURLParameters(URL, 'cls');


            ButtonAdd.prop('disabled', false);

            LoadAllClassQuarters(ClassID);


        });


        EnrollmentForm.submit((evt) => {

            evt.preventDefault();


            EnrollStudent(UI, ID, ClassID);


        });

        $('#backLink').click(function () {
            parent.history.back();
            return false;
        });

    });
</script>
</body>
</html>
