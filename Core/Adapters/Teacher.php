<?php


use PHPMailer\PHPMailer\PHPMailer;

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
                    $_SESSION['eliTeacherEmail'] = $Email;
                    $_SESSION['eliTeacherFName'] = $row['f_name'];
                    $_SESSION['eliTeacherLName'] = $row['l_name'];
                    $_SESSION['eliTeacherID'] = $row['teacher_id'];
                    header("location:dashboard/");

                } else {
                    echo "<p class='text-danger text-center'>Email/Password combination error.</p>";
                }
            }

        } else {
            echo "<p class='text-center text-danger'>Details provided do not match any account in our database.</p>";
        }
    }

    public static function LoadProfilePicture($TeacherID)
    {
        $PST = "SELECT picture FROM teachers WHERE teacher_id='$TeacherID'";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            foreach ($RST as $row) {
                $Pic = $row['picture'];

                echo "<img src='../../public/profiles/$Pic' class='img img-fluid d-block mx-auto'/>";

            }

        } else {
            echo "<p class='text-center text-danger'>The system cannot fetch any data right now.</p>";
        }

        echo "<div class='row'>
            <div class='col-md-6'><br><p class='text-center'><a href='change_picture' class='btn btn-primary'>Change Picture</a></p>

            </div> <div class='col-md-6'><br><p class='text-center'><a href='change_password.php' class='btn btn-danger'>Change Password</a></p>

            </div>
            </div>";

    }

    public static function ChangePassword($PassTwo)
    {
        $ID = htmlentities($_SESSION['eliTeacherID'], ENT_QUOTES, "UTF-8");

        $EncryptedPassword = password_hash($PassTwo, PASSWORD_BCRYPT);
        $Email = htmlentities($_SESSION['eliTeacherEmail'], ENT_QUOTES, "UTF-8");
        $PST = "UPDATE teachers SET password='$EncryptedPassword' WHERE teacher_id='$ID'";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {

            $mail = new PHPMailer(true);

            try {

                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;


                $mail->setFrom('no-reply@eli.edu', 'No-Reply');
                $mail->addAddress($Email);
                $mail->addReplyTo('support@eli.edu', 'Support');


                $mail->isHTML(true);
                $mail->Subject = "Password Updated";
                $mail->Body = "This an auto-generated email letting you know that, an account password on ELI Teachers Dashboard was changed.";
                $mail->Body .= "If this was not you please contact support : support@eli.edu.";
                $mail->AltBody = "This an auto-generated email letting you know that, an account password on ELI Teachers Dashboard was changed.";
                $mail->AltBody .= "If this was not you please contact support : support@eli.edu.";

                if ($mail->send()) {
                    echo "<p class='text-success text-center'>Password was changed successfully.</p>";
                    echo "<meta http-equiv='refresh' content='10' >";
                    echo "<p class='text-center text-danger'>You will be logged out in 10 seconds..</p>";

                    session_destroy();


                    Session::delete("eliTeacherEmail");
                    Session::delete("eliTeacherFName");
                    Session::delete("eliTeacherLName");
                    Session::delete("eliTeacherID");

                    SessionRouter::Redirect(URL_ROOT);


                } else {
                    echo "<p class='text-danger text-center'>There was an error sending a confirmation to your email. Password was changed.</p>";
                    session_destroy();


                    Session::delete("eliTeacherEmail");
                    Session::delete("eliTeacherFName");
                    Session::delete("eliTeacherLName");
                    Session::delete("eliTeacherID");

                    SessionRouter::Redirect(URL_ROOT);

                }

            } catch (Exception $e) {
                echo "<p class='text-danger text-center'>There was an error sending a confirmation to your email. Password was changed.</p>";
                session_destroy();


                Session::delete("eliTeacherEmail");
                Session::delete("eliTeacherFName");
                Session::delete("eliTeacherLName");
                Session::delete("eliTeacherID");

                SessionRouter::Redirect(URL_ROOT);
            }

        } else {
            echo "<p class='text-danger text-center'>There was an error updating your password.</p>";
        }
    }
}