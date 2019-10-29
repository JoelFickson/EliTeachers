<?php
require_once "../vendor/autoload.php";
require_once "../Core/Util/Constants.php";
require_once "../Core/Partials/SessionManager.php";


?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require_once "../Core/Partials/TeacherHeaderInclude.php"; ?>
</head>
<body>
<?php

require_once "../Core/Partials/MainNav.php"; ?>

<div class="container">

    <br>
    <br>
    <div class="col-md-8 mx-auto" id="">
        <div class="col-12">
            <?php
            Greetings::GreetUser();
            ?>
        </div>
    </div>
    <hr>
    <br>

    <div class="row">
        <div class="col-sm-4">
            <div class="col-sm-12 ___CardUI">
                <h5 class="text-center text-primary">Class Management</h5>
                <hr>
                <p class="text-center">Add, view, edit and manage classes.</p>
                <p class="text-center">
                    <a href="<?php echo DASHBOARD?>classes" class="btn btn-primary">Go</a>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12 ___CardUI">
                <h5 class="text-center text-primary">Academics Management</h5>
                <hr>
                <p class="text-center">Add and view performance metrics.</p>
                <p class="text-center">
                    <a href="<?php echo DASHBOARD?>academics" class="btn btn-primary">Add Now</a>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12 ___CardUI">
                <h5 class="text-center text-primary">Student Management</h5>
                <hr>
                <p class="text-center">Get to know your students in your classes.</p>
                <p class="text-center">
                    <a href="<?php echo DASHBOARD?>students" class="btn btn-primary">Go</a>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12 ___CardUI">
                <h5 class="text-center text-primary">Attendance Management</h5>
                <hr>
                <p class="text-center">Manage attendances for your students.</p>
                <p class="text-center">
                    <a href="<?php echo DASHBOARD?>attendance" class="btn btn-primary">Go</a>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12 ___CardUI">
                <h5 class="text-center text-primary">Notifications Center Management</h5>
                <hr>
                <p class="text-center">Send direct notifications to your students/classes</p>
                <p class="text-center">
                    <a href="<?php echo DASHBOARD?>notification" class="btn btn-primary">Go</a>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12 ___CardUI">
                <h5 class="text-center text-primary">Profile Management</h5>
                <hr>
                <p class="text-center">Edit your profile password and picture.</p>
                <p class="text-center">
                    <a href="<?php echo DASHBOARD?>profile" class="btn btn-primary">Go</a>
                </p>
            </div>
        </div>

    </div>

</div>


<?php
require_once "../Core/Partials/TeachersFooterInclude.php";

require_once "../Core/Partials/MainFooter.php";
?>
<script>
    $(() => {
        const ClassesUI = $(".ClassesUI");
        LoadLatestClasses(ClassesUI);

    });
</script>
</body>
</html>
