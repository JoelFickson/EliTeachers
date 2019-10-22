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
    <div class="row">
        <div class="col-sm-6">
            <div class="UIX col-sm-12"></div>
            <div class="col-sm-12">

                <?php
                $ClassName = '';
                $ID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");

                $PST = "SELECT * FROM classes WHERE class_id='$ID'";
                $RST = DSN::getInstance()->CRUD($PST);

                if ($RST->rowCount() > 0) {

                    foreach ($RST as $row) {
                        $ClassName = $row['class_name'];

                        echo "<h4 class='text-center text-primary'> Adding quarter(s) to $ClassName</h4><hr>";
                    }

                } else {
                    echo "This class does not exist";
                }

                ?>
                <form method="post" class="col-sm-12" id="NewQuarter">

                    <div class="form-group row">

                        <div class="col">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Quarter</label>
                            <select name="quarter" class="custom-select" id="">
                                <option selected disabled>Choose Quarter</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>

                            </select>
                        </div>
                        <div class="col">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                            <select name="status" class="custom-select" id="">
                                <option selected disabled>Status</option>
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Finished">Finished</option>


                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="col-sm-12 col-form-label">Total Periods/Day </label>
                            <input type="number" name="daily" class="form-control" id="" placeholder="">
                        </div>
                        <div class="col">
                            <label for="" class="col-sm-12 col-form-label">Total Periods </label>
                            <input type="number" name="total" class="form-control" id="" placeholder="">

                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col">
                            <label for="" class="col-sm-12 col-form-label">Start Date</label>
                            <input name="start" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col">
                            <label for="" class="col-sm-12 col-form-label">Finish Date</label>
                            <input name="finish" type="text" class="form-control" placeholder="">

                        </div>
                    </div>
                    <input name="classname" value="<?php
                    echo $ClassName
                    ?>" type="hidden" class="form-control" placeholder="">

                    <button id="ButtonAdd" class="btn btn-primary col">Add Quarter</button>

                </form>


            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-12"></div>
            <div class="col-sm-12">
                <h4 class="text-center text-primary">Class Quarters</h4>
                <hr>
                <div class="col UI">
                    <p class="text-center">
                        <img src="../../Core/site/loading.gif" class="img img-fluid mx-auto" alt="">
                    </p>
                </div>

            </div>
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
        const NewQuarter = $("#NewQuarter");
        const UIX = $(".UIX");
        const UI = $(".UI");

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

        NewQuarter.submit((evt) => {
            evt.preventDefault();
            AddNewQuarter(UIX, NewQuarter);


        });


        LoadQuarters(UI);


    });
</script>
</body>
</html>
