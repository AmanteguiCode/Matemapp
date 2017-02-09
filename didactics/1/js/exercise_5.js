function wrongAnswer(number) {
    addTry();
    switch (number) {
        case 1:
            $("#wrong-1").modal();
            break;
        case 2:
            $("#wrong-2").modal();
            break;
    }
}

function rightAnswer(number) {
    switch (number) {
        case 1:
            $("#question-1").fadeOut("slow", function () {
                $("#question-2").fadeIn();
            });
            break;
        case 2:
            $("#question-2").fadeOut();
            break;
    }
}

function reset(){
    $("#question-2").fadeOut("slow", function () {
        $("#question-1").show();
    });
}


$(document).ready(function () {
    $(".sprite-number").addClass("img-responsive");
})
