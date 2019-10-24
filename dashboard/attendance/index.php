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
    <p>Select class and quarter to add attendance</p>
    <hr>
    <div class="container">
        <div class="col-sm-10 mx-auto">
            <div class="row">

                <?php

                $ID = $_SESSION['eliTeacherID'];

                $PST = "SELECT * FROM classes WHERE teacher_id='$ID'";
                $RST = DSN::getInstance()->CRUD($PST);
                if ($RST->rowCount() > 0) {
                    echo "<div class='row'>";
                    echo "<hr/>";
                    foreach ($RST as $row) {
                        $Name = $row['class_name'];
                        $ID = $row['class_id'];

                        echo "<div class='col-sm-4'><div class='col-sm-12 __JoelUICard'  id=''>
                            <h4 class='text-center'><a href='view-class.php?id=$ID'>$Name</a></h4>
                               <p>Click the class name to see quarters and details.</p>

                            </div></div>";

                    }
                    echo
                    "</div>";
                } else {

                    echo "<p class='text-center'>You do not have any classes(Quarters).</p>";
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

</script>
</body>
</html>
