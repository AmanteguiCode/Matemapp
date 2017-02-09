var json;

function refresh() {
    $.ajax("../ajax/refresh.php", {method: "post", dataType: "json", data: {id: id}})
        .done(function (data) {
            console.log("Datos recibidos, mostrando...");
            console.log(data);
            json = data;
            update();
            setTimeout(refresh, 1000);
        })
        .fail(function (jqxhr, textStatus, error) {
            console.log("Fallo: " + textStatus + " -- " + error);
            console.log(jqxhr);
        });
}
function update() {
    function applyDataOfPlayer(playerNumber, playerName) {
        $('#searching-player' + playerNumber).fadeOut("slow", function () {
            $('#player' + playerNumber + '-container').fadeIn();
            $('#player' + playerNumber + '-name').text(playerName);
        });
    }

    function resetDataOfPlayer(playerNumber) {
        if (playerNumber == whichPlayerAmI)
            window.location = "../play/play.php";
        $('#player' + playerNumber + '-container').fadeOut("slow", function () {
            $('#searching-player' + playerNumber).fadeIn();
            if ($('#player' + playerNumber + '-name').text().length != 0)
                $('#exit-player' + playerNumber).modal();
            $('#player' + playerNumber + '-name').text("");
        });
    }


    function disabledAnswers(number, answer) {
        $("#player" + number + "-solutions > li").each(function (index, li) {
            if (li.textContent.trim() == "" + answer) {
                $(li).addClass("player" + number + "-bg");
            } else {
                $(li).removeClass("player" + number + "-bg");
            }

            if (whichPlayerAmI == number) {
                if (answer != null) {
                    $(li).addClass("disabled");
                    $(li).attr("onclick", "");
                } else {
                    $(li).removeClass("disabled");
                    $(li).attr("onclick", "selectedAnswer(this)");
                }
            }
        });
        if (whichPlayerAmI == number) {
            if (answer != null) {
                $("#player" + whichPlayerAmI + "-solutions > li").addClass("disabled");
                $("#player" + whichPlayerAmI + "-solutions > li").attr("onclick", "");
            } else {
                $("#player" + whichPlayerAmI + "-solutions > li").removeClass("disabled");
                $("#player" + whichPlayerAmI + "-solutions > li").attr("onclick", "selectedAnswer(this)");
            }
        } else {
            $("#player" + number + "-solutions > li").each(function (index, li) {
                if (li.textContent.trim() == "" + answer) {
                    $(li).addClass("player" + number + "-bg");
                } else {
                    $(li).removeClass("player" + number + "-bg");
                }
            })
        }
    }

    if (json.game.player1 != null) {
        applyDataOfPlayer(1, json.game.player1);
    } else {
        resetDataOfPlayer(1);
    }

    if (json.game.player2 != null) {
        applyDataOfPlayer(2, json.game.player2);
    } else {
        resetDataOfPlayer(2);
    }

    if (json.game.player3 != null) {
        applyDataOfPlayer(3, json.game.player3);
    } else {
        resetDataOfPlayer(3);
    }

    if (json.game.player4 != null) {
        applyDataOfPlayer(4, json.game.player4);
    } else {
        resetDataOfPlayer(4);
    }

    disabledAnswers(1, json.game.answer1);
    disabledAnswers(2, json.game.answer2);
    disabledAnswers(3, json.game.answer3);
    disabledAnswers(4, json.game.answer4);


    if (json.finished) {
        $("#finish-game").modal();
        setTimeout(finish, 5000);
    }
}

function finish() {
    window.location = '../play/play.php';
}

function selectedAnswer(element) {
    $('#answer').text($(element).text());
    $('#confirm-answer').modal();
}

function sendAnswer() {
    $.post("../ajax/checkSolution.php", {sol: $("#answer").text(), id: id, playerNumber: whichPlayerAmI})
        .done(function (data) {
            var $answers;
            if (data) {
                $answers = $("#player" + whichPlayerAmI + "-solutions > li");
                $answers.attr("onclick", "");
                $answers.addClass("disabled");
                $("#confirm-answer").modal("toggle");
            } else {
                toastr.error("Tu respuesta no ha sido enviada. Intentalo de nuevo.", "Error");
            }
        });
}

function disconnect(){
    $.post("../ajax/disconnect.php", {id: id, player: whichPlayerAmI});
}