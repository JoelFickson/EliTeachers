function getURLParameters(url, name) {
    return (RegExp(name + '=' + '(.+?)(&|$)').exec(url) || [, null])[1];
}

function LoadStudentProfile(UI) {
    const Data = $(location).attr("href");
    let ID = getURLParameters(Data, 'id');

    UI.empty().append("Hello");
    $.post(`../../Core/Bridges/StudentRouter.php?action=LoadStudentProfile&id=${ID}`, (data, status) => {

        if (status === "success") {
            UI.empty().append(data);
        } else {
            UI.empty().append("There was an error communicating with the server");
        }
    });

}

function LoadMyStudents() {


    const ClassesUI = $(".StudentsUI");

    $.get(`../../Core/Bridges/StudentRouter.php?action=MyStudents`, (data, status) => {


        if (status === "success") {
            ClassesUI.empty().append(data);
        } else {
            ClassesUI.empty().append("<p>Class information not found</p>");
        }

    });
}

function AddAttendance(ID, StudentID) {
    const UI = $(".AttendanceUI");
    const FormAddAttendance = $("#Attendance")
    $.post(`../../Core/Bridges/StudentRouter.php?action=AddAttendance&id=${ID}&std=${StudentID}`, FormAddAttendance.serialize(), (data, status) => {

        console.log(data);

        if (status === "success") {
            switch (data) {
                case "SUCCESS":
                    UI.empty().append("<h5 class='text-success'>Attendance added successfully</h5>");
                    break;
                case "DUPLICATE":
                    UI.empty().append("<h5 class='text-center text-danger'>There is an attendance record already added for this date, student, period, and quarter</h5>");
                    break;
                case "FAILED":
                    UI.empty().append("There is an attendance record already added for this date, student and quarter.");
                    break;

            }
        } else {
            UI.empty().append("There was an error communicating with the server");
        }
    });

}

//Enrolling a student into a specific quarter
function EnrollStudent(UI,ID, ClassID) {

    const FormAddAttendance = $("#EnrollmentForm")
    $.post(`../../Core/Bridges/StudentRouter.php?action=Enroll&id=${ID}&cls=${ClassID}`, FormAddAttendance.serialize(), (data, status) => {

        console.log(data);


        if (status === "success") {
            switch (data) {
                case "SUCCESS":
                    UI.empty().append("<h5 class='text-success'>Attendance added successfully</h5>");
                    break;
                case "DUPLICATE":
                    UI.empty().append("<h5 class='text-center text-danger'>There is an attendance record already added for this date, student and quarter</h5>");
                    break;
                case "FAILED":
                    UI.empty().append("There is an attendance record already added for this date, student and quarter.");
                    break;

            }
        } else {
            UI.empty().append("There was an error communicating with the server");
        }
    });
}

function LoadAllClassQuarters(ClassID) {

    const UI = $("#MyUI");
    UI.empty().append("Hello");
    $.get(`../../Core/Bridges/ClassesRouter.php?action=loadQuarters&id=${ClassID}`, (data, status) => {



        if (status === "success") {
            UI.empty().append(data);
        } else {
            UI.empty().append("There was an error communicating with the server");
        }
    });


}