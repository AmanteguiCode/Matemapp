<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="1/css/exercise_1.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="//rawgithub.com/briangonzalez/jquery.pep.js/master/src/jquery.pep.js"></script>
<script src="1/js/exercise_1.js"></script>
<div class="text-center">
    <h1>¡Compra el periódico!</h1>
    <h4>7 centavos</h4>
</div>
<div id="droppable-left" class="col-xs-6 bg-blue drop-target text-center border-right elevated-3">
    <h1>0</h1>
</div>
<div id="droppable-right" class="col-xs-6 bg-blue text-center border-left elevated-3" style="margin-top: 35px">
    <img src="1/img/paper.png" alt="">
</div>

<div class="breather-lg"></div>
<div id="coins" class="text-center">
    <img id="6" class="coin coin-lg" src="1/img/coin3.png" alt="3">


    <img id="5" class="coin coin-md" src="1/img/coin2.png" alt="2">
    <img id="4" class="coin coin-md" src="1/img/coin2.png" alt="2">


    <img id="3" class="coin coin-xs" src="1/img/coin1.png" alt="1">
    <img id="2" class="coin coin-xs" src="1/img/coin1.png" alt="1">
    <img id="1" class="coin coin-xs" src="1/img/coin1.png" alt="1">
</div>

<div class="breather"></div>

<button class="btn btn-primary" onclick="checkAnswer()">Confirma tu respuesta</button>
<button class="btn btn-primary" onclick="reset()">Volver a empezar</button>

<div class="modal fade in" id="next-exercise" tabindex="-1" role="dialog" aria-labelledby="next-exerciseLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1>¡Muy bien!</h1>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h1>¡Has obtenido un periódico!</h1>
                    <img src="1/img/paper.png" alt="">
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

