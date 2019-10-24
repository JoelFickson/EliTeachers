<?php
date_default_timezone_set('America/Los_Angeles');

class Greetings
{
    public static function GreetUser()
    {

        $time = date("H");

        $timezone = date("e");

        if ($time < "12") {
        
            echo "<h3 class='text-center'>Good morning.... " . $_SESSION['eliTeacherFName'] . "</h3>";
            echo "<p class='text-center'>...Have a greaaattt day!!. What would you like to do ?.</p>";
        } else {
            if ($time >= "12" && $time < "17") {

                echo "<h3 class='text-center'>Good afternoon.... " . $_SESSION['eliTeacherFName'] . "</h3>";
                echo "<p class='text-center'>...Choose from the menu or below to do something...</p>";
            } else {

                if ($time >= "17" && $time < "19") {

                    echo "<h3 class='text-center'>Good evening.... " . $_SESSION['eliTeacherFName'] . "</h3>";
                    echo "<p class='text-center'>...Select what you would like to do below...</p>";
                } else

                    if ($time >= "19") {
                        echo "<h3 class='text-center'>It is getting  late.... " . $_SESSION['eliTeacherFName'] . "</h3>";
                        echo "<p class='text-center'>...Still, pick up an option below to do something</p>";
                    }
            }
        }
    }

}