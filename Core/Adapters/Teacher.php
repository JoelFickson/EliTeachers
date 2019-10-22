<?php


class Teacher
{

    public static function Login($Email, $Pass)
    {
        $PST = "SELECT * FROM teachers WHERE email='$Email'";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {

            foreach ($RST as $row) {

                $Password = $row['password'];

                if (password_verify($Pass, $Password)) {
                    session_start();
                    $_SESSION['email'] = $Email;
                    $_SESSION['eliTeacherFName'] = $row['f_name'];
                    $_SESSION['eliTeacherLName'] = $row['l_name'];
                    $_SESSION['eliTeacherID'] = $row['teacher_id'];
                    header("location:dashboard/");

                } else {
                    echo "<p>Email/Password combination error.</p>";
                }
            }

        } else {
            echo "<p>Details provided do not match any account in our database.</p>";
        }
    }
}