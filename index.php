<?php

require_once "vendor/autoload.php";

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
                        <input name="email_add" required class="form-control form-control-lg" placeholder="Email Address"
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
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>