<?php

/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 3/5/2019
 * Time: 1:11 PM
 */
class Students
{


    public static function LoadStudentProfile($ID)
    {
        $Update = "UPDATE class SET status='ACTIVE' WHERE student_id='$ID'";
        $Update = DSN::getInstance()->CRUD($Update);
        if ($Update->rowCount() > 0) {
            $PST = "SELECT * FROM students WHERE student_id='$ID'";
            $RST = DSN::getInstance()->CRUD($PST);
            if ($RST->rowCount() > 0) {

                foreach ($RST as $row) {
                    $fistname = $row['first_name'];
                    $lastname = $row['last_name'];
                    $picture = $row['profile'];

                    echo "<div class='col-md-6 mx-auto'>";
                    echo "<h5>$fistname $lastname</h5>";
                    echo "<img class='img img-fluid' src='../../../e/images/profiles/$picture'/>";

                    echo "</div>";
                }

            } else {
                echo "<h5>This student profile was not found!</h5>";
            }
        } else {
            echo "<h6 class='text-center text-warning'>This student was already confirmed.</h6>";
        }

    }

    public static function LoadMyStudents()
    {
        $iD = $_SESSION['eliTeacherID'];
        $PST = "SELECT * FROM class,classes,students WHERE class.class_id=classes.class_id
                AND classes.teacher_id='$iD' GROUP BY class.class_id";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            echo "
<div class='table-responsive'>
    <table class='table table-striped table-bordered'>
        <thead>
        <tr>
            <th scope=\"col\">StudentID</th>
            <th scope=\"col\">Full Name</th>
            <th scope=\"col\">Class</th>
     
            <th scope=\"col\">Phone</th>
            <th scope=\"col\">Email</th>
            <th scope=\"col\">Status</th>
            <th scope=\"col\">Transfer</th>
        </tr>
        </thead>
        <tbody>";
            foreach ($RST as $row) {

                $StudentID = $row['student_id'];
                $phone = $row['phone'];
                $email = $row['email'];
                $Class = $row['class_name'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $Status = $row['status'];


                echo "
        <tr>
            <td>$StudentID</td>
            <td>$first_name $last_name</td>

            <td>$Class</td>
            <td><a href='tel:$phone'>$phone</a></td>
            <td><a href='mailto:$email'>$email</a></td>
            <td class='text-center'>";
                if ($Status == "PENDING") {
                    echo $Status . " <a href='confirm.php?id=$StudentID'><i class=\"fas fa-check\"></i></a>";
                } else {
                    echo 'Active';
                }
                echo "
            </td>
            <td class='text-center'><a href='transfer.php?id=$$StudentID'><i class=\"fas
                                                                             fa-external-link-square-alt\"></i></a></td>
        </tr>
        ";
            }
            echo "
    </table>
</div>";
        } else {
            echo "<h4>You do not have students in any of your classes/quarters!!</h4>";
        }
    }

    public static function PendingStudents()
    {
        $iD = $_SESSION['eliTeacherID'];

        $PST = "SELECT *    FROM class WHERE class.status='PENDING' 
                                            ";
        $RST = DSN::getInstance()->CRUD($PST);


        if ($RST->rowCount() > 0) {
            echo "<p>Click on the links below to add them to a class quarter</p>";
            foreach ($RST as $row) {

                $StudentID = $row['student_id'];
//                $FullName = $row['first_name'] . ' ' . $row['last_name'];
                $class_id = $row['class_id'];



                echo "<p><a href='?id=$StudentID&cls=$class_id' class='StudentLink'>$StudentID</a></p>";


            }
        } else {
            echo "<p class='text-center'>There are no students in pending status.</p>";
        }
    }

    public static function Enroll($StdID, $QId)
    {
        echo $PST = "UPDATE class SET status='ACTIVE' AND q_id='$QId' WHERE student_id='$StdID'";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            echo "<h5 class='text-center'>Successfully enrolled student in this class</h5>";
        } else {
            echo "<h5 class='text-center'>There was an error  enrolling  this student.</h5>";

        }

    }
}