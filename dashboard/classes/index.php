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
    <title>Classes | Home</title>
    <?php require_once "../../Core/Partials/TeacherHeaderInclude.php"; ?>
</head>
<body>
<?php

require_once "../../Core/Partials/MainNav.php"; ?>

<div class="container">
    <br>
    <h4>Manage Classes </h4>
    <a href="new-class.php">Add New Class</a>
    <hr>
    <div class="container">
        <div class="col-sm-12 mx-auto">
            <div class="col-sm-12">

                <div class="ClassesUI">Loading Classes</div>
            </div>
        </div>
    </div>

</div>

<?php
require_once "../../Core/Partials/TeachersFooterInclude.php";

require_once "../../Core/Partials/MainFooter.php";
?>

<script src="<?php echo URL_ROOT ?>/Core/Handlers/Classes.js"></script>
<script>
    $(() => {
        const ClassesUI = $(".ClassesUI");
        LoadMyClasses(ClassesUI);

    });
</script>
</body>
</html>
