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
    <h4 class="">Profile Management | Change Profile Picture </h4>
    <a href="index.php">Back</a>
    <hr>
    <div class="container">
        <div class="col-sm-6 mx-auto">
            <div class="col-sm-12 ___CardUI">

                <h5 class="text-center">Update Your Picture Below</h5>
                <p>This picture will be visible to your students in their dashboard.</p>

                <?php
                if (isset($_POST['chane_picture'])) {
                    $image = new Bulletproof\Image($_FILES);
                    $image->setSize(1024, 1572864);
                    $Dir = "../../public/profiles/";
                    $image->setLocation($Dir);
                    $image->setMime(array('jpeg', 'png', 'jpg'));

                    if ($image["picture"]) {
                        $upload = $image->upload();

                        if ($upload) {

                            $FullPicture = $image->getName() . '.' . $image->getMime();

                            $PST = "UPDATE teachers SET picture='$FullPicture' WHERE teacher_id='$TeacherID'";

                            $RST = DSN::getInstance()->CRUD($PST);

                            if ($RST->rowCount() > 0) {
                                $_SESSION['PIC'] = $FullPicture;
                                echo "<h5 class='text-success text-center'>Profile picture updated successfully!</h5>";
                                header("refresh:5;url:index.php");

                            } else {
                                echo "<h5 class='text-center text-danger'>There was an error updating your profile picture</h5>";
                            }
                        } else {
                            echo "<h5 class='text-center text-danger'>" . $image->getError() . "</h5>";

                        }
                    }
                }


                ?>
                <hr>
                <br>


                <form method="post" enctype="multipart/form-data" class="forms-sample"
                      data-parsley-validate>
                    <div class="form-group">
                        <label for="" class="">Choose Picture</label>
                        <input name="picture" required class="form-control form-control-lg"
                               placeholder=""
                               type="file">
                    </div>

                    <div class="form-group">
                        <button name="chane_picture" class="btn btn-success btn-lg btn-block">Update Picture</button>
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
