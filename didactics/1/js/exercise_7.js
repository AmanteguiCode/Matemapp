function question_1(answer){
    if (answer){
        toastr.success("¡Bien! ¡Ahora resolvamos la ecuación!");
        $(".question-1").fadeOut("slow", function () {
            $(".question-2").fadeIn();
        });
    }else{
        toastr.info("¡De esa manera no lo reparten equitativamente!");
        addTry();
    }
}

function question_2(answer){
    if (answer){
        toastr.success("¡Bien! ¡Ahora tendrán comida de forma equitativa!");
        $("#text").fadeOut("slow");
        $(".question-2").fadeOut("slow", function () {
            $("#dialog").fadeIn();
            $("#reset-button").hide();
        });
    }else{
        toastr.info("¡De esa manera no lo reparten equitativamente!");
        addTry();
    }
}

function reset(){
    $(".question-2").fadeOut("slow", function () {
        $(".question-1").show();
    })
}

function finishUnit() {
    $("#dialog").fadeOut("slow", function () {
        $("#finish-unit").fadeIn();
        setTimeout(redirect, 6000);
    });
}
