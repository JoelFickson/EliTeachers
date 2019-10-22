function LoadLatestClasses(UI) {

    $.get("../Core/Bridges/ClassesRouter.php?action=LoadLatestClasses", (data, status) => {

        if (status === "success") {
            UI.empty().append(data);
        } else {
            UI.empty().append("<p>Sorry, failed to load classes</p>");
        }

    });

}

function LoadMyClasses(UI) {

    $.get("../../Core/Bridges/ClassesRouter.php?action=LoadLatestClasses", (data, status) => {

        if (status === "success") {
            UI.empty().append(data);
        } else {
            UI.empty().append("<p>Sorry, failed to load classes</p>");
        }

    });

}

function AddNewClass(UIX, Form) {
    const AddClass = $("#AddClass");

    const ButtonAdd = $("#ButtonAdd");
    ButtonAdd.empty().append("Please Wait...");
    $.post(`../../Core/Bridges/ClassesRouter.php?action=NewClass`, AddClass.serialize(), (data, status) => {

        if (status === "success") {
            UIX.empty().append(data);
            ButtonAdd.empty().append("Add Class");

        } else {
            UIX.empty().append("There was an error connecting to database server.")
        }
    });
}

function AddNewQuarter(UIX, Form) {
    const Data = $(location).attr("href");
    let ID = getURLParameters(Data, 'id');
    const NewQuarter = $("#NewQuarter");
    const UI = $(".UI");
    $.post(`../../Core/Bridges/ClassesRouter.php?action=NewQuarter&id=${ID}`, NewQuarter.serialize(), (data, status) => {

        console.log(data);
        if (status === "success") {

            if (data === "SUCCESS") {
                LoadQuarters(UI);
                UIX.empty().append("<h5 class='text-center text-primary'>Quarter was added successfully to your class</h5>");
            } else if (data === "EXISTS") {
                UIX.empty().append("<h5 class='text-center text-warning'>This quarter already exists.</h5>");
            } else {
                UIX.empty().append("<h5 class='text-center text-warning'>There was an error adding this quarter.</h5>");

            }


        } else {
            UIX.empty().append("There was an error connecting to database server.")
        }
    });
}

function LoadAllClasses(UI) {

    $.get("../Bridges/ClassesRouter.php?action=LoadAllClasses", (data, status) => {

        if (status === "success") {
            UI.empty().append(data);
        } else {
            UI.empty().append("<p>Sorry, failed to load classes</p>");
        }

    });

}

function getURLParameters(url, name) {
    return (RegExp(name + '=' + '(.+?)(&|$)').exec(url) || [, null])[1];
}

function LoadClassInfo(UI) {

    const Data = $(location).attr("href");
    let ID = getURLParameters(Data, 'id');

    $.get(`../../Core/Bridges/ClassesRouter.php?action=LoadClassInfo&id=${ID}`, (data, status) => {

        if (status === "success") {
            UI.empty().append(data);
        } else {
            UI.empty().append("<p>Class information not found</p>");
        }

    });
}



function LoadQuarters(UI) {
    const Data = $(location).attr("href");
    let ID = getURLParameters(Data, 'id');

    $.get(`../../Core/Bridges/ClassesRouter.php?action=LoadQuarters&id=${ID}`, (data, status) => {

        if (status === "success") {
            UI.empty().append(data);
        } else {
            UI.empty().append("<p>Class information not found</p>");
        }

    });
}

function LoadQuarterInfo(UI) {

    const Data = $(location).attr("href");
    let ID = getURLParameters(Data, 'id');

    $.get(`../../Core/Bridges/ClassesRouter.php?action=LoadQuarterInfo&id=${ID}`, (data, status) => {

        if (status === "success") {
            UI.empty().append(data);
        } else {
            UI.empty().append("<p>Class information not found</p>");
        }

    });
}

function LoadQuarterStudents(UI) {

    const Data = $(location).attr("href");
    let ID = getURLParameters(Data, 'id');

    console.log(ID);
    $.get(`../../Core/Bridges/ClassesRouter.php?action=LoadQuarterStudents&id=${ID}`, (data, status) => {

        if (status === "success") {
            UI.empty().append(data);
        } else {
            UI.empty().append("<p>Class information not found</p>");
        }

    });
}