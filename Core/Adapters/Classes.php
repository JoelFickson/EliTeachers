<?php

use PHLAK\StrGen;

class Classes
{

    public static function MyClasses($TeacherID)
    {
        $PST = "SELECT * FROM classes WHERE teacher_id='$TeacherID' ORDER BY  LAST_INSERT_ID() ASC ";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            echo "<div class='row'>";
            echo "<hr/>";
            foreach ($RST as $row) {
                $Name = $row['class_name'];
                $ID = $row['class_id'];
                $Year = $row['year'];
                $Level = $row['level'];

                $URL = DASHBOARD;
                echo "<div class='col-sm-3'><div class='col-sm-12 __JoelUICard'>
        <div class='col-sm-12'>
        <h4 class='text-center '><a href='{$URL}classes/view-class.php?id=$ID'>$Name</a></h4>
        <hr>
        <p class='text-center'>$Level - $Year
        <br>
        
        <a class='btn btn-sm btn-info' href='{$URL}classes/view-class.php?id=$ID'>View</a>
        </p>
        
</div></div>
</div>";

            }
            echo
            "</div>";
        } else {

            echo "<p class='text-center'>You do not have any classes(Quarters).</p>";
        }
    }

    public static function LoadClassInfo($ClassID)
    {
        $PST = "SELECT * FROM quarters WHERE  class_id='$ClassID'";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            $Status = "";
            $finish = "";
            echo "<div class='row col'>";
            foreach ($RST

                     as $row) {
                $Status = $row['status'];
                $ID = $row['q_uid'];
                $q_name = $row['q_name'];
                $level = $row['level'];
                $total_periods = $row['total_periods'];
                $start = $row['start'];
                $finish = $row['finish'];
                $periods_per_day = $row['periods_per_day'];

                echo "<div class='col-sm-3'>


                    <div class='col-sm-12 shaded'><h6 class='text-primary text-center'><a href='view-quarter.php?id=$ID'>$q_name</a></h6>
                    <p class='text-center text-primary'>Period : $start  - $finish</p>
                    <hr>
                    <div class='col-sm-12 row'><div class='col-sm-6'>
                        <h6 class='text-center'>PD : $periods_per_day</h6>
                    </div>
                   <div class='col-sm-6'>
                        <h6 class='text-center'>TP : $total_periods</h6>
                    </div> 
                    
                    

                    <hr>";
                ?>
                <?php
                if ($Status == "In Progress") {
                    echo "<div class='col-12'><p class='text-center'>Quarter In Progress Till : $finish</p>
                                    <p class='text-center'><a href='end-quarter.php?id=$ID'>End Class</a></p></div>";
                } else if ($Status == "PENDING") {
                    echo "<p class='text-center'>$Status</p>";
                } else {
                    echo "<p class='text-center'>$Status</p>";

                }
                ?>
                <?php echo "</div></div></div>";
            }


            echo "</div>";
            echo "
<div class='col-md-12 mx-auto'>
    <hr>
    <h4 class='text-info text-center'>Students In This Class:</h4>";
            self::LoadClassStudents($ClassID);
            echo "</div>";

        } else {
            echo "<p class='text-center'>This class has no quarters.</p>";
        }
    }

    public static function LoadClassStudents($ID)
    {
        $PST = "SELECT class.student_id,students.status, phone, email, first_name,last_name  FROM class,students WHERE class.class_id='$ID'";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            echo "
<div class='table-responsive'>
    <table class='table table-striped table-bordered'>
        <thead>
        <tr>
            <th scope=\"col\">StudentID</th>
            <th scope=\"col\">First Name</th>
            <th scope=\"col\">Last Name</th>
            <th scope=\"col\">Call</th>
            <th scope=\"col\">Email</th>
            <th scope=\"col\">Status</th>
            <th scope=\"col\">Transfer</th>
        </tr>
        </thead>
        <tbody>";
            foreach ($RST as $row) {
                echo "";
                $StudentID = $row['student_id'];
                $phone = $row['phone'];
                $email = $row['email'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $Status = $row['status'];


                echo "
        <tr>
            <td>$StudentID</td>
            <td>$first_name</td>
            <td>$last_name</td>
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
            <td class='text-center'><a href='transfer.php?id=$StudentID'><i class=\"fas
                                                                             fa-external-link-square-alt\"></i></a></td>
        </tr>
        ";
            }
            echo "
    </table>
</div>";
        } else {
            echo "<h5 class='text-center text-danger'>There are no students in this class.</h5>";
        }

    }

    public static function LoadQuarterStudents($ID)
    {
        $PST = "SELECT students.student_id  ,quarters.status, phone, email, first_name,last_name 
            FROM class,quarters,students,attendance WHERE attendance.q_uid=quarters.q_uid and attendance.q_uid='$ID' GROUP BY  students.student_id";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            echo "
<div class='table-responsive'>
    <table class='table table-striped table-bordered'>
        <thead>
        <tr>
            <th scope=\"col\">StudentID</th>
            <th scope=\"col\">First Name</th>
            <th scope=\"col\">Last Name</th>
            <th scope=\"col\">Call</th>
            <th scope=\"col\">Email</th>
            <th scope=\"col\">Status</th>
            <th scope=\"col\">Transfer</th>
        </tr>
        </thead>
        <tbody>";
            foreach ($RST as $row) {
                echo "";
                $StudentID = $row['student_id'];
                $phone = $row['phone'];
                $email = $row['email'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $Status = $row['status'];


                echo "
        <tr>
            <td>$StudentID</td>
            <td>$first_name</td>
            <td>$last_name</td>
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
            echo "<h5 class='text-center text-danger'>There are no students in this quarter yet.</h5>";
        }

    }

    public static function CreateNewClass($quarter, $Level, $year, $StartDate, $Finish)
    {

        $iD = $_SESSION['eliTeacherID'];
        $generator = new StrGen\Generator();

        $UID = $generator->length(12)->charset(StrGen\CharSet::ALPHA_NUMERIC)->generate();

        $PST = "INSERT INTO quarters(q_uid, q_name, level, total_periods, start, finish, status,teacher_id, periods_per_day)
VALUES ('$UID','$Level$quarter$year','12','$StartDate','$Finish','IN PROGRESS','T_D','$iD','3333')
";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            echo "<h5 class='text-center'>Class was created successfully</h5>";
        } else {
            echo 'There was an error creating this class';
        }

    }

    public static function NewClass($Level, $year)
    {
        $ID = $_SESSION['eliTeacherID'];
        $generator = new StrGen\Generator();
        $UID = $generator->length(12)->charset(StrGen\CharSet::ALPHA_NUMERIC)->generate();


        $Func = "SELECT * FROM classes WHERE class_name='$Level$year' AND teacher_id='$ID'";
        $Func = DSN::getInstance()->CRUD($Func);
        if ($Func->rowCount() > 0) {
            echo "<h5 class='text-center text-danger animated fadeIn'>Class $Level$year already exists.</h5>";

        } else {
            $PST = "INSERT INTO classes(class_id, teacher_id, class_name, year, level)
VALUES ('$UID','$ID','$Level$year','$year','$Level')";
            $RST = DSN::getInstance()->CRUD($PST);
            if ($RST->rowCount() > 0) {
                echo "<h5 class='text-center text-primary animated fadeIn'>Class was created successfully</h5>";
            } else {
                echo "<h5 class='text-center text-primary animated fadeIn'>There was a system error creating this class.</h5>";

            }
        }


    }

    public static function CreateNewQuarter($ClassID, $classname, $Quarter, $Daily, $Total, $Start, $Status, $Finish)
    {
        $ID = htmlentities($_SESSION['eliTeacherID'], ENT_QUOTES, "UTF-8");
        $QName = $classname . "Q" . $Quarter;
        $generator = new StrGen\Generator();

        $Check = "SELECT * FROM quarters WHERE class_id='$ClassID' AND q_name='$QName'";
        $Check = DSN::getInstance()->CRUD($Check);
        if ($Check->rowCount() > 0) {
            echo "EXISTS";
        } else {


            $UID = $generator->length(12)->charset(StrGen\CharSet:: ALPHA_NUMERIC)->generate();
            $PST = "INSERT INTO quarters(q_uid, q_name, total_periods, start, finish, status, teacher_id, periods_per_day,class_id)
                VALUES ('$UID','$QName','$Total','$Start','$Finish','$Status','$ID','$Daily','$ClassID')";

            $RST = DSN::getInstance()->CRUD($PST);
            if ($RST->rowCount() > 0) {
                echo "SUCCESS";
            } else {
                echo "FAILED";

            }
        }

    }

    public static function LoadQuarters($ClassID)
    {
        $PST = "SELECT * FROM quarters WHERE class_id='$ClassID'";

        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            echo "
<div class='row'>";
            foreach ($RST as $item) {
                $QName = $item['q_name'];
                $ID = $item['q_uid'];
                echo "
    <div class='col-sm-6 '>
        <div class='col-md-12 ___CardUI'>
            <h6 class='text-center'> $QName</h6>
            <p class='text-center'><a href='view-quarter.php?id=$ID' class='btn btn-primary'>View Info</a></p>
        </div>
    </div>
    ";
            }
            echo "
</div>";
        } else {
            echo "<h5>This class has no quarters. Quarters will appear here when you add them.</h5>";
        }
    }

    public static function LoadQuarterInfo($ClassID)
    {
        $PST = "SELECT * FROM quarters WHERE q_uid='$ClassID'";

        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            echo "
<div class='row'>";
            foreach ($RST as $item) {
                $QName = $item['q_name'];
                $ID = $item['q_uid'];
                $start = $item['start'];
                $finish = $item['finish'];
                $status = $item['status'];
                $pd = $item['periods_per_day'];
                $td = $item['total_periods'];
                echo "
    <div class='col-sm-12 card'>
        <div class='card-body'>
            <h5 class='text-center'>$QName</h5>
         <p class='text-center text-primary'>Period : $start - $finish</p>
         <p class='text-center'>$status</p>
         <p class='text-center text-primary'>PD : $pd  | TD : $td</p>
        </div>
    </div>
    ";
            }
            echo "
</div>";
        } else {
            echo "<h5>This class has no quarters. Quarters will appear here when you add them.</h5>";
        }

    }

    public static function LoadClassQuarters($ClassID)
    {


        $PST = "SELECT * FROM quarters WHERE class_id='$ClassID'";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {
            foreach ($RST as $row) {
                $QuarterID = $row['q_uid'];
                $QuarterName = $row['q_name'];

                echo "<option value='$QuarterID'>$QuarterName</option>";
            }
        } else {
            echo "<option disabled selected>No Quarters Found</option>";
        }
    }

    public static function LoadAllMyQuarters()
    {
        $ID = htmlentities($_SESSION['eliTeacherID'], ENT_QUOTES, "UTF-8");


        $limit = 30;
        $PST = "SELECT * FROM quarters WHERE teacher_id='$ID' ORDER BY LAST_INSERT_ID()";


        $RST = DSN::getInstance()->CRUD($PST);
        $TotalResults = $RST->rowCount();

        $TotalPages = ceil($TotalResults / $limit);
        $page = 1;
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $starting_limit = ($page - 1) * $limit;


        $PreparedStatement = "SELECT * FROM quarters WHERE teacher_id='$ID'  LIMIT $starting_limit, $limit ";


        $ResultSet = DSN::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {

            ?>


            <?php

            foreach ($ResultSet as $feed) {


                $QUID = $feed['q_uid'];
                $Name = $feed['q_name'];
                $Started = $feed['start'];
                $finish = $feed['finish'];

                echo "<div class='col-sm-3'><div class='col-sm-12 __JoelUICard'>
                            <h5 class='text-center'>$Name</h5>
                            <hr>
                           <p class='text-center'> $Started - $finish
                           <br>
                           
                           <a href='add.php'>Add</a> | <a href='view.php'>View</a></p>
                            
                          




                      </div></div>";


                $URL = URL_ROOT;


            }


        } else {
            echo "<h5 class='text-danger text-center'>You do not have any quarters.</h5>";
        }


    }
}