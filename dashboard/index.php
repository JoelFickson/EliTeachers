<?php
require_once "../vendor/autoload.php";
require_once "../Core/Util/Constants.php";


$_SESSION['eliTeacherID'];

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
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
    <div class="jumbotron jumbotron-fluid " id="WelcomeJum">
        <div class="col-12">
            <h1 class="display-4">Welcome Back Thomas</h1>
            <p class="lead">Choose from the options below</p>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-4">
            <div class="col-sm-12 ___CardUI">
                <h5 class="text-center text-primary">Manage Classes</h5>
                <div class="ClassesUI"></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12 ___CardUI">
                <h5 class="text-center text-primary">Attendance Management</h5>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12 ___CardUI">
                <h5>Manage Classes</h5>
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
