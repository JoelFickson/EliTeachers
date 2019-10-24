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
    <h4>Manage Classes | Add New Class </h4>
    <a href="index.php">Back</a>
    <hr>
    <div class="col-sm-6 mx-auto offset-3">
        <div class="UIX col-sm-12"></div>
        <div class="col-sm-12">
            <form method="post" class="col-sm-12" id="AddClass">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Quarter</label>
                    </div>
                    <select name="level" class="custom-select" id="inputGroupSelect01">
                        <option selected disabled>Choose Quarter</option>
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="2">3</option>
                        <option value="3">4</option>

                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Level</label>
                    </div>
                    <select class="custom-select" name="level" id="inputGroupSelect01">
                        <option selected>Choose Level</option>
                        <option value="1">4</option>
                        <option value="1">5</option>
                        <option value="2">6</option>
                        <option value="3">4-3 Day</option>
                        <option value="3">5-3 Day</option>
                        <option value="3">6-3 Day</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect02">
                        <option name="year" selected>Choose...</option>
                        <option value="1"><?php

                            echo date("Y")
                            ?></option>

                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="inputGroupSelect02">Year</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="" class="input-group-text">Start Date</label>
                    </div>
                    <div><input type="text" name="start" class="form-control "/></div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="" class="input-group-text">Finish Date</label>
                    </div>
                    <div><input type="text" name="finish" class="form-control "/></div>
                </div>

                <button id="ButtonAdd" class="btn btn-primary col">Add Class</button>


            </form>
        </div>
    </div>

</div>

<?php
require_once "../../Core/Partials/TeachersFooterInclude.php";

require_once "../../Core/Partials/MainFooter.php";
?>

<script src="<?php echo URL_ROOT ?>/Core/Handlers/Classes.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.js"></script>
<script>
    $(() => {
        const AddClass = $("#AddClass");
        const UIX = $(".UIX");

        $('input[name="start"]').daterangepicker({
            singleDatePicker: true,

            minYear: 2019,
            maxYear: parseInt(moment().format('YYYY'), 10)
        });
        $('input[name="finish"]').daterangepicker({
            singleDatePicker: true,

            minYear: 2019,
            maxYear: parseInt(moment().format('YYYY'), 10)
        });

        AddClass.submit((evt) => {
            evt.preventDefault();
            AddNewClass(UIX, AddClass);


        });


    });
</script>
</body>
</html>
