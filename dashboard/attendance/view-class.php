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
    <h5>Add Attendance </h5>
    <p>Select quarter to add or view attendance</p>
    <a href="" id="backLink">Back</a>
    <hr>
    <div class="container">
        <div class="col-sm-10 mx-auto">
            <div class="col-sm-12">

                <?php


                $ClassID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");


                $PST = "SELECT * FROM quarters WHERE class_id='$ClassID'";

                $RST = DSN::getInstance()->CRUD($PST);
                if ($RST->rowCount() > 0) {
                    echo "
                            <div class='row'>";
                    foreach ($RST as $item) {
                        $QName = $item['q_name'];
                        $ID = $item['q_uid'];
                        echo "
                                <div class='col-sm-4'>
                                    <div class='__JoelUICard col-sm-12' id=''>
                                        <h5 class='text-center'> $QName</h5><hr>
                                        <p class='text-center'><a href='view-students.php?id=$ID' class=''>Add </a> | 
                                        <a href='view-attendance.php?id=$ID'>View</a>
                                        </p>
                                    </div>
                                </div>
                                ";
                    }
                    echo "
                            </div>";
                } else {
                    echo "<h5>This class has no quarters. Quarters will appear here when you add them.</h5>";
                }


                ?>


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
        $('#backLink').click(function () {
            parent.history.back();
            return false;
        });
    })
</script>
</body>
</html>
