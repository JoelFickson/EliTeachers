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
    <title>Classes | Home</title>
    <?php require_once "../../Core/Partials/TeacherHeaderInclude.php"; ?>
</head>
<body>
<?php

require_once "../../Core/Partials/MainNav.php"; ?>

<div class="container">
    <br>
    <br>
    <h4 class="">Profile Management | Change Password </h4>
    <a href="index.php">Back</a>
    <hr>
    <div class="container">
        <div class="col-sm-6 mx-auto">
            <div class="col-sm-12 ___CardUI">

                <h5 class="text-center">Update Your Password Below</h5>
                <p>You will be logged out automatically when you change your password.</p>

                <?php
                if (isset($_POST['change_password'])) {
                    $PassOne = htmlentities($_POST['pass'], ENT_QUOTES, "UTF-8");
                    $PassTwo = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

                    if ($PassOne != $PassTwo) {
                        echo "<p class='text-danger'>Passwords do not match!</p>";
                    } else {
                        Teacher::ChangePassword($PassTwo);
                    }
                }


                ?>
                <hr>
                <br>

                <form action="" method="post">
                    <div class="form-group">
                        <input name="pass" required class="form-control form-control-lg"
                               placeholder="New Password"
                               type="password">
                    </div>
                    <div class="form-group">
                        <input name="password" required class="form-control form-control-lg"
                               placeholder="Confirm Password"
                               type="password">
                    </div>
                    <div class="form-group">
                        <button name="change_password" class="btn btn-primary btn-lg btn-block">Update Password</button>
                    </div>
                </form>
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


    });
</script>
</body>
</html>
