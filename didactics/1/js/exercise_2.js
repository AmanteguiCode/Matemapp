var leftZone = [];
var rightZone = [];
var leftValue = 0;
var rightValue = 29;
var rockValue = 21;

var rocks;

function updateLeftSide(side, sideID, sideValue) {
    $value = 0;

    for (var i = 1; i < rocks.length; i++) {
        if (side[i] != undefined) {
            $value += parseInt($(side[i]).attr("alt"));
        }
    }

    $(sideID + " > h1").text(rockValue + $value);


    $realValue = sideValue - $value;
    if ($realValue < 0)
        $(sideID).animate({
            marginTop: "+=" + (Math.abs($value - leftValue)) * 10
        }, 200);
    else if ($realValue > 0)
        $(sideID).animate({
            marginTop: "-=" + (Math.abs($value - leftValue)) * 10
        }, 200);

    if (sideID == "#droppable-left")
        leftValue = $value;
    else
        rightValue = $value;
}
function updateData() {
    updateLeftSide(leftZone, "#droppable-left", leftValue);

    $("#machine-rock").attr("src", "1/img/machine-rock" + (Math.ceil((rightValue - (leftValue + rockValue)) / 2)) + ".png");

    if ((leftValue + rockValue) != rightValue) {
        $(".drop-target").removeClass("bg-green");
        $(".drop-target").addClass("bg-blue");
    }
}

function init() {
    $(".rock").pep({
        droppable: '.drop-target',
        rest: function (ev, obj) {
            var id = $(obj.el).attr("id");
            if (this.activeDropRegions[0] != undefined) {
                $zone = $(obj.activeDropRegions[0]);
                if ($zone.attr("id") == "droppable-left") {
                    leftZone[id] = $(obj.el);
                    rightZone[id] = undefined;
                } else {
                    rightZone[id] = $(obj.el);
                    leftZone[id] = undefined;
                }
            } else {
                leftZone[id] = undefined;
                rightZone[id] = undefined;
                $(obj.el).fadeOut("slow", function () {
                    $(this).replaceWith(rocks[id].clone());
                    init();
                });
            }
            updateData();
        }
    });
}

function checkAnswer() {
    if ((leftValue + rockValue) == rightValue) {
        $(".drop-target").addClass("bg-green");
        $(".drop-target").removeClass("bg-blue");
        $("#next-exercise").modal();
    }else{
        toastr.info("¡Con " + leftValue + " no hay suficientes rocas!");
        $(".drop-target").removeClass("bg-green");
        $(".drop-target").addClass("bg-blue");
    }
}

function reset() {
    $.each($(".rock"), function (index, rock) {
        $(rock).replaceWith(rocks[rock.id].clone());
    });
    $("#droppable-left").animate({
        marginTop: "-=" + ($("#droppable-left").css("margin-top"))
    }, 200);
    $("#droppable-left > h1").text("21");
    leftValue = 0;
    leftZone = [];
    init();
}


$(document).ready(function () {
    rocks = [undefined, $("#1").clone(), $("#2").clone(), $("#3").clone(), $("#4").clone(), $("#5").clone(), $("#6").clone(), $("#7").clone(), $("#8").clone(), $("#8").clone()];
    init();

    $divHeight = Math.max($("#droppable-left").height(),$("#droppable-right").height());
    $("#droppable-left").css("height", $divHeight);
    $("#droppable-right").css("height", $divHeight);
});