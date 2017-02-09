var leftZone = [];
var rightZone = [];
var value = 0;

var pipes;

function updateLeftSide(side) {
    $value = 0;

    for (var i = 1; i < pipes.length; i++) {
        if (side[i] != undefined) {
            $value += parseInt($(side[i]).attr("alt"));
        }
    }

    if ($value <= 15)
        $("#empty-pipe").attr("src", "1/img/pipe" + (Math.ceil($value / 3)) + ".png");

    if ($value != 15){
        $(".drop-target").removeClass("bg-green");
        $(".drop-target").addClass("bg-blue");
    }

    value = $value;

}
function updateData() {
    updateLeftSide(leftZone);
}

function init() {
    $(".pipe").pep({
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
                    $(this).replaceWith(pipes[id].clone());
                    init();
                });
            }
            updateData();
        }
    });
}

function checkAnswer() {
    if (value == 15) {
        $(".drop-target").addClass("bg-green");
        $(".drop-target").removeClass("bg-blue");
        $("#next-exercise").modal();
    }else{
        toastr.info("¡Con " + value + " cl." + (value > 15 ? " sobra líquido!" : " falta líquido!"), "¡Cuidado!");
        $(".drop-target").removeClass("bg-green");
        $(".drop-target").addClass("bg-blue");
    }
}

function reset() {
    $.each($(".pipe"), function (index, pipe) {
        $(pipe).replaceWith(pipes[pipe.id].clone());
    });
    value = 0;
    $("#empty-pipe").attr("src", "1/img/pipe" + (Math.ceil(value / 3)) + ".png");
    leftZone = [];
    init();
}


$(document).ready(function () {
    pipes = [undefined, $("#1").clone(), $("#2").clone(), $("#3").clone(), $("#4").clone(), $("#5").clone(), $("#6").clone(), $("#7").clone()];
    init();
});