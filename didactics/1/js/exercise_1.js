var leftZone = [];
var rightZone = [];
var leftValue = 0;
var rightValue = 7;

var coins;

function updateLeftSide(side, sideID, sideValue) {
    $value = 0;

    for (var i = 1; i < 7; i++) {
        if (side[i] != undefined)
            $value += parseInt($(side[i]).attr("alt"));
    }

    $(sideID + " > h1").text($value);


    $realValue = sideValue - $value;
    if ($realValue < 0)
        $(sideID).animate({
            marginTop: "+=" + (Math.abs($realValue) * 5)
        }, 200);
    else if ($realValue > 0)
        $(sideID).animate({
            marginTop: "-=" + (Math.abs($realValue) * 5)
        }, 200);

    if (sideID == "#droppable-left")
        leftValue = $value;
    else
        rightValue = $value;
}
function updateData() {
    updateLeftSide(leftZone, "#droppable-left", leftValue);


    if (leftValue > rightValue)
        addTry();

    if (leftValue != rightValue){
        $(".drop-target").removeClass("bg-green");
        $(".drop-target").addClass("bg-blue");
    }
}

function init() {
    $(".coin").pep({
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
                    $(this).replaceWith(coins[id].clone());
                    init();
                });
            }
            updateData();
        }
    });
}

function checkAnswer() {
    if (leftValue == rightValue) {
        $(".drop-target").addClass("bg-green");
        $(".drop-target").removeClass("bg-blue");
        $("#next-exercise").modal();
    }else{
        toastr.info("¡Con " + leftValue + (leftValue > rightValue ? " sobra dinero!" : " falta dinero!"));
        $(".drop-target").removeClass("bg-green");
        $(".drop-target").addClass("bg-blue");
    }
}

function reset() {
    $.each($(".coin"), function (index, coin) {
        $(coin).replaceWith(coins[coin.id].clone());
    });
    $("#droppable-left").animate({
        marginTop: "-=" + ($("#droppable-left").css("margin-top"))
    }, 200);
    $("#droppable-left > h1").text("0");
    leftValue = 0;
    leftZone = [];
    init();
}

$(document).ready(function () {
    coins = [undefined, $("#1").clone(), $("#2").clone(), $("#3").clone(), $("#4").clone(), $("#5").clone(), $("#6").clone()];
    init();
});