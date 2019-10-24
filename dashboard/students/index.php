<?php
require_once "../../vendor/autoload.php";
require_once "../../Core/Util/Constants.php";
require_once "../../Core/Partials/SessionManager.php";
?>

<!doctype html>
<html lang="en">
<head>

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
    <p><a href="enroll.php">Enroll Students</a></p>

    <hr>
    <div class="container">
        <div class="col-sm-12 mx-auto">

            <?php
            Students::LoadMyStudents();
            ?>

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

        LoadMyStudents();

    });
</script>
</body>
</html>
