<link rel="stylesheet" href="1/css/exercise_4.css">
<div class="text-center">
    <h1>¡Ayuda a Osvaldo!</h1>
    <h3>Osvaldo te cuenta que para arreglar la singuralidad espacio-temporal es necesario que contengan 26 cristales de
        cesio.</h3>
    <h3>En la singularidad ya tenemos 20 cristales.</h3>
    <h3>Recuerdas que en el almacén quedan recipientes que contienen 2 cristales cada uno.</h3>
    <h3>¿Cuántos recipientes tienes que traer del almacén?</h3>
</div>

<div class="breather"></div>

<div id="equations" class="text-center">
    <h1 id="equation">26 = 20 + 2x</h1>
    <h1>26 = 20 + 2<span id="unknown-1">x</span></h1>
    <h1>26 = 20 + <span id="unknown-2">?</span></h1>
    <h1><span id="open-sign"></span>26 = <span id="result"></span><span id="close-sign">?</span></h1>
</div>

<div class="breather"></div>

<div>
    <div class="text-center">
        <div class="col-xs-12">
            <a style="margin-right: 10px;" onclick="showBox()" href="javascript:void(0)" class="btn btn-fab btn-sm bg-light-blue"><i class="icon material-icons">add</i></a>
            <a style="margin-left: 10px;" onclick="hideBox()" href="javascript:void(0)" class="btn btn-fab btn-sm bg-light-blue"><i class="icon material-icons">remove</i></a>
        </div>
    </div>
    <div class="breather"></div>
    <div class="col-xs-offset-3 col-xs-6 text-center" id="box-region">
        <img hidden id="1" src="1/img/box.png" alt="1">
        <img hidden id="2" src="1/img/box.png" alt="1">
        <img hidden id="3" src="1/img/box.png" alt="1">
        <img hidden id="4" src="1/img/box.png" alt="1">
        <img hidden id="5" src="1/img/box.png" alt="1">
    </div>

    <div class="breather-lg"></div>

    <button class="btn btn-primary" onclick="checkAnswer()">Confirma tu respuesta</button>
    <button class="btn btn-primary" onclick="reset()">Volver a empezar</button>

</div>

<div class="modal fade in" id="next-exercise" tabindex="-1" role="dialog" aria-labelledby="next-exerciseLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1>¡Muy bien!</h1>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h1>¡Has solucionado el problema!</h1>
                    <h3>Exactamente, nos hacian falta 3 recipientes.</h3>
                    <h3>¡Máquina arreglada!</h3>
                    <h3>¡Lista para vivir nuevas aventuras por el tiempo y el espacio!</h3>
                </div>
            </div>
            <div class="modal-footer center-block">
                <?php
                include 'controls.php';
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    var count = 0;
    function showBox() {
        if (count < 5) {
            count++;
            $('#' + count).removeAttr("hidden");
        }
        substitution();
    }

    function hideBox() {
        if (count > 0) {
            $('#' + count).attr("hidden", "hidden");
            count--;
        }
        substitution();
    }

    function substitution() {
        if (count != 0) {
            $('#unknown-1').text("·" + count);
            $('#unknown-2').text((2 * count));
            $('#result').text(((2 * count) + 20));
        } else {
            $('#unknown-1').text("x");
            $('#unknown-2').text("?");
            $('#result').text("?");
            $("#open-sign").text("");
            $("#close-sign").text("");
        }
    }

    function checkAnswer() {
        if ($('#result').text() == '26') {
            $("#open-sign").text("¡");
            $("#close-sign").text("!");
            $("#next-exercise").modal();
        } else{
            toastr.info("¡" + count + " recipientes." + (count > 3 ? " son muchos!" : " no son suficientes!"), "¡Atención!");
        }
    }

    function reset() {
        $("#open-sign").text("¿");
        $("#close-sign").text("?");
        count = 0;
        substitution();
        $("#box-region > img").hide();
    }


</script>
