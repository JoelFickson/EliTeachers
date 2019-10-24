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

    <?php

    require_once "../../Core/Partials/TeacherHeaderInclude.php"; ?>

    <title>Teachers Dashboard | View Classes!</title>

</head>
<body>
<?php

require_once "../../Core/Partials/MainNav.php"; ?>

<div class="container">

    <br><br>

    <h2 class="text-center text-primary">Confirm Student</h2>
    <a class="btn btn-info" href="index.php">Back</a>
    <hr>
    <div class="row" id="UI">

        <div class="col-sm-4 mx-auto">
            <p class="text-center">
                <img src="../../Core/site/loading.gif" class="img img-fluid mx-auto" alt="">
            </p>
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
        const UI = $("#UI");
        LoadStudentProfile(UI);

    });
</script>
</body>
</html>
