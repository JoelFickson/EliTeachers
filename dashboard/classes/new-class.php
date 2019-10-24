<?php
require_once "../../vendor/autoload.php";
require_once "../../Core/Util/Constants.php";
require_once "../../Core/Partials/SessionManager.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title>Classes | Create a new class</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php require_once "../../Core/Partials/TeacherHeaderInclude.php"; ?>
</head>
<body>
<?php

require_once "../../Core/Partials/MainNav.php"; ?>

<div class="container">
    <br>
    <h5>Manage Classes </h5>
    <a href="index.php">Back</a>
    <hr>
    <br>
    <br>
    <div class="col-sm-6 mx-auto __JoelUICard" id="">
        <h4 class="text-center">Add New Class</h4>
        <hr>
        <div class="UIX col-sm-12"></div>
        <div class="col-sm-12 ">
            <form method="post" class="col-sm-12" id="AddClass">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Level</label>
                    </div>
                    <select class="custom-select" required name="level" id="inputGroupSelect01">
                        <option selected disabled>Choose Level</option>
                        <option value="L44D">4</option>
                        <option value="L54D">5</option>
                        <option value="L64D">6</option>
                        <option value="L43D">4-3 Day</option>
                        <option value="L53D">5-3 Day</option>
                        <option value="L63D">6-3 Day</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <select class="custom-select" required name="year" id="inputGroupSelect02">
                        <option name="" selected disabled>Choose...</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>

                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="inputGroupSelect02">Year</label>
                    </div>
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


        AddClass.submit((evt) => {
            evt.preventDefault();
            AddNewClass(UIX, AddClass);


        });


    });
</script>
</body>
</html>
