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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    >

    <title>Teachers Dashboard | View Classes!</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT ?>/Core/UX/et.css">
</head>
<body>
<?php

require_once "../../Core/Partials/MainNav.php"; ?>

<div class="container">

    <br><br>

    <h2 class="text-center text-primary">View Class Information</h2>
    <?php
    if (!empty($_GET['id'])) {
        $ID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
        echo "<p class='text-center'><a class='btn btn-info' href='add-quarter.php?id=$ID'>Add Quarter</a></p>";

    }

    ?>

    <hr>
    <div class="row" id="UI">

        <?php
        Classes::LoadClassInfo($ID);

        ?>

    </div>

</div>

<?php
require_once "../../Core/Partials/TeachersFooterInclude.php";

require_once "../../Core/Partials/MainFooter.php";
?>

<script src="<?php echo URL_ROOT ?>/Core/Handlers/Classes.js"></script>
<script>
    $(() => {
        const UI = $("#UI");
        // LoadClassInfo(UI);

    });
</script>
</body>
</html>
