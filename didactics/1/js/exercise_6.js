var movements = 0;

function moveLeft(number) {
    movements++;
    if (movements > 2)
        addTry();

    $('#equation-data').fadeOut("slow", function () {
        if (number == 40) {
            if ($('#right-side-0').text() == "-10") {
                $('#left-side').text("10");
                $('#right-side-0').text("");
            }
        } else if (number == 30) {
            if ($('#right-side-0').text() == "30") {
                $('#left-side').text(parseInt($('#left-side').text()) - 30);
                $('#right-side-0').text("");
                $('#30-controller').fadeOut("slow", function () {
                    $('#40-controller').addClass("col-xs-offset-2");
                });
                $('#40-controller > h1').text("10");
            } else if ($('#right-side-0').text() == "-10")
                $('#left-side').text("10");
        } else if (number == 5) {
            if ($('#left-side').text() == "10") {
                $('#left-side').text("10/5");
                $('#right-side-1').text("")
            }
        }

        $('#equation-data').fadeIn();
    })
}

function moveRight(number) {
    movements++;
    if (movements > 2)
        addTry();

    $('#equation-data').fadeOut("slow", function () {
        if (number == 40) {
            if ($('#left-side').text() == "40") {
                $('#right-side-0').text(parseInt($('#right-side-0').text()) - 40);
                $('#left-side').text("0");
                $('#30-controller').fadeOut("slow", function () {
                    $('#40-controller').addClass("col-xs-offset-2");
                });
                $('#40-controller > h1').text("10");
            } else if ($('#left-side').text() == "10") {
                $('#right-side-0').text("-10");
                $('#left-side').text("0");
            }
        }

        $('#equation-data').fadeIn();
    })
}

function checkAnswer() {
    if ($('#left-side').text() == "10/5") $('#next-exercise').modal();
    else toastr.error("¡Respuesta incorrecta!");
}

function reset() {
    $("#left-side").text("40");
    $("#right-side-0").text("30");
    $("#right-side-1").text("+5");
    $('#40-controller').removeClass("col-xs-offset-2");
    $("#30-controller").fadeIn("slow", function () {
        $("#40-controller > h1").text("40");
    });
}

function changeInput(number) {
    $("#additional-input-" + number).val($('#datetime').val());
}

$(document).ready(function () {
    $(function () {
        $('#datetime').datepicker({
            format: 'dd/mm/yyyy'
        });
    });
});