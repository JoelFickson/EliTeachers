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

    <h3 class="text-center text-primary">View Quarter Information</h3>


    <hr>
    <div class="row" id="">

        <div class="col-sm-4 mx-auto" id="UI">
            <p class="text-center">
                <img src="../../Core/site/loading.gif" class="img img-fluid mx-auto" alt="">
            </p>
        </div>
        <div class="col-sm-12 container">
            <br>
            <hr>
            <h4 class="text-center">Change Status Of Class</h4>
            <br>
            <form method="post" class="col-sm-6 mx-auto" id="NewQuarter">

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="quarter" class="custom-select" id="">
                            <option selected></option>
                            <option value="1">Pending</option>
                            <option value="2">In Progress</option>
                            <option value="3">Finished</option>


                        </select>
                    </div>
                </div>


                <button id="ButtonAdd" class="btn btn-primary col">Update</button>

            </form>


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
        const UI = $("#UI");
        const StudentsUI = $(".StudentsUI");


        LoadQuarterInfo(UI);
        LoadQuarterStudents(StudentsUI);

    });
</script>
</body>
</html>
