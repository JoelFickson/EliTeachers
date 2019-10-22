<?php

use PHLAK\StrGen;

class Attendance
{


    public static function AddAttendance($ID, $StudentId, $Date, $Period)
    {

        $generator = new StrGen\Generator();
        $UID = $generator->length(24)->charset(StrGen\CharSet:: ALPHA_NUMERIC)->generate();

        $Check = "SELECT * FROM attendance WHERE student_id='$StudentId' AND q_uid='$ID' AND date='$Date' AND periods='$Period'";

        $Check = DSN::getInstance()->CRUD($Check);

        if ($Check->rowCount() > 0) {
            echo "DUPLICATE";
        } else {

            $PST = "INSERT INTO attendance(uid, student_id, periods, q_uid, date) 
            VALUES('$UID','$StudentId','$Period','$ID','$Date')";
            $RST = DSN::getInstance()->CRUD($PST);
            if ($RST->rowCount() > 0) {
                echo "SUCCESS";
            } else {
                echo "FAILED";
            }

        }


    }

    public static function GetAttendance($ClassID)
    {

        $PST = "SELECT count(attendance.periods) as total, students.student_id,attendance.uid, attendance.student_id, first_name,last_name,periods,date FROM attendance, 
        students WHERE attendance.student_id= students.student_id AND attendance.q_uid='$ClassID' AND attendance.periods!='AB' AND attendance.periods!='VC'
       GROUP by attendance.date, attendance.student_id ORDER BY attendance.date DESC";
        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {

            echo "<div class=\"table-responsive\">
                        <table class=\"table\">
                            <table class='table'>
                            
                            <thead>
    <tr>
      <th scope=\"col\">Student Name</th>
      <th scope=\"col\">Date</th>
      <th scope=\"col\">Total Periods Attended</th>
    
      <th scope=\"col\">Actions</th>
    </tr>
  </thead><tbody>
                             ";
            $RST->rowCount();
            foreach ($RST as $row) {

                $studentName = $row['first_name'] . " " . $row['last_name'];

                $Date = $row['date'];
                $uid = $row['uid'];
                $TotalPeriods = $row['total'];

                echo "
                <tr>
               
      <td>$studentName</td>
      <td>$Date</td>
      <td>$TotalPeriods</td>
      <td><a href='details.php?uid=$uid'>View More</a></td>
    </tr>
                ";


            }
            echo "</tbody></table></div>";
        } else {
            echo "<h5>There is no attendance data for this quarter yet.</h5>";
        }
    }

    public static function GetAttendanceDetails($ClassID)
    {
        $PST = "SELECT first_name, last_name,attendance.uid, students.student_id, attendance.periods,date 
                                FROM students, attendance
                                WHERE
                                attendance.student_id = students.student_id 
                                AND  attendance.uid='$ClassID'";

        $RST = DSN::getInstance()->CRUD($PST);
        if ($RST->rowCount() > 0) {

            echo "<div class=\"table-responsive\">
                        <table class=\"table\">
                            <table class='table'>
                            
                                                    <thead>
                            <tr>
                          
                              <th scope=\"col\">Student Name</th>
                               <th scope=\"col\">Period Attended/Missed</th>
                              <th scope=\"col\">Date</th>
                             
                             
                            </tr>
                          </thead><tbody>";
            $RST->rowCount();
            foreach ($RST as $row) {


                $studentName = $row['first_name'] . " " . $row['last_name'];
                $Date = $row['date'];
                $uid = $row['uid'];
                $TotalPeriods = $row['periods'];
                echo "
                <tr>
      <td>$studentName</td>
    
      <td>$TotalPeriods</td>
        <td>$Date</td>
   
    </tr>
                ";


            }
            echo "</tbody></table></div>";
        } else {
            echo "<h5>There is no attendance data for this quarter yet.</h5>";
        }
    }
}