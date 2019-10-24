<?php

require_once "vendor/autoload.php";
require_once "Core/Util/Constants.php";

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <link rel="stylesheet" type="text/css" href="Core/UX/et.css"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>ELI Teachers Portal | Login</title>
    <link href="<?php echo URL_ROOT ?>/public/assets/logo.png" rel="icon" type="image/png"/>
    <style>
        body, html {
            height: 100%;

        }

        #LoginBody {

            background-image: linear-gradient(to left bottom, #4f5dd1, #7676d7, #9690dd, #b2ace3, #cdc8e8, #d6cbe0, #d9cfda, #d8d5d7, #c8c2c4, #b9b0b0, #a99e9b, #978d86) !important;
        }

    </style>
</head>
<body id="LoginBody">
<div class="container-fluid h-100" id="">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-sm-4 mx-auto">
            <div class="col __JoelUICard" id="">
                <h4 class="text-center"> ELI Teachers</h4>
                <img src="public/assets/logo.png" class="img img-fluid d-block logo mx-auto" alt="">
                <hr>
                <?php
                if (isset($_POST['Login'])) {
                    $Email = htmlentities($_POST['email_add'], ENT_QUOTES, "UTF-8");
                    $Pass = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

                    Teacher::Login($Email, $Pass);


                }
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <input name="email_add" required class="form-control form-control-lg"
                               placeholder="Email Address"
                               type="text">
                    </div>
                    <div class="form-group">
                        <input name="password" required class="form-control form-control-lg" placeholder="Password"
                               type="password">
                    </div>
                    <div class="form-group">
                        <button name="Login" class="btn btn-info btn-lg btn-block">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <br>
                <p class="text-center">
                    <?
                    echo date("Y") . " English Language Institute, San Francisco";

                    ?> | All Rights Reserved. <br>
                    Developed by <a href="https://www.linkedin.com/in/jfngozo" target="_blank">Joel Fickson
                        Ngozo</a>
                </p>
            </div>
        </div>
    </div>
</div>


<?php
require_once "Core/Partials/TeachersFooterInclude.php";

?>

</body>
</html>